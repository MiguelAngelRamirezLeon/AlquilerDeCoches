<?php
/*
  session_start();
  if(!isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: login.php");
    exit;
  }
  */
?>
<html>
    <head>
        <title>ALQUILAR</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    </head>
    <body>
    
    <form action="alquila.php" method="post">
      <p>Fecha de recogida: <input type="datetime-local" name="fechaRecogida" required></p>
      <p>Fecha de entrega: <input type="datetime-local" name="fechaEntrega" required></p>
      <input type="submit" value="Alquilar">
    </form>

    </body>
</html>