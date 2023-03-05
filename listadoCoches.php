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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

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

    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid navbar-dark bg-black">
          <a class="navbar-brand" href="welcome.php"><img src="img/Logotipo.jpg" class="rounded-circle" width="100px" alt=""></a>
          <button class="navbar-toggler btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="offcanvas offcanvas-end bg-black" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title text-light" id="offcanvasNavbarLabel">Manolo's Cars</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                    <h3 class="text-light">Hola, <?php echo htmlspecialchars($_SESSION["username"]); ?></h3>
                </li>
                <?php
                if ($_SESSION["cargo"]=="ADMIN") {
                   ?>
                   <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="registroCoche.php">Introducir nuevo vehiculo</a>
                    </li>
                   <?php
                }

                ?>
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="alquilar.php">Alquilar Coche</a>
                    </li>
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="googleMaps.html">Donde Encontrarnos</a>
                </li>
              </ul>
              <a href="logout.php"><button class="btn btn-outline-danger" type="button">Log Out</button></a>
            </div>
          </div>
        </div>
      </nav>
      <br>
      <br>
      <br>
      <br>
    <?php
    $cadena=$_SESSION["array"];
    $pos=strpos($cadena,",");
    
    

    $boo=false;
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
          
        if ($pos===false) {
          if ($cadena==$reg['Matricula']) {
            # code...
          }else {
            echo "<tr>";
            echo "<td><img src='img/" . $reg['Foto'] . ".jpg' width='300px'></td>";
            echo "<td>" . $reg['Marca'] . "</td>";
            echo "<td>" . $reg['Modelo'] . "</td>";
            echo "<td>" . $reg['Matricula'] . "</td>";
            echo "<td>" . $reg['Bastidor'] . "</td>";
            echo "<td>" . $reg['Tipo'] . "</td>";
            echo "<td><a href='alquilado.php?matricula=". $reg['Matricula']. "&marca=". $reg['Marca']. "&modelo=". $reg['Modelo']. "'>Alquilar</a></td>";
            echo "</tr>";
          }
        }else {
          $array=explode(",",$cadena);
          if ($cadena==null) {
            $boo=false;
          }else {
            for ($i=0; $i < count($array); $i++) { 
              if ($array[$i]==$reg['Matricula']) {
                $boo=true;
                break;
                
            }
          }
        }
          if ($boo==true) {
            # code...
          }else {
            echo "<tr>";
            echo "<td><img src='img/" . $reg['Foto'] . ".jpg' width='300px'></td>";
            echo "<td>" . $reg['Marca'] . "</td>";
            echo "<td>" . $reg['Modelo'] . "</td>";
            echo "<td>" . $reg['Matricula'] . "</td>";
            echo "<td>" . $reg['Bastidor'] . "</td>";
            echo "<td>" . $reg['Tipo'] . "</td>";
            echo "<td><a href='alquilado.php?matricula=". $reg['Matricula']. "&marca=". $reg['Marca']. "&modelo=". $reg['Modelo']. "'>Alquilar</a></td>";
            echo "</tr>";
          }
        }
        
         
          }
        echo "</tbody>";
    echo "</table>";
    
  

  mysqli_close($conexion);
  ?>

    </body>
</html>

