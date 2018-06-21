<?php
if(!isset($_SESSION)){
  session_start();}
//enviar post con--> action="recibir.php"
if(isset($_COOKIE["cookieUserEmail"]) && isset($_COOKIE["cookieUserNombre"]) && !isset($_SESSION["nombreUser"])){
  $_SESSION["nombreUser"]=$_COOKIE["cookieUserNombre"];
  //$_SESSION["cel"]=$celular;
  $_SESSION["email"]=$_COOKIE["cookieUserEmail"];
}
?>
<!-- <fieldset disabled></fieldset> holaa desabilitar cualquier contenido -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SportsOn alfa</title>
  </head>
  <body>

    <header>
      <nav class="navbar  navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          <!-- Responsive -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
            <!-- <a class="navbar-brand" href="#">
              <img alt="Brand" src="img/ppp.png" width="100" height="40">
            </a> -->
          
          <a href="index_main.php" class="navbar-brand">SportsOn</a>
          <!-- menu -->
          <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">

              <li class="nav-item active">
                <a class="nav-link" href="#">Inicio</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="canchas.php">Canchas</a>
              </li>
             
            <?php 
            if (!isset($_SESSION['nombreUser'])) {
              echo "
              <li class='nav-item'>
                <a class='nav-link' href='registro.php'>Registro</a>
              </li>
              </ul>
                <ul class='navbar-nav navbar-right'>
                  <li class='nav-item dropdown'>
                    <a class='nav-link' href='inicioS.php'>
                      Inicia Sesion
                    </a>
                  </li>
                </ul> ";
            }else{
              $nom =$_SESSION['nombreUser'];
              echo "
              </ul>
                <ul class='navbar-nav navbar-right'>
                  <li class='dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>
                       $nom 
                    </a>
                    <div class='dropdown-menu'>
                      <a class='dropdown-item' href='#'>Perfil</a>
                      <a class='dropdown-item' href='close.php'>Cerrar Sesion</a>
                    </div>
                  </li>
                </ul> ";
            }
            ?>
          </div>
      </nav>
    </header>
    <section class="jumbotron">
      <div class="container">
        <h1>bienvenido</h1> 
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
        </div>
    </section>
    <h1>Quenes Somos </h1>
    <div class="container">
      <p class="margin-b-2">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate nostrum reprehenderit incidunt quibusdam consequatur. Quis eius asperiores sed provident? Molestiae fugit eius eum ducimus sequi harum voluptatem ab quaerat commodi?
      </p>
    </div>
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
      <ul class="social">
        <span>Red Social</span>    
          <li>
              <a href="#"><i class="fa fa-facebook fa-4x"></i></a>
          </li>
        
          <li>
              <a href="#"><i class="fa fa-twitter fa-4x"></i></a>
          </li>
          
          <li>
              <a href="#"><i class="fa fa-instagram fa-4x"></i></a>
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
</body>

    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</html> 