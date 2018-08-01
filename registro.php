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

<!-- Form Name -->
<!-- <legend>Registro de nuevo usuario</legend> -->
<body>

<div class="container">
     <?php
        include "reg.php"
        ?>
  <br>  
  <hr>
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <header class="card-header">
          <h4 class="card-title mt-2">Crear Cuenta</h4>
        </header>
        <article class="card-body">
        <form method="post">
          
          <div class="form-row">
            <div class="col form-group">
              <label>Nombres </label>   
                <input type="text" class="form-control" name="name" placeholder="Nombres">
            </div> <!-- form-group end.// -->
            <div class="col form-group">
              <label>Apellidos</label>
                <input type="text" class="form-control" name="lastname" placeholder="Apellidos">
            </div> <!-- form-group end.// -->
          </div> <!-- Nombres -->

          <div class="form-group">
            <label>Email </label>
            <input type="email" name="email" class="form-control" placeholder="Email">
          </div> <!-- email -->

          <div class="form-group">
              <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="opcion" value="1">
              <span class="form-check-label"> Hombre </span>
            </label>
            <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="opcion" value="0">
              <span class="form-check-label"> Mujer</span>
            </label>
          </div> <!-- genero.// -->

          <div class="form-row">
            <div class="form-group col-md-6">
              <label>Celular</label>
              <input type="number" class="form-control" name="cel" placeholder="Celular">
            </div> <!-- celular.// -->
            <div class="form-group col-md-6">
              <label>Edad</label>
              <input type="number" class="form-control" name="edad" min="5" max="99"/>
            </div> <!-- Edad.// -->
          </div> <!-- Edad y cel.// -->
          
          <div class="form-group">
            <label>Crea tu password</label>
            <input type="password" class="form-control" name="password" placeholder="Nueva contraseña">
          </div> <!-- contraseña.// -->  

          <div class="form-group">
              <label>Confirmacion de password</label>
                <input class="form-control" type="password" name="confirm" placeholder="Confirme contraseña">
          </div> <!-- confirmacion.// -->

          <div class="form-group">
              <button type="submit" class="btn btn-primary btn-block" name="bt_reg"> Registrar  </button>
          </div> <!-- form-group// -->      
          <small class="text-muted">Al darle click en el Botton 'Registrar', Estarias confirmando los
              <br> Terminos y condiciones.</small>                                          
        </form>
        </article> <!-- card-body end .// -->
      </div> <!-- card -->
    </div> <!-- col-->
  </div> <!-- row-->
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
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
</body>
</html>
