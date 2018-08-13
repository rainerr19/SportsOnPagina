<?php

if(!isset($_SESSION)){
  session_start();}
  if (!isset($_SESSION['nombreUser'])){
    header("location:index.php");
  }
//enviar post con--> action="recibir.php"
if(isset($_COOKIE["cookieUserEmail"]) && isset($_COOKIE["cookieUserNombre"]) && !isset($_SESSION["nombreUser"])){
  $_SESSION["nombreUser"]=$_COOKIE["cookieUserNombre"];
  //$_SESSION["cel"]=$celular;
  $_SESSION["email"]=$_COOKIE["cookieUserEmail"];
  
}

?>
<!-- <fieldset disabled></fieldset> holaa desabilitar cualquier contenido -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>SportsOnCol</title>
  </head>
<body style='background-color: whitesmoke;'>
    <header>
      <nav class="navbar navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          <!-- Responsive -->
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
             
              <li class="nav-item">
                <a class="nav-link" href="eventos.php">Eventos</a>
              </li>
            <?php
                
                $nom =$_SESSION['nombreUser'];
                echo "
                </ul>
                    <ul class='navbar-nav ml-auto'>
                    <li class='dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>
                        $nom 
                        </a>
                        <div class='dropdown-menu dropdown-menu-right'>
                        <a class='dropdown-item active' href='#'>Perfil</a>
                        <a class='dropdown-item' href='close.php'>Cerrar Sesion</a>
                        </div>
                    </li>
                    </ul> ";
                ?>
          </div>
      </nav>
    </header>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-10 ">
            <div class="card">
               
                <div class="card-header"> 
                <?php
                    include 'DBperfil.php';
                    $perfil= new Perfil();
                    $data_perfil = $perfil->getData($_SESSION["email"]);
                ?>
                    <h3 class="card-title">Perfil de Usuario</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-5"> 

                            <img src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg" 
                            id="profile-image1" class="img-thumbnail rounded-circle" style='max-height: 200px;max-width:200px'> 
                        
                            <div style="color:#999;" >
                                No se puede cambiar imagen aún
                            </div>
                                <!--Upload Image Js And Css-->
                        </div>
                        
                        <!-- /input-group -->
                        <div class="col-sm-7">
                            <h4 style="color: rosybrown;"><?php echo $nom." ".$data_perfil["apellido"] ?> </h4></span>
                            <p class="card-text" style="color: royalblue">
                            <?php echo $data_perfil["email"] ?> <br>
                            <?php echo $data_perfil["celular"] ?> 
                            </p>
                            <p class="card-text" style="color: darkslategray">Genero: 
                            <?php if ($data_perfil["sexo"]){
                                echo "Masculino";
                            } else{
                                echo "Femenino";
                            }?> 
                            </p>
                            <p class="card-text" style="color: darkslategray">Edad: <?php echo $data_perfil["edad"] ?></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-4">
                            <h5 class="card-title">Cambiar Perfil</h5>
                        </div>
                        <div class="col-md-8">
                            <p class="card-text">
                                <small class="text-muted">
                                Puedes dejar los espacios en blanco de los ítems que no quieres cambiar. <br>
                                Si deseas cambiar la contraseña debes llenar los tres ultimos items resfetentes a la contraseña.
                                </small>
                            </p>
                        </div>
                    </div>

                    <hr>
                    <form method="post">
                    <input type="text" class="form-control" name="id" value="<?php echo  $data_perfil['id_usuario']; ?>"hidden>
                        <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="nombre" placeholder="<?php echo $nom ?>">
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Apellido</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="apellido" placeholder="<?php echo $data_perfil["apellido"] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" placeholder="<?php echo $data_perfil["email"] ?>">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Celular</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="cel" placeholder="<?php echo $data_perfil["celular"] ?> " min="1000000000">
                            </div> <!-- celular.// -->
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Edad</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="edad" placeholder="<?php echo $data_perfil["edad"] ?>" min="5" max="99" title="Edad minima 5 años"/>
                            </div> <!-- Edad.// -->
                        </div>
                        <div class="form-group row">
                            <label for="Select1" class="col-sm-3 col-form-label">Sexo</label>
                            <div class="col-sm-9">
                                <select class="form-control" id="Select1" name='sexo'>
                                    <option>No Cambiar</option>
                                <?php if ($data_perfil["sexo"]){
                                    echo "<option>Femenino</option>";
                                } else{
                                    echo "<option>Masculino</option>";
                                }?>
                                    
                                </select>
                            </div> <!-- Edad.// -->
                        </div>
                   
                        <hr>     
                        <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Contraseña Actual</label>
                            <div class="col-sm-9">
                            <input type="password" class="form-control" name="passActual" pattern=".{6,}" title="6 o mas caracteres" placeholder="Nueva contraseña">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nueva password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="Newpassword" pattern=".{6,}" title="6 o mas caracteres" placeholder="Nueva contraseña">
                            </div>
                        </div> <!-- contraseña.// -->  

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Confirmacion de password</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="password" name="confirm" pattern=".{6,}" title="6 o mas caracteres" placeholder="Confirme contraseña">
                            </div>
                        </div> <!-- confirmacion.// -->
                                        
                        <div class="form-group row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                            <button type="submit" name='btn-change' class="btn btn-primary btn-lg float-right">Cambiar</button>
                            </div>
                        </div>

                    </form>
                    <hr>
                    
                        <div class="form-group row">
                            <input type="text" id="id" class="form-control" name="id" value="<?php echo  $data_perfil['id_usuario']; ?>"hidden> 
                            <label class="col-sm-3 col-form-label">Eliminar cuenta</label>
                            <div class="col-sm-9">
                                <button type="button" id="delite" class="btn btn-danger btn-lg">Eliminar Cuenta</button>
                            </div>
                        </div>   
                    
                </div> 
            </div>
        </div>  
        <div class="col-md-2 "></div>
    </div>
</div>
<br><br>
<!-- MODAL -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal1">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="container" id="mensaje">
                ¿Seguro que desea eliminar cuenta?
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-danger" id="delite-confirm" data-dismiss="modal" > SI</button>
           
                <div class="col-md-9"></div>
            <button class="btn btn-primary btn-lg" data-dismiss="modal" >NO</button>    
           
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
<script>
$(document).ready(function(){
    $("#delite").click(function(){
    $('#modal1').modal('show');
    });
    $("#delite-confirm").click(function(){
       //$("#forgot").html(hidden);
       $.post("DBperfil.php",
        {   btn_delite: "1",
            id: $("#id").val()
        },
    function(data, status){
        if(status=="success"){
            console.log(data);
            window.location.href = 'close.php';
        }else{alert("ERROR: response");};
    });
    });
});
           

            
           


</script>
<script>
    $(function() {
        $('#profile-image1').on('click', function() {
            $('#profile-image-upload').click();
        });
    });       
</script> 
<script>
    $(document).ready(function(){
        $("a").find('img[alt="www.000webhost.com"]').css({"display": "none"});
    });
</script>

</body>