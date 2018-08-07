<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UFT-8">    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>SportsOnCol</title>
  </head>
  <body>
  
  <header>
   <nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark" role="navigation">
        
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
           <ul class='navbar-nav ml-auto'>
                  <li class='dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>
                       $nom 
                    </a>
                    <div class='dropdown-menu dropdown-menu-right'>
                      <a class='dropdown-item' href='#'>Perfil</a>
                      <a class='dropdown-item' href='close.php'>Cerrar Sesion</a>
                    </div>
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

<div class='container'>    
  <div class='jumbotron bg-secondary'>
    <div class='row'>
        <div class='text-center col-lg-4 col-md-12'>
            <img class='img-thumbnail ' src='img/img_brasil.png' style='max-height: 350px' alt='imagen de evento'>
        </div>
        <div class='col-lg-8 col-md-12'>
          <!-- <div class='container'> -->

            <div class='card text-white bg-dark' >
              <div class='card-header'>
                <h2 class='card-title'>Titulo Evento1</h2>
              </div>

              <div class='card-body'>

                <p class='card_text'>
                  resumen <br>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Dolorum nulla dignissimos perferendis quam mollitia architecto placeat perspiciatis omnis, 
                  nisi ipsum. 
                  Mollitia corrupti consequuntur, vero porro veniam quaerat unde quas dolorem.
                  
                </p>
                <span class='post-fecha'>Publicación: <?php echo date('d M Y- H:i',strtotime(1533232112)) ?> </span>
                <hr>
                <form action='evento.php' method='get' role='form'>

                  <div class='btn-group btn-group-lg'>
                      <button type='submit' class='btn btn-info' name='btn-participar' value='1'>Mas Información</button>
                      <button type='submit' class='btn btn-primary' name='btn-participar' value='1'>Apartar</button>
                  </div>
                </form>
              </div>
            </div>
          <!-- </div> -->
        </div>
    </div>
</div>

<div class="container">
  <nav class="navbar navbar-light bg-light" role="navigation">           
      <a href="index_main.php" class="navbar-brand">Eventos</a>
      <!-- dropdown -->
      <ul class='navbar-nav ml-auto'>
        <li class='dropdown'>
          <a class='nav-link dropdown-toggle btn btn-info btn-lg ' href='#' data-toggle='dropdown'>
              filtrar por:
          </a>
          <div class='dropdown-menu dropdown-menu-right'>
            <a class='dropdown-item' href='#'>Perfil</a>
            <a class='dropdown-item' href='#'>Cerrar Sesion</a>
          </div>
        </li>
      </ul>
    </nav>
  </div>
  </div>
       
        
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>
  

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