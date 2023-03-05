<?php
  
  session_start();
  if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;
  }

?>
<html>
    <head>
        <title>ALQUILAR</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    </head>
    <body>
   
    <?php

        
            $fechaRecogida=$_POST['fechaRecogida'];
            $fechaEntrega=$_POST['fechaEntrega'];
            //$dni=$_SESSION["dni"];

            $recogida=date('Y-m-d H:i:s', strtotime($fechaRecogida));
            $entrega=date('Y-m-d H:i:s', strtotime($fechaEntrega));
            $_SESSION["entregado"]=$entrega;
            $_SESSION["recogido"]=$recogida;
            $array="";
            $cont=0;
            

            if($entrega<$recogida){
                echo "La fecha no es valida";
            }else{
                $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
            die("Problemas con la conexion");
            $registros = mysqli_query($conexion, "select * from alquilados where (Fecha_alquiler between '$recogida' and '$entrega') or (Fecha_entrega between '$recogida' and '$entrega')")
            or die("Problemas en el select" . mysqli_error($conexion));
        
            mysqli_close($conexion);

            echo "<table align='center'>";
            echo "<thead>";
              echo "<th>MARCA</th>";
              echo "<th>MODELO</th>";
              echo "<th>MATRICULA</th>";
              echo "<th>DNI</th>";
              echo "<th>FECHA ALQUILER</th>";
              echo "<th>FECHA ENTREGA</th>";
              echo "<th>PRECIO</th>";
            echo "</thead>";
            echo "<tbody>";
            while ($reg = mysqli_fetch_array($registros)) {
              $array.=$reg['Matricula'].",";
              

              echo "<tr>";
                echo "<td>" . $reg['Marca'] . "</td>";
                echo "<td>" . $reg['Modelo'] . "</td>";
                echo "<td>" . $reg['Matricula'] . "</td>";
                echo "<td>" . $reg['DNI'] . "</td>";
                echo "<td>" . $reg['Fecha_alquiler'] . "</td>";
                echo "<td>" . $reg['Fecha_entrega'] . "</td>";
                echo "<td>" . $reg['Precio'] . "</td>";
              echo "</tr>";
              }
            echo "</tbody>";
          echo "</table>";
          $_SESSION["array"]=substr($array,0,-1);
            
            header("location: listadoCoches.php");
            exit;

            }
            
            
          

          

          

        ?>
        
        <p align="center"><a href="welcome.php" class="btn btn-info">Volver a la pagina principal</a></p>

    </body>
</html>