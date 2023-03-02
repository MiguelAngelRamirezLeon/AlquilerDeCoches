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
          $pass=password_hash($_REQUEST['clave'],PASSWORD_DEFAULT);
          $tarjeta=(int)$_REQUEST['tarjeta'];
          $cargo="USER";
          mysqli_query($conexion, "insert into usuarios(Username,Email,Password,DNI,Numero_tarjeta,Nombre,Apellidos,Cargo) values 
                               ('$_REQUEST[usuario]','$_REQUEST[correo]','$pass','$_REQUEST[dni]',$tarjeta,'$_REQUEST[nombre]','$_REQUEST[apellidos]','$cargo')")
            or die("Problemas en el select" . mysqli_error($conexion));
        
          mysqli_close($conexion);
        
          echo "<h1 align='center' class='text-secondary'>El usuario fue dado de alta</h1>";
          

          

        ?>


          <p align="center"><a href="login.php" class="btn btn-info">Iniciar sesion</a></p>

    </body>
</html>

