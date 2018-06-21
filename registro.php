<?php 

if(!isset($_SESSION)){
  session_start();}
if (isset($_SESSION['nombreUser'])) {
  header("location:index_main.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Registro</title>
  </head>

   <header>
   <nav class="navbar  navbar-expand-md bg-dark navbar-dark" role="navigation">
        
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
                  <ul class='nav navbar-nav navbar-right'>
                    <li class='nav-item'>
                      <a class='nav-link' href='inicioS.php'>
                        Inicia Sesion
                      </a>
                    </li>
                  </ul>
            </div>
  
        </nav>
    </header>

<!-- Form Name -->
<!-- <legend>Registro de nuevo usuario</legend> -->
<body>

  <div class="container">
    <div class="row main">
      <div class="panel-heading">
        <div class="panel-title text-center">
          <h1 class="title">Registro de Usuario</h1>
          <hr/>
        </div>
      </div> 
      <div class="main-login main-center">
        <form class="form-horizontal" method="post" action="">
        <div class="container">
            <div class="form-group">
            
              <?php
              include "reg.php"
              ?>
             
              </div>
          </div>
          <div class="form-group">
            
            <label for="name" class="col-lg-2 control-label">Nombres </label>
            <div class="col-lg-5">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true"></i></span>
                <input type="text" class="form-control" name="name" id="validationCustum01"  placeholder="Nombres"/>
              </div>
            </div>
            
            <div class="col-lg-5">
              <div class="input-group">
                <span class="input-group-addon">Apellidos</span>
                <input type="text" class="form-control" name="lastname" id="lastname"  placeholder="apellidos"/>
              </div>
            </div>  
            
          </div>
          
          <div class="form-group">
            <label for="email" class="col-lg-2 control-label">Email</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i></span>
                <input type="email" class="form-control" name="email" id="email"  placeholder="Email"/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="cel" class="col-lg-2 control-label">Celular</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span>
                <input type="number" class="form-control" name="cel" id="cel"  placeholder="Celular"/>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
              <div class="form-group">
                <label for="edad" class="col-lg-4 control-label">Edad</label>
                <div class="col-lg-8">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar" aria-hidden="true"></i></span>
                    <input type="number" class="form-control" name="edad" id="edad" min="5" max="99" placeholder="Edad"/>
                  </div>
                </div>
              </div>
              
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
              <span class="col-lg-4"> </span>
              <div class="dropdown col-lg-8">
                <button type="button" class="btn btn-primary btn-block dropdown-toggle" data-toggle="dropdown">
                  <span class=" glyphicon glyphicon-menu-down"></span>
                  Sexo 
                  <span class=" glyphicon glyphicon-menu-down"></span>
                  <span class="sr-only">Toggle Dropdown</span>
                </button>
                <ul class="dropdown-menu">
                  <label for="radio1">
                    <input type="radio" name="opcion" value="1">Masculino
                  </label>
                  <label for="radio2">
                    <input type="radio" name="opcion" value="0">Femenino
                  </label>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="password" class="col-lg-2 control-label">Contraseña</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="password" id="password"  placeholder="Nueva contraseña"/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="confirm" class="col-lg-2 control-label">Confirmar contraseña</label>
            <div class="col-lg-10">
              <div class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i></span>
                <input type="password" class="form-control" name="confirm" id="confirm"  placeholder="Confirme contraseña"/>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <span class="col-lg-2"> </span>
            <div class="col-md-6 col-lg-5">
              <button type="submit" class="btn btn-primary btn-lg btn-block" name="bt_reg">Registrar</button>
            </div>
            <span class="col-md-6 col-lg-5"> </span>
          </div>

         
        
        </form>
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
  <!------ Include the above in your HEAD tag ---------->
</body>
</html>
