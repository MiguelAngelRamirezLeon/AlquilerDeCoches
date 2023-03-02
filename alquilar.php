<?php
  session_start();
  if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;
  }
?>
<html>
    <head>
        <title>ALTA</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    </head>
    <body>
    <?php

        
            $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
            die("Problemas con la conexión");
          mysqli_query($conexion, "update coches set Alquilado=1 where Matricula='$_GET[matricula]'")
            or die("Problemas en el select" . mysqli_error($conexion));
        
          mysqli_close($conexion);
          
            $dni=$_SESSION["dni"];
            $date = date("Y-m-d H:i:s");
            //Incrementando 2 dias
            $mod_date = strtotime($date."+ 2 days");
            $fechaEntrega=date("Y-m-d H:i:s",$mod_date);
            echo $fechaEntrega;
            $fechaActual = date('Y-m-d H:i:s');
   
            //echo $fechaActual
            
          $precio=500;
          $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
            die("Problemas con la conexión");
          mysqli_query($conexion, "insert into alquilados (Marca,Modelo,DNI,Fecha_alquiler,Fecha_entrega,Precio) values ('$_GET[marca]','$_GET[modelo]','$dni','$fechaActual','$fechaEntrega','$precio')")
            or die("Problemas en el select" . mysqli_error($conexion));
        
          mysqli_close($conexion);

          echo "<h1>El vehiculo ha sido alquilado</h1>";
          

          

          

        ?>
        <p align="center"><a href="welcome.php" class="btn btn-info">Volver a la pagina principal</a></p>


    </body>
</html>