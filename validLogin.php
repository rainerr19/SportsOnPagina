<?php
  require 'Conexion.php';
  class Login extends Conexion{
    function __construct(){
      parent::__construct();
    }
    function existsEmail($email){
        $stmt = "SELECT COUNT(id_usuario) FROM usuarios WHERE email = :email"; //statement
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":email"=>$email));
        $c = ($result->fetch(PDO::FETCH_ASSOC));// te genera un arreglo en forma de json
        $conteo = $c["COUNT(id_usuario)"];// se toma el dato del arreglo
        return $conteo > 0 ? true : false;
        $result->closeCursor();
      }
    function getData($email){
      $stmt = "SELECT * FROM usuarios WHERE email = :email";
      $result = self::$conn->prepare($stmt);
      $result->execute(array(":email"=>$email));
      return $result->fetch(PDO::FETCH_ASSOC);
      $result->closeCursor();
    }
  }
  if(isset($_POST['btn-login'])){
    $correo = $_POST['email'];
    $contra = $_POST['pass'];

    if(empty($correo)){
        echo "<div class='alert alert-danger alert-dismissible'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <strong>Error!</strong> Ingrese el correo.
              </div>" ;
        $validCorreo = false;
      }else{
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo "<div class='alert alert-danger alert-dismissible'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span></button>
                    <strong>Error!</strong> Formato de correo invalido.
                  </div>" ;
            $validCorreo = false;
        }else{
            $validCorreo = true;
        }
      }
    if(empty($contra)){
      echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese su contraseña.
          </div>" ;
      $validCon = false;
    }else{
      $validCon = true;
    }

    if($validCorreo && $validCon){
        $login = new Login();//se crea el objeto
      if($login->existsEmail($correo)){
        $valor=$login->getData($correo);
        $contraHash = $valor["contra"];
        if(password_verify($contra, $contraHash)){

            if(isset($_POST["remember"]) && $_POST["remember"]=="1"){
                setcookie("cookieUserEmail",$correo,time()*30*24*60*60,"/");
                setcookie("cookieUserNombre",$valor["nombre"],time()*30*24*60*60,"/");
                /*(nombre de cookie,valor a guardar,duracion(un mes),
                para q las cookie sean validas en paginas dentro de carpetas)*/
            }
            $_SESSION["nombreUser"]=$valor["nombre"];
            //$_SESSION["cel"]=$celular;
            $_SESSION["email"]=$correo;
            header("location:index_main.php");
          //echo "esta ingresando :)";
        }else {
          echo "<div class='alert alert-danger alert-dismissible'>
                    <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span></button>
                    <strong>Error! </strong> Contraseña incorrecta o email incorrecto
                </div>";
        }
      }else{
        echo "<div class='alert alert-danger alert-dismissible'>
                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                  <strong>Error! </strong> No se encontró correo en la base de datos.
              </div>";
      }
        
    }

  }

 ?>
