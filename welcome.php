<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Manolo's Cars</title>
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
                    <a class="nav-link" aria-current="page" href="listadoCoches.php">Alquilar Coche</a>
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
      
      <div id="carouselExampleDark" class="carousel carousel-dark my-2 slide container" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="img/mustang.jpg" style="width: 500px; height: 600px;" class="d-block w-100" alt="...">
            
          </div>
          <div class="carousel-item"  data-bs-interval="2000">
            <img src="img/r82.jpg" style="width: 500px; height: 600px;" class="d-block w-100" alt="...">
            
          </div>
          <div class="carousel-item">
            <img src="img/twingo.jpg" style="width: 500px; height: 600px;" class="d-block w-100" alt="...">
            
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


  
</body>
</html>
