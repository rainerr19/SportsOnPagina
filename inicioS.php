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
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Registro</title>
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
            <a class="nav-link disabled" href="#">Canchas</a>
            </li>
            <li class='nav-item'>
                <a class='nav-link' href='registro.php'>Registro</a>
            </li>
         </ul>
                <ul class='nav navbar-nav ml-auto'>
                  <li class='nav-item active'>
                    <a class='nav-link' href='inicioS.php'>
                      Inicia Sesion
                    </a>
                  </li>
                </ul>
          </div>

      </nav>
    </header>
   <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-default" >
                    <div class="panel-heading">
                        <div class="panel-title">Inicio sesion</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" method="post" action="">
                            <?php
                                include "validLogin.php";
                            ?>
                            <label>Usuario:</label> 
                            <div style="margin-bottom: 20px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input id="login-username" type="email" class="form-control" name="email" value="" placeholder="email">                                        
                            </div>
                            <label>Contraseña:</label>  
                            <div style="margin-bottom: 20px" class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input id="login-password" type="password" class="form-control" name="pass" placeholder="password">
                            </div> 
                            <div class="input-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1" checked> Remember me
                                    </label>
                                </div>
                            </div>
                            
                            <div style="margin-top:10px" class="form-group">
                                <!-- Button -->
                                <div class="col-sm-12 controls">
                                    <button type="submit" name="btn-login" class="btn btn-primary btn-lg">
                                        Login 
                                    </button>
                                </div>
                            </div>
                        </form>
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
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>