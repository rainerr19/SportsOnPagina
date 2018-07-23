<?php
include 'DBnoticias.php';
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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SportsOn alfa</title>
  </head>
  <body>

    <header>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          <!-- Responsive -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
          </button>

            <a class="navbar-brand" href="#">
              <img alt="Brand" src="img/logo2.png" style="width: 10rem;height: 4rem;">
            </a>
          
          <!-- <a href="index_main.php" class="navbar-brand">SportsOn</a> -->
          <!-- menu -->
          <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">

              <li class="nav-item active">
                <a class="nav-link" href="#">Inicio</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Canchas</a>
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
    <!-- inicio de slider -->
    <div id="slider1" class="carousel slide" data-ride="carousel">
 <!-- ol es un numerador -->
    <ol class="carousel-indicators">
        <li data-target="#slider1" data-slide-to="0" class="active"></li>
        <li data-target="#slider1" data-slide-to="1"></li>
        <li data-target="#slider1" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">

        <div class="carousel-item active">
          <img class="d-block w-100" src="img/ppp.png" alt="First slide">
          <div class="carousel-caption d-none d-md-block transbox">
              <h5>Primer slide</h5>
            </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/img_hebreo.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block transbox">
            <h5>segundo slide</h5>
           
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/img_brasil.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block transbox">
            <h5>tercer slide</h5>
            
          </div>
        </div>

      </div>
      <!-- flecha indicadora de retroceso -->
      <a class="carousel-control-prev" href="#slider1" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <!-- flecha indicadora de avance -->
      <a class="carousel-control-next" href="#slider1" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <section class="jumbotron jumbotron1">
      <div class="container">
        <h1>bienvenido</h1> 
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
        </div>
    </section>
  
  <div class="container">
    <?php
        $ob = new noticias();//se crea el objeto
        $conteo=$ob->numNoticias();//numero de noticias
        
        for ($i = 1; $i <= $conteo; $i++) {
          $datos = $ob->datoNoticias($i);
          $titulo = $datos["titulo"];
        
          if (is_null($titulo) == FALSE ){
            $res = $datos["resumen"];
            $fecha =  date("d M Y- H:i",strtotime($datos["fecha"]));
            $autor = $datos["autor"];
            $img1 = $datos["imagen1"];
            $pieImg1 = $datos["pieFoto1"];
            $src = "img\imgNews\ $i \ $img1";
            $src =  str_replace(' ', '', $src);
            $imgIN = "<!-- <img class='card-img-top' style='height: 16rem;' src='$src'> -->";
            echo "<div class='card text-center'>
            <div class='card-body'>
            <h3 class='card-title'> $titulo </h5>
            <p><span class='post-fecha'> $fecha </span> 
                <span class='post-autor'><a href='#'>$autor</a></span>
            </p>
            <p class='card-text text-justify'>
                $res 
            </p>
            <form action='noticia.php' method='post' role='form'>
                <div class='contenedor-botones'>
                    <button type='submit' name='btn-leer' value='$i'class='btn btn-success'>Leer mas</button>
                </div>
            </form>

              </div> 
            </div>";
          }
        }
    ?>
        
  </div>
  <section class="jumbotron jumbotron2">
      <div class="container">
        <h1>Quienes somos</h1> 
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
        </div>
    </section>
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
<script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

    
    
    
</html> 