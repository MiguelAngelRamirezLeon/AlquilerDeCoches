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
        $entrega=$_SESSION["entregado"];
        $recoge=$_SESSION["recogido"];
        $dni=$_SESSION["dni"];

        $precio=500;
          $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
            die("Problemas con la conexion");
          mysqli_query($conexion, "insert into alquilados (Marca,Modelo,Matricula,DNI,Fecha_alquiler,Fecha_entrega,Precio) values ('$_GET[marca]','$_GET[modelo]','$_GET[matricula]','$dni','$recoge','$entrega','$precio')")
            or die("Problemas en el select" . mysqli_error($conexion));
        
          mysqli_close($conexion);

          echo "<h1>El vehiculo ha sido alquilado</h1>";
          

          

          

        ?>
        
        <p align="center"><a href="welcome.php" class="btn btn-info">Volver a la pagina principal</a></p>

    </body>
</html>