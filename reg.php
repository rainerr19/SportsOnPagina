<?php 
 // session_start();
  require 'Conexion.php';
  class Registrarse extends Conexion{
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
    function insertRecord($mane,$ape, $edad, $sex, $contr, $cel, $mail){
      $stmt = "INSERT INTO usuarios (nombre, apellido, edad, sexo, contra, celular, email) VALUES (:nom, :ape, :ed, :se, :con, :cel, :mai)";
      $result = self::$conn->prepare($stmt);
      $result->execute(array(":nom"=>$mane, ":ape"=>$ape,":ed"=>$edad, ":se"=>$sex,":con"=>$contr, ":cel"=>$cel, ":mai"=>$mail));//se verifica lo que se inserto
      $conteo = $result->rowCount();//contar las filas que se seleccionan
      return $conteo > 0 ? true : false;
      $result->closeCursor();
    }
  }

if(isset($_POST['bt_reg'])){
  $correo = $_POST['email'];
  $contra1 = $_POST['password'];
  $contra2 = $_POST['confirm'];
  $nombre = $_POST['name'];
  $apellido = $_POST['lastname'];
  $age = $_POST['edad'];
  $celular = $_POST['cel'];
  $mensaje = "";// mensaje de error
	//$sexo = $_POST['opcion'];
  
  
  if(empty($nombre)){
    $mensaje .= "<strong>Error!</strong> Ingrese su nombre.<br>";
    $validName = false;
  }else{
    if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
      $mensaje .= "<strong>Error!</strong>Nombre no premitido. (solo se permiten letras y espacios)<br>";
		  $validName = false;
		}else{
      $validName = true;
		}
  }
  if(empty($apellido)){
    $mensaje .= "<strong>Error!</strong>	Ingrese su apellidos<br>";
    $validApe = false;
  }else{
    if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
      $mensaje .= "<strong>Error!</strong>Apellido no premitido. (solo se permiten letras y espacios)<br>";
      $validApe = false;
    }else{
      $validApe = true;
    }
  }
  
  if(empty($correo)){
    $mensaje .= "<strong>Error!</strong> Ingrese el correo.<br>";
    $validCorreo = false;
  }else{
    
    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
      $mensaje .= "<strong>Error!</strong> Formato de correo invalido.<br>";      
      $validCorreo = false;
    }else{
      $validCorreo = true;
    }
    
  }
  
  if(empty($age)){
    $mensaje .= "<strong>Error!</strong> Ingrese su edad.<br>";      
    $validEdad = false;
  }else{
    $validEdad = true;
  }
  if(empty($celular)){
    $mensaje .= " <strong>Error!</strong> Ingrese su numero celular.<br>"; 
    $validCel = false;
  }else{
    $validCel = true;
  }
  if(!isset($_POST['opcion'])){
    $mensaje .= " <strong>Error!</strong> Ingrese genero.<br>";
    $validSex = false;
  }else{
    $sexo = $_POST['opcion'];
    $validSex = true;
  }
  if(empty($contra1)){
    $mensaje .= " <strong>Error!</strong> Ingrese su contraseña.<br>";
    $validContra = false;
  }else{
    $validContra = true;
  }
  if(empty($contra2)){
    $mensaje .= "<strong>Error!</strong> Ingrese la confirmacion de su contraseña.<br>";     
    $validContra2 = false;
  }else{
    $validContra2 = true;
  }
  
  if($contra1 != $contra2){
    $mensaje .= "<strong>Error!</strong> Las contraseñas no coinciden.<br>";    
    $iguales = false;
  }else {
    $iguales = true;
  }
  
  if(isset($_POST['g-recaptcha-response'])&& $_POST['g-recaptcha-response']){  
    //var_dump($_POST);         
    $secret = "6LeolGgUAAAAAGNAeHkNQyBTrtF1VLILPfKng2D8";         
    $ip = $_SERVER['REMOTE_ADDR'];         
    $captcha = $_POST['g-recaptcha-response'];         
    $rsp  = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip$ip");
              //var_dump($rsp);         
              $arr = json_decode($rsp,TRUE);         
    if(!$arr['success']){   
      $capt = FALSE;          
      $mensaje .= "<strong>Error!</strong> SPAM.<br>";  
    }            
    $capt = TRUE;
    }else {
      $capt = FALSE;
      $mensaje .= "<strong>Error!</strong> Confirmar que no eres un robot.<br>"; 
    }
  
  if($validName && $validApe && $validCel && $validEdad && $validSex && $validCorreo && $validContra && $iguales){
		$registro = new Registrarse();//se crea el objeto para usar las funciones
		if(!$registro->existsEmail($correo)){
			$contraHash = password_hash($contra1, PASSWORD_DEFAULT);//encriptar contraseña 
			//$nombre1 = $nombre.$apellido;
			if($registro->insertRecord($nombre, $apellido, $age, $sexo, $contraHash, $celular, $correo)){
         $_SESSION["nombreUser"]=$nombre;
         //$_SESSION["cel"]=$celular;
         $_SESSION["email"]=$correo;
          header("location:index.php");
				//echo "<h2>Registrado</h2>";
				}else{
				echo "<div class='alert alert-danger alert-dismissible'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span></button>
                <strong>Error!</strong> Hubo problemas en el ingreso.(intenten de nuevo)
              </div>";
			}

		}else{
			echo "<div class='alert alert-danger alert-dismissible'>
              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span></button>
              <strong>Error!</strong> Este correo ya existe.
            </div>";
		}
  }else{
    echo" <div class='alert alert-danger alert-dismissible'>
          <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
          <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span></button>
          $mensaje
        </div>";
  }
}
?>


