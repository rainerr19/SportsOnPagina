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
    <title>Evento SportsOn</title>
  </head>
  <body>
  
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
              <a class="nav-link" href="canchas.php">Canchas</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="eventos.php">Eventos</a>
              </li>
              <li class="nav-item">
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

<div class="container">
    <?php
        if(isset($_GET['btn-participar'])){
            $eventoID = $_GET['btn-participar'];
        }else{
        
            header("location:index.php");
        }
        $ob = new noticiasYeventos();//se crea el objeto
        //$conteo=$ob->numNoticias();//numero de noticias
        $datos = $ob->datoEventos($eventoID);

        $titulo = $datos["titulo"];
        $res = $datos["resumen"];
        $tipo = $datos["tipo"];
        $encargado = $datos["encargado"];
        $cel = $datos["cel"];
        $precio = $datos["valor"];
        $duracion = $datos["duracion"];
        $requisitos = $datos["Extra_requisito"];
        $fecha_post = $datos["fecha_post"];
        $fecha_limite = $datos["fecha_limite"];
        $fecha_evento = $datos["fecha_evento"];
        $limite_personas = $datos["personas_limite"];
        $ubicacion = $datos["ubicacion_evento"];
        $direccion = $datos["direccion"];
        $edad_min = $datos["edad_min"];
        $edad_max = $datos["edad_max"];
        $sexo = $datos["sexo"];
        $img1 = $datos["evento_imagen1"];
        date_default_timezone_set("America/Mexico_City");
    ?>
    <br>
</div>
<!-- <div class="jumbotron">
    <div class="container">
    <p class="text-justify"> <?php //echo $res ?>    </p>
    </div>
</div> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">  </div>
        <div class="col-md-8"> 
        <?php
        $fecha_i = date("Y-m-d H:i:s");
        $inscritos = $ob->numUsuariosIscritos($eventoID);
        $disponibles = $limite_personas-$inscritos;
        //$fecha_i = strtotime("now");
        $des=FALSE;
        if($fecha_limite<$fecha_i or $disponibles==0){
            echo "<div class='alert alert-secondary' role='alert'>
                    <h4 class='alert-heading'>Lo siento !</h4>
                    <p>Evento cerrado.</p><br>
                </div>";
            $des=TRUE;
        }else{

            if(isset($_POST['btn-inscribir'])){
                if (!isset($_SESSION['nombreUser'])) {
                    echo"<div class='alert alert-danger' role='alert'>
                            <h4 class='alert-heading'>Error</h4>
                            <p>Debes inscribirte en la paguina para participar !! <a href='registro.php'  type='button'> Registar </a></p>
                            <p>Si estas inscripto entonces <a href='inicioS.php'  type='button'> Inciar cuenta </a></p>
                            <br>
                        </div>";
                }else{
                    $email=$_SESSION["email"];
                    $usuarioID = $ob->idUsuario($email);
                    if ($ob->usarioIscrito($usuarioID,$eventoID)){
                        echo "<div class='alert alert-warning' role='alert'>
                                <h4 class='alert-heading'>Cuidado</h4>
                                <p>El usuario $nom ya esta inscripto ¡¡</p><br>
                            </div>";
                    }else{
                        $Udata= $ob->DataUsuario($email);
                        $Usex= $Udata["sexo"];
                        $edad= $Udata["edad"];
                        if($edad_max <= $edad or $edad <= $edad_min){
                            echo "<div class='alert alert-secondary' role='alert'>
                                    <h4 class='alert-heading'>Lo siento !</h4>
                                    <p>Edad no permitida</p><br>
                                </div>";
                        }elseif($sexo!=3){
                            if($sexo!=$Usex){
                                echo "<div class='alert alert-secondary' role='alert'>
                                <h4 class='alert-heading'>Lo siento !</h4>
                                <p>Sexo no permitido</p><br>
                                </div>";
                            }
                            }else{
                            
                            //echo $fecha_i;
                            if($ob->inscribir($usuarioID, $eventoID, $fecha_i)){

                                echo"<div class='alert alert-success' role='alert'>
                                <h4 class='alert-heading'>Genial !</h4>
                                <p>El usuario $nom se ha inscripto correctamente !!</p><br>
                                </div>";
                            }else{
                                echo"<div class='alert alert-danger' role='alert'>
                                        <h4 class='alert-heading'>Error</h4>
                                        <p>Error en sistema!!</p>
                                        <br>
                                    </div>";
                            }
                        }   
                    }
    
                }    
            }
        }
        ?>
        <h1><?php echo $titulo; ?> </h1>
        <br>
            <figure class="figure"><!-- mayor a 400 x 300 -->
                <img src="img\eventos\<?php echo $eventoID ?>\<?php echo $img1 ?>" class="img-thumbnail" style='max-height: 420px'>
                <hr>
            </figure> 
            <!-- <img src="..." class="img-fluid" alt="Responsive image"> -->
            <p>
                <span class="post-fecha"> <?php echo date("d M Y- H:i",strtotime($fecha_post)) ?> </span> 
                <span class="post-autor"><a href=""><?php echo $encargado ?></a></span>
            </p>
            <p class="text-justify">
                <?php
                // echo str_replace(PHP_EOL, '<br/>', $res);
                echo $res;
                ?>
            </p>

            <br>
            <div class="jumbotron">
                <div class="container">
                <p class="text-justify"> Tipo: <?php echo $tipo ?>    </p>
                <p class="text-justify"> Fecha de evento: <?php echo date("d M Y- H:i",strtotime($fecha_evento)) ?>    </p>
                <p class="text-justify"> Duracion: <?php echo $duracion ?>    </p>
                <p class="text-justify"> Fecha limite: <?php echo date("d M Y- H:i",strtotime($fecha_limite)) ?>    </p>
                <p class="text-justify"> Direccion: <?php echo $direccion ?>    </p>
                <?php 
                if (isset($ubicacion)) {
                    echo $ubicacion;
                }
                if (isset($precio)) {

                    echo "<p class='text-justify'>Precio: $precio</p>";
                }
                if (isset($edad_max)) {
                    echo "<p class='text-justify'>Edad maxima permitida: $edad_max </p>";
                }
                if (isset($edad_min)) {
                    echo "<p class='text-justify'>Edad minima permitida: $edad_min </p> ";
                }
                if ($sexo==3) {
                    echo "<p class='text-justify'>Sexo: Mixto </p>";
                }elseif($sexo==0){
                    echo "<p class='text-justify'>Sexo: Femenino</p> ";
                }else{
                    echo "<p class='text-justify'>Sexo: masculino $sexo</p>";
                }
                if (isset($cel)) {

                    echo "<p class='text-justify'>Celular de contacto: $cel</p>";
                }
                
                echo "<p class='text-justify'>Cupos disponibles: $disponibles </p>";
                ?>
                <p class="text-justify"> Limite de personas: <?php echo $limite_personas ?>    </p>
                <p class="text-justify"> <?php echo $requisitos ?>    </p>
                <form method="post">
                    <button type='submit' name='btn-inscribir' 
                    value=<?php echo $eventoID ?>  class='btn btn-success'
                    <?php if($des){echo" disabled";}?>>Participar</button>
                </form>
                
                </div>
            </div> 
        </div>
        <div class="col-md-2">  </div>

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