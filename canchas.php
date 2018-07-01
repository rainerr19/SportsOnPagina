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
<!-- <fieldset disabled></fieldset>   desabilitar cualquier contenido -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UFT-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>SportsOn beta</title>
  </head>
  <body>

    <header>
      <nav class="navbar  navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
          </button>
            <!-- <a class="navbar-brand" href="#">
              <img alt="Brand" src="img/ppp.png" width="100" height="40">
            </a> -->
            <a href="index_main.php" class="navbar-brand">SportsOn</a>
          <!-- menu -->
          <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">
              <li class='nav-item'>
                <a class='nav-link' href="index_main.php">Inicio</a>
              </li>
              <li class='nav-item active'>
                <a class='nav-link' href="#">Canchas</a>
              </li>
              
            <?php 
            if (!isset($_SESSION['nombreUser'])) {
              echo "
              <li class='nav-item'>
              <a class='nav-link' href='registro.php'>Registro</a>
                </li>
              </ul>
                <ul class='navbar-nav ml-auto'>
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
                </ul>  ";
            }
            ?>
          </div>

      </nav>
    </header>


<section class="jumbotron jumbotron1">
      <div class="container">
        <h1>canchas</h1> 
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
        </div>
    </section>


<section class="main container">
    <div class="row">
        <section class="col-md-10">
            <article class="post clearfix">
                
                <a href="#" class="thumbnail fill-img" type="button" data-toggle="modal" data-target="#myModal1">
                    <img src="img/img_brasil.png" alt="">
                </a>
                <h2 class="post-title">
                    <a href="#">Cancha de futbol Brasileirao</a>
                </h2>
                <p class="post-contenido text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptas ea nisi impedit ipsa cum.
                    Blanditiis iusto sint id tenetur in doloremque repellat laudantium, 
                    et odit ipsa voluptates autem ex possimus.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptas ea nisi impedit ipsa cum.
                    Blanditiis iusto sint id tenetur in doloremque repellat laudantium, 
                    et odit ipsa voluptates autem ex possimus.
                    
                </p>
                <form action="horas.php" method="post" role="form">

                    <div class="contenedor-botones">
                        <button type="submit" class="btn btn-primary" name="btn-b" value="1">Apartar</button>
                    </div>
                </form>
                <!-- mortrar imagen+++++++++++++++++++++++++ -->
                <div class="modal fade" id="myModal1" role="dialog">
                    <div class="modal-dialog" role="document">                                    
                        <div class="modal-header">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body">
                            <a href="" class="thumbnail">
                                <img src="img/img_brasil.png" alt="img">
                            </a>
                        </div>
                    
                    </div>
                </div>
            </article>

            <article class="post clearfix">
                <a href="#" class="thumbnail fill-img" type="button" data-toggle="modal" data-target="#myModal2">
                        <img src="img/img_hebreo.jpg" alt="">
                </a>
                <h2 class="post-title">
                    <a href="#">Cancha de futbol colegio hebreo</a>
                </h2>

                <p class="post-contenido text-justify">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptas ea nisi impedit ipsa cum.
                    Blanditiis iusto sint id tenetur in doloremque repellat laudantium, 
                    et odit ipsa voluptates autem ex possimus.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Voluptas ea nisi impedit ipsa cum.
                    Blanditiis iusto sint id tenetur in doloremque repellat laudantium, 
                    et odit ipsa voluptates autem ex possimus.
                    
                </p>
                <div class="contenedor-botones">
                    <a href="#" class="btn btn-primary">Apartar</a>
                </div>
                <!-- mortrar imagen+++++++++++++++++++++++++ -->
                <div class="modal fade" id="myModal2" role="dialog">
                    <div class="modal-dialog" role="document">                                    
                        <div class="modal-header">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                            <div class="modal-body">
                                <a href="" class="thumbnail">
                                    <img src="img/img_hebreo.jpg" alt="img">
                                </a>
                            </div>
                        </div>
                    </div>
            </article>
        </section>
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
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
       slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>
    
  
     <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
   
    
  </body>
</html> 