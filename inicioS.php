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
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>Inicio Session</title>
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
            <li class="nav-item">
                <a class="nav-link" href="eventos.php">Eventos</a>
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
    <br>  
    <hr> 
        <div class="row justify-content-center">                    
            <div class="col-md-7" >
                <div class="card">
                    <?php
                                include "validLogin.php";
                    ?>
                    <header class="card-header">
                        <h4 class="card-title mt-2">Inicio sesion</h4>
                        <div style="float:right; font-size: 80%; position: relative; top:-20px">
                        <form action='' method='post'>
                            <a id="forgot" href='#'>Forgot password?</a>
                            <input type='hidden' name='btn-forgot' value=''/>
                        </form>
                        
                        </div>
                    </header>     

                    <article class="card-body">
                        <form role="form" method="post" action="">
                            <div class="form-group">
                                <label>Usuario:</label> 
                                <input id="mail" type="email" class="form-control" name="email" value="" placeholder="email" required>
                            </div> 

                            <div class="form-group">
                                <label>Contraseña:</label>  
                                <input id="login-password" type="password" class="form-control" name="pass" placeholder="password" required>
                            </div> 

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input id="login-remember" type="checkbox" name="remember" value="1" checked> Remember me
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <!-- Button -->
                                    <button type="submit" name="btn-login" class="btn btn-primary btn-block">
                                        Login 
                                    </button>
                            </div>

                        </form>
                    </article> 
                </div>
            </div>  
        </div><!-- row -->
        
        <hr>
        <br>
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

<!-- MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Recordar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form role="form" method="post" action="">
        <div class="modal-body">
            <div class="container" id="mensaje">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" >Close</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    $("#forgot").click(function(){
        //$("#forgot").html(hidden);
        $.post("validLogin.php",
        {   btn_forgot: "1",
            mail: $("#mail").val()
        },
    function(data, status){
        if(status=="success"){
            console.log(data);
            $("#mensaje").html(data);
            $('#myModal').modal('show');
        }else{alert("ERROR: response");};

    });
    });
});

</script>
</body>
</html>