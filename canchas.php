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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>Canchas SportsOn</title>
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
              <li class='nav-item'>
                <a class='nav-link' href="index.php">Inicio</a>
              </li>
              <li class='nav-item active'>
                <a class='nav-link' href="#">Canchas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="eventos.php">Eventos</a>
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
                    <div class='dropdown-menu dropdown-menu-right'>
                      <a class='dropdown-item' href='perfil.php'>Perfil</a>
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
      <h1>Escenarios deportivos</h1> 
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident quidem rerum voluptatum! Ea consequatur, a assumenda quibusdam laborum libero, tenetur, aspernatur mollitia in nulla magnam dolor ipsum vel ullam eligendi?
          </p>
        </div>
    </section>

<div class="container">
      <div class="dropdown dropright">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
          Ordenar canchas por:
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item active" id="todo" href="">Todo tipo</a>
          <a class="dropdown-item" id="pos" href="#" onclick="getLocation()">Cercanía a tu posición</a>
          <a class="dropdown-item" id="fut" href="#" onclick="futbol()">Tipo: Futbol</a>
        </div>
      </div> 
</div>
<section class="container">
     
    <?php
      include 'hora.php';
      $o = new canchas();//se crea el objeto
      $todas=$o->idTodasCanchas();// id e cancha mostrar
      $num = $o->numCanchas();
     
      $idArray=array();
      foreach($todas as $cancha){
        array_push($idArray,$cancha["id_canchas"]);
      }
      // var_dump();
      $s = $num/3;
      if (!is_int($s)){
        $s = intval($s);
        $s = $s+1;
      }
      $i=0;
      echo"<span id='num' hidden>$s</span>";
      for ($l=0; $l < $s ; $l++) { 
        echo "<br>
        <div class='card-deck' id='Ct-$l'>";
        for ($k=0; $k <3 ; $k++) { 
          if ($i>=sizeof($idArray)){
            echo "
            <div class='card'></div>";
          }else{
            $id = $idArray[$i];
            $g = $o->datoCanchas($id);
            
            $Cnombre = $g["nombre"];
            $tipo = $g["tipo"];
            $dir = $g["direccion"];
            // $ubi = $g["ubicacion"];
            $img = $g["imgen"];//img_brasil.png
            $caracteristicas = $g["caracteristicas"];
            echo "
            <div class='card'>
              <img class='card-img-top' src='img/canchas/$img' alt='Card image' style='max-height: 300px;width:100%'>
              <div class='card-body'>
                <h4 class='card-title'>$Cnombre</h4>
                <h5 class='card-title'>Tipo: $tipo</h5>
                <p class='card-text'>Caracteristica: $caracteristicas</p>
                <p class='card-text'>Dirección: $dir</p>
                <form action='horas.php' method='post' role='form'>
                  <button type='submit' class='btn btn-primary' name='btn-b' value='$id'>Ver más</button>
                </form>
              </div>
            </div>
            ";
            $i += 1;

          }
        }
        echo "</div>";
      }     
    ?>
    <span id="Mj"></span>
    <br>
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
  var p = document.getElementById("pos");
  var t = document.getElementById("todo");
  var f = document.getElementById("fut");

  var Ccard = document.getElementById("num").textContent;
  Ccard = parseInt(Ccard);
  // var src = document.getElementById('myImg').getAttribute('src');
  function futbol(){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        f.setAttribute("class", "dropdown-item active");
        t.setAttribute("class", "dropdown-item");
        
        for(var i=0;i <= Ccard-1;i++){
          var name ="Ct-" + i;
          var List = document.getElementById(name);
          List.parentNode.removeChild(List);
          }    
        //List.parentNode.removeChild(List);  
        //console.log( this.responseText);
        document.getElementById("Mj").innerHTML = this.responseText;
        //console.log(List);
      }
    };
    var pos = "fut=1";
    xhttp.open("POST", "hora.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(pos);
  }
  function getLocation() {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(GPosition);
      } else { 
          alert("Geolocation is not supported by this browser.");
      }
  }
  
  function GPosition(position) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        p.setAttribute("class", "dropdown-item active");
        t.setAttribute("class", "dropdown-item");
        
        for(var i=0;i <= Ccard-1;i++){
          var name ="Ct-" + i;
          var List = document.getElementById(name);
          List.parentNode.removeChild(List);
          }    
        //List.parentNode.removeChild(List);  
        //console.log( this.responseText);
        document.getElementById("Mj").innerHTML = this.responseText;
        //console.log(List);
      }
    };
    var pos = "pos=1&lati=" + String(position.coords.latitude) + "&lon=" + String(position.coords.longitude);
    xhttp.open("POST", "hora.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(pos);
   
  }
  </script>
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
</html> 