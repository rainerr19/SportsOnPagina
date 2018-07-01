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
  
              <li class="nav-item">
              <a class="nav-link" href="index_main.php">Inicio</a>
              </li>
  
              <li class="nav-item">
              <a class="nav-link" href="canchas.php">Canchas</a>
              </li>
              <li class='nav-item'>
                  <a class='nav-link active' href='registro.php'>Registro</a>
              </li>
           </ul>
                  <ul class='nav navbar-nav ml-auto'>
                    <li class='nav-item'>
                      <a class='nav-link' href='inicioS.php'>
                        Inicia Sesion
                      </a>
                    </li>
                  </ul>
            </div>
  
        </nav>
    </header>
    <!-- fin de header -->

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
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Ipsa aperiam molestiae laudantium nobis accusamus enim animi veritatis nihil modi maxime! 
                Dolore aspernatur sint nisi voluptatibus deleniti magnam qui quam. Vitae?</p>
            </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/img_hebreo.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-md-block transbox">
            <h5>segundo slide</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Ipsa aperiam molestiae laudantium nobis accusamus enim animi veritatis nihil modi maxime! 
              Dolore aspernatur sint nisi voluptatibus deleniti magnam qui quam. Vitae?</p>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="img/img_brasil.png" alt="Third slide">
          <div class="carousel-caption d-none d-md-block transbox">
            <h5>tercer slide</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
              Ipsa aperiam molestiae laudantium nobis accusamus enim animi veritatis nihil modi maxime! 
              Dolore aspernatur sint nisi voluptatibus deleniti magnam qui quam. Vitae?</p>
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
<!-- scrollspy  -->
<section class="main container">
  <section class="col-md-10">
  <?php
    include 'hora.php';
    $o = new canchas();//se crea el objeto
    $conteo=$o->numCanchas();//numero de canchas
    
    
    for ($i = 1; $i <= $conteo; $i++) {
      $g = $o->datoCanchas($i); 
      $Cnombre = $g["nombre"];
      $detalles=$g["detalles"];
      $tipo = $g["tipo"];
      $caracteristicas = $g["caracteristicas"];
      print " <article class='post clearfix'>
      <a href='#' class='thumbnail fill-img' type='button' data-toggle='modal' data-target='#myModal$i'>
              <img src='img/img_hebreo.jpg' alt=''>
      </a>
      <h2 class='post-title'>
          <a href='#'>Cancha $Cnombre</a> 
      </h2>
      <h5> Tipo: $tipo</h5>
      <h5> Caracteristicas: $caracteristicas</h5>
  
      <p class='post-contenido text-justify'>
          $detalles  
      </p>
      <form action='horas.php' method='post' role='form'>

      <div class='contenedor-botones'>
          <button type='submit' class='btn btn-primary' name='btn-b' value='$i'>Apartar</button>
      </div>
     </form>
      <!-- mortrar imagen+++++++++++++++++++++++++ -->
      <div class='modal fade' id='myModal$i' role='dialog'>
          <div class='modal-dialog' role='document'>                                    
              <div class='modal-header'>
                  <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
              </div>
                  <div class='modal-body'>
                      <a href='' class='thumbnail'>
                          <img src='img/img_hebreo.jpg' alt='img'>
                      </a>
                  </div>
              </div>
          </div>
  </article>";
    } 
   ?>
      

     
  </section>

</section> 
        
          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
  
</body>
</html> 