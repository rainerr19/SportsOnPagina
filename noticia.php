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
                        <div class='dropdown-menu dropdown-menu-right'>
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
    <!-- fin de header -->

<div class="container">
<?php
    if(isset($_GET['btn-leer'])){
        $noticiaID = $_GET['btn-leer'];
    }else{
    
        header("location:index.php");
    }
      $ob = new noticiasYeventos();//se crea el objeto
      //$conteo=$ob->numNoticias();//numero de noticias
      $datos = $ob->datoNoticias($noticiaID);

      $titulo = $datos["titulo"];
      $sub=$datos["subtitulo"];
      $res = $datos["resumen"];
      $fecha = $datos["fecha"];
      $autor = $datos["autor"];
      $img1 = $datos["imagen1"];
      $pieImg1 = $datos["pieFoto1"];
      $img2 = $datos["imagen2"];
      $pieImg2 = $datos["pieFoto2"];
      $img3 = $datos["imagen3"];
      $pieImg3 = $datos["pieFoto3"];
      $parrafo1 = $datos["parrafo1"];
      $parrafo2 = $datos["parrafo2"];
      $parrafo3 = $datos["parrafo3"];
      $parrafo4 = $datos["parrafo4"];
      $video = $datos["video"];
      function fechas($fechas){

          date_default_timezone_set("America/Mexico_City");
          $date = new DateTime("now");
          $date2 = new DateTime($fechas);
          $difdate = date_diff($date, $date2);
          $mes = $difdate->m;
          $dia = $difdate->d;
          $hora = $difdate->h;
      
          if ($dia == 0 and $mes == 0 and $hora == 1) {
          $fulldate = "Hace $hora Hora";
        }elseif($dia == 0 and $mes == 0 and $hora > 1){
            $fulldate = "Hace $hora Horas";
      }elseif($dia == 1 and $mes == 0){
          $fulldate = "Hace un dia";
        }elseif($dia > 1 and $mes == 0){
            $fulldate = "Hace $dia dias";
        }elseif($mes == 1){
            $fulldate = "Hace un Mes";
        }elseif($mes > 1){
            $fulldate = "Hace $mes Meses";
        }elseif($dia == 0 and $mes == 0 and $hora == 0){
            $fulldate = "$dia $mes $hora Recientemente";
        }
        return $fulldate;
    }
      //date("d M Y- H:i",strtotime($fecha))
    ?>
<br>
    <h1><?php echo $titulo; ?> </h1>
    <h5><?php echo $sub; ?></h5>
<!-- <small class='text-muted'> <?php //echo fechas($fecha) ?></small> -->
</div>
<div class="jumbotron">
    <div class="container">
    <p class="text-justify"> <?php echo $res ?>    </p>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-1">  </div>
    <div class="col-md-7"> 
        
        <figure class="figure"><!-- mayor a 400 x 300 -->
            <img src="img\imgNews\<?php echo $noticiaID ?>\<?php echo $img1 ?>" class="figure-img img-fluid rounded">
            <figcaption class="figure-caption text-right">
            <?php echo $pieImg1 ?>
            </figcaption>
            <hr>
        </figure> 
        <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
        <p>
            <span class="post-fecha"> <?php echo date("d M Y- H:i",strtotime($fecha)) ?> </span> 
            <span class="post-autor"><a href=""><?php echo $autor ?></a></span>
        </p>
        <p class="text-justify">
            <?php
            echo str_replace(PHP_EOL, '<br/>', $parrafo1);
            ?>
        </p>
        <?php
            if (is_null($img2) == FALSE ) {
                $src = "img\imgNews\ $noticiaID \ $img2";
                $src =  str_replace(' ', '', $src);
                echo "<figure class='figure'><!-- mayor a 400 x 300 -->
                    <img src='$src' class='figure-img img-fluid rounded'>
                    <figcaption class='figure-caption text-right'>
                    $pieImg2 
                    </figcaption>
                    <hr>
                </figure> 
                ";
            } 
        ?>
        <p class="text-justify"> 
            <?php
            echo str_replace(PHP_EOL, '<br/>', $parrafo2);
            ?>
        </p>
        <?php
            if (is_null($img3) == FALSE ) {
                $src = "img\imgNews\ $noticiaID \ $img3";
                $src =  str_replace(' ', '', $src);
                echo "<figure class='figure'><!-- mayor a 400 x 300 -->
                    <img src='$src' class='figure-img img-fluid rounded'>
                    <figcaption class='figure-caption text-right'>
                    $pieImg3 
                    </figcaption>
                    <hr>
                </figure> 
                ";
            } 
        ?>
        <p class="text-justify">
            <?php
            echo str_replace(PHP_EOL, '<br/>', $parrafo3);
            ?>
        </p>
        <br>
        <?php
        if (is_null($video) == FALSE ) {
        echo "<div class='embed-responsive embed-responsive-21by9'>
                <iframe class='embed-responsive-item'  src='$video' frameborder='0' allow='autoplay; encrypted-media' allowfullscreen></iframe>
            </div>";
        }
        ?>
        
        <br>
        
        

    </div>
        <div class="col-md-4"> 
            <br>
            <h3>Otras noticias</h3>
            <div class="list-group">
            <?php
            //$conteo=$ob->numNoticias();//numero de noticias
            $noticiasRecientes=$ob->NoticiasRecientes(3);// numero de noticias a mostrar

            // var_dump($noticiasRecientes[1]["id_noticia"]);
            foreach($noticiasRecientes as $noticia){
                $i=$noticia["id_noticia"];
                $datos1 = $ob->datoNoticias($i);
                $titulo1 = $datos1["titulo"];
                if ((is_null($titulo1) == FALSE) and ($i != $noticiaID) ){
                  $res1 = $datos1["resumen"];
                  $fechas1 = fechas($fecha);
                    echo "    
                    <form action='noticia.php' method='get'>     
                        <a href='#' onclick='parentNode.submit()' class='list-group-item list-group-item-action list-group-item-dark flex-column align-items-start'>
                            <input type='hidden' name='btn-leer' value='$i'/>
                            <div class='justify-content-between'>
                                <h5 class='mb-1'>$titulo1 </h5>
                                <small class='text-muted'> $fechas1</small>
                            </div>
                            <p class='mb-1'> $res1</p>
                        </a>
                    </from>
                    ";
                }
            }
            ?>
            </div>

        </div>
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