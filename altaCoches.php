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

            $nombre = $_FILES['foto']['name'];
            $foto = $_FILES['foto']['tmp_name'];
            $nom = explode(".", $nombre);
            if (!move_uploaded_file($foto, 'img/'. $nombre)) {
              echo "El archivo no se ha podido guardar";
            }

            $alquilado=0;
            $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
            die("Problemas con la conexión");
          mysqli_query($conexion, "insert into coches(Marca,Modelo,Matricula,Bastidor,Alquilado,Tipo,Foto) values 
                               ('$_REQUEST[marca]','$_REQUEST[modelo]','$_REQUEST[matricula]','$_REQUEST[bastidor]',$alquilado,'$_REQUEST[tipo]','$nom[0]')")
            or die("Problemas en el select" . mysqli_error($conexion));
        
          mysqli_close($conexion);
        
          echo "<h1 align='center' class='text-secondary'>El coche fue dado de alta</h1>";
          

          

        ?>


          <p align="center"><a href="welcome.php" class="btn btn-info">Volver a la pagina principal</a></p>

    </body>
</html>

