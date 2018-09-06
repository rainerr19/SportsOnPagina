<?php

if(!isset($_SESSION)){
    session_start();
}
  //enviar post con--> action="recibir.php"
  if(isset($_COOKIE["cookieUserEmail"]) && isset($_COOKIE["cookieUserNombre"]) && !isset($_SESSION["nombreUser"])){
    $_SESSION["nombreUser"]=$_COOKIE["cookieUserNombre"];
    //$_SESSION["cel"]=$celular;
    $_SESSION["email"]=$_COOKIE["cookieUserEmail"];
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>  
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/editor.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>SportsOnCol</title>
  </head>
  <body>
  
  <header>
  <header>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          <!-- Responsive -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
          </button>

            <a class="navbar-brand" href="index.php">
              <img alt="Brand" src="img/logo2.png" style="width: 10rem;height: 4rem;">
            </a>
          
          <!-- <a href="index_main.php" class="navbar-brand">SportsOn</a> -->
          <!-- menu -->
          <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">

              <li class="nav-item">
                <a class="nav-link" href="index.php">Inicio</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="canchas.php">Canchas</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="eventos.php">Eventos</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="quienes_somos.php">¿Quiénes somos?</a>
              </li>
            <?php 
            if (!isset($_SESSION['nombreUser'])) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='registro.php'>Registro</a>
              </li>
            </ul>
            
                <ul class='navbar-nav ml-auto'>
                  <li class='nav-item'>
                    <a class='nav-link' href='inicioS.php'>
                      Inicia Sesion
                    </a>
                  </li>
                </ul> ";
            }else{
              $nom =$_SESSION['nombreUser'];
              echo "
              </ul>
                <ul class='navbar-nav ml-auto'>
                  <li class='dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>
                       $nom 
                    </a>
                    <div class='dropdown-menu dropdown-menu-right'>
                      <a class='dropdown-item' href='perfil.php'>Perfil</a>
                      <a class='dropdown-item' href='close.php'>Cerrar Sesion</a>
                    </div>
                  </li>
                </ul> ";
            }
            ?>
          </div>
      </nav>
    </header>
    <!-- fin de header -->
<br>
    <div class="container">
        <div class="jumbotron">
            <h2>¿Quiénes somos?</h2> 
            <p>
            Somos una plataforma deportiva que te conecta al mundo por medio del deporte.
            </p>
        </div>
<hr>
        <div class="row">
            <div class="col-md-6">
                <h3>Misión</h3> 
                <p>
                Fomentar, motivar e incentivar a las personas por medio de nuevas tecnología a hacer deporte y 
                tener un estilo de vida más saludable.      
                </p>
            </div>
            <div class="col-md-6">
                <h3>Visión</h3> 
                <p>
                <strong><i>SportsOn</i></strong> será una red social deportiva de clase mundial orientada a motivar,
                fomentar e incentivar el deporte de manera sana y activa.       
                </p>
            </div>
        </div>
            <h2>¿Quiénes confian en nosotros?</h2> 
            <br>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <img class='img-fluid img-thumbnail' src='img/quien/AsociacionColombianaDeMinifutbol.jpeg' style = 'max-height: 300px'>
            </div>
            <div class="col-md-3 col-sm-6">
                <img class='img-fluid img-thumbnail' src='img/quien/BarranquillerosFC.jpeg' style = 'max-height: 300px'>
            </div>
            <div class="col-md-3 col-sm-6">
                <img class='img-fluid img-thumbnail' src='img/quien/COPAcolombia.jpeg' style = 'max-height: 300px'>   
            </div>
            <div class="col-md-3 col-sm-6">
                <img class='img-thumbnail' src='img/quien/FSB_lacancha.jpeg' style = 'max-height: 300px'>
            </div>
        </div>
          <div class="row">
            <div class="col-md-3 col-sm-6">
                <img class='img-thumbnail' src='img/quien/La10.jpeg' style = 'max-height: 300px'>
            </div>
            <div class="col-md-3 col-sm-6">
                <img class='img-thumbnail' src='img/quien/LBFfutsal.jpeg' style = 'max-height: 300px'> 
            </div>
            <div class="col-md-3 col-sm-6">
                <img class='img-thumbnail' src='img/quien/Muevete.jpeg' style = 'max-height: 300px'>
            </div>
            <div class="col-md-3 col-sm-6">
            <img class='img-thumbnail' src='img/quien/vivelab.jpeg' style = 'max-height: 300px'>
            </div>
            
          </div>  
          <br>
    </div>
</div>
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
      <ul class="social">
        <span>Red Social</span>    
          <li>
              <a href="https://www.facebook.com/Sportsoncol/"><i class="fa fa-facebook fa-4x"></i></a>
          </li>
        
          <li>
              <a href="https://twitter.com/Sportsoncol"><i class="fa fa-twitter fa-4x"></i></a>
          </li>
          
          <li>
              <a href="https://www.instagram.com/sportsoncol/"><i class="fa fa-instagram fa-4x"></i></a>
          </li>
        
    </ul>
      </div>
      <div class="col-md-6">
      <ul class="adress">
          <span>Contacto</span>    
          <li>
            <p>Lorem ipsum dolor sit amet, vero omnis vocibus</p>
          </li>
                
          <li>
            <p>+57 1234 56789</p>
          </li>
                
          <li>
            <p>info@gmail.com</p>
          </li>
      </ul>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script>	 -->
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>  
</body>
</html> 