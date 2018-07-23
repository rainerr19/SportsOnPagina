<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UFT-8">    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
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
<div class="embed-responsive embed-responsive-21by9">
<iframe class="embed-responsive-item"  src="https://www.youtube.com/embed/AFXe9XuUT4o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
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