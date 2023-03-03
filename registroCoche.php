<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registroCoche</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"/>
    <script src="registroCoche.js"></script>
</head>
<body>
    <h1 align="center">Nuevo Coche</h1>
    <div class="container-fluid">
    <div align="center" class="bg-light border border-secondary rounded m-5 p-5">
    <div>
    <form action="altaCoches.php" method="post">
        <input type="text" name="marca" id="marca" onfocusout="compruebaMarca()" placeholder="Marca"><span id="errorMarca" class="error" style="color: red;"></span><br><br>
        <input type="text" name="modelo" id="modelo" onfocusout="compruebaModelo()" placeholder="Modelo"><span id="errorModelo" class="error" style="color: red;"></span><br><br>
        <input type="text" name="matricula" id="matricula" onfocusout="compruebaMatricula()" placeholder="Matricula"><span id="errorMatricula" class="error" style="color: red;"></span><br><br>
        <input type="text" name="bastidor" id="bastidor" onfocusout="compruebaBastidor()" placeholder="Bastidor"><span id="errorBastidor" class="error" style="color: red;"></span><br><br>
        <label>Tipo</label>
        <select name="tipo">
            <option>Turismo</option>
            <option>4x4</option>
            <option>Deportivo</option>
            <option>SUV</option>
            <option>Todoterreno</option>
        </select><br><br>
        <input type="submit" value="Enviar" id="boton" disabled>
    </form>
    </div>
    </div>
</body>
</html>