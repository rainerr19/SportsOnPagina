<?php
include 'DBnoticiasYeventos.php';
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>Noticias SportsOn </title>
  </head>
  <body style='background-color: whitesmoke;'>
  
 <header>
   <nav class="navbar  navbar-expand-md bg-dark navbar-dark" role="navigation">
        
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
  
              <li class="nav-item disabled">
              <a class="nav-link disabled" href="#">Canchas</a>
              </li>

              <li class="nav-item active">
                <a class="nav-link" href="#">Eventos</a>
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



<div class="container-fluid">
    <div class="row">
        <div class="col-md-1">  </div>
        <div class="col-md-9"> 
            <br>
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light bg-light" role="navigation">           
                    <a href="index_main.php" class="navbar-brand">Eventos</a>
                    <!-- dropdown -->
                    <ul class='navbar-nav ml-auto'>
                        <li class='dropdown'>
                            <a class='nav-link dropdown-toggle btn btn-info btn-lg' href='#' data-toggle='dropdown'>
                                filtrar por:
                            </a>
                            <div class='dropdown-menu dropdown-menu-right'>
                                <a class='dropdown-item' href='#'>Fecha de publicación</a>
                                <a class='dropdown-item' href='#'>Disponibles</a>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>
            <hr>
            <div class="card-group">
                <?php 
                    $ob = new noticiasYeventos();
                    //$conteo=$ob->numNoticias();//numero de noticias
                    $eventosRecientes=$ob->eventosRecientes(3);// numero de eventos a mostrar
                    // var_dump($noticiasRecientes[1]["id_noticia"]);
                    foreach($eventosRecientes as $evento){
                        $i=$evento["id_evento"];
                        $datos1 = $ob->datoEventos($i);
                        $titulo = $datos1["titulo"];
                        $res = $datos1["resumen"];
                        // $res = str_replace(PHP_EOL, '<br/>', $res);
                        
                        $fecha_post = date('d M Y - H:i',strtotime($datos1["fecha_post"]));
                        $img1 = $datos1["evento_imagen1"];
                        $src = "img\ eventos\ $i \ $img1";
                        $src =  str_replace(' ', '', $src);
                        // "<img class='img-thumbnail ' src='$src' style='max-height: 350px' alt='imagen de evento'>";
                        $imgIN = "<img class='img-thumbnail ' src='$src' style='max-height: 300px' alt='imagen de evento'>";
                        
                        echo "
                        <div class='container'> 
                       
                        <div class='jumbotron bg-secondary'>
                            <div class='row'>
                                <div class='text-center col-lg-4 col-md-12'>
                                $imgIN
                                </div>
                                <div class='col-lg-8 col-md-12'>
                                    <div class='card text-white bg-dark' >
                                        <div class='card-header'>
                                            <h4 class='card-title'>$titulo</h4>
                                        </div>

                                        <div class='card-body'>

                                            <p class='card_text'>
                                            $res
                                            
                                            </p>
                                            <span class='post-fecha'>Publicación: $fecha_post </span>
                                            <hr>
                                            <form action='evento.php' method='get' role='form'>
                                                <div class='btn-group btn-group-lg'>
                                                    <button type='submit' class='btn btn-info' name='btn-participar' value='$i'>Mas Información</button>
                                                    <button type='submit' class='btn btn-primary' name='btn-participar' value='$i'>Apartar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                            ";
                        }
                        ?>
            </div>
        </div>
        <div class="col-md-2">  </div>
    </div>
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


          <script src="js/jquery.js"></script>
          <script src="js/bootstrap.min.js"></script>
  
</body>
</html> 