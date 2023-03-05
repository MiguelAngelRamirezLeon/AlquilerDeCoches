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
        <style>
          th, td {
            padding-top: 10px;
            padding-bottom: 20px;
            padding-left: 30px;
            padding-right: 40px;
          }
        </style>
    </head>
    <body>
    <?php
  $conexion = mysqli_connect("localhost", "root", "", "ejercicio_diw") or
    die("Problemas con la conexión");

  $registros = mysqli_query($conexion, "select *
                        from coches where alquilado='0'") or
    die("Problemas en el select:" . mysqli_error($conexion));

    echo "<table align='center'>";
        echo "<thead>";
          echo "<th></th>";
          echo "<th>MARCA</th>";
          echo "<th>MODELO</th>";
          echo "<th>MATRICULA</th>";
          echo "<th>BASTIDOR</th>";
          echo "<th>TIPO</th>";
          echo "<th></th>";
        echo "</thead>";
        echo "<tbody>";
        while ($reg = mysqli_fetch_array($registros)) {
          echo "<tr>";
            echo "<td><img src='img/" . $reg['Foto'] . ".jpg' width='300px'></td>";
            echo "<td>" . $reg['Marca'] . "</td>";
            echo "<td>" . $reg['Modelo'] . "</td>";
            echo "<td>" . $reg['Matricula'] . "</td>";
            echo "<td>" . $reg['Bastidor'] . "</td>";
            echo "<td>" . $reg['Tipo'] . "</td>";
            echo "<td><a href='alquilar.php?matricula=". $reg['Matricula']. "&marca=". $reg['Marca']. "&modelo=". $reg['Modelo']. "'>Alquilar</a></td>";
          echo "</tr>";
          }
        echo "</tbody>";
    echo "</table>";
    
  

  mysqli_close($conexion);
  ?>

    </body>
</html>

