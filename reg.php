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
    function insertRecord($mane, $edad, $sex, $contr, $cel, $mail){
      $stmt = "INSERT INTO usuarios (nombre, edad, sexo, contra, celular, email) VALUES (:nom, :ed, :se, :con, :cel, :mai)";
      $result = self::$conn->prepare($stmt);
      $result->execute(array(":nom"=>$mane,":ed"=>$edad, ":se"=>$sex,":con"=>$contr, ":cel"=>$cel, ":mai"=>$mail));//se verifica lo que se inserto
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
  
	
	//$sexo = $_POST['opcion'];
 

  if(empty($nombre)){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese su nombre.
          </div>" ;
    $validName = false;
  }else{
		if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
      echo "<div class='alert alert-danger alert-dismissible'>
              <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span></button>
              <strong>Error!</strong>Nombre no premitido. (solo se permiten letras y espacios)
            </div>" ;
		  $validName = false;
		}else{
			$validName = true;
		}
  }
  if(empty($apellido)){

    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong>	Ingrese su apellidos.
          </div>";
    $validApe = false;
  }else{
	if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong>Nombre no premitido. (solo se permiten letras y espacios)
          </div>" ;
		$validApe = false;
	}else{
			$validApe = true;
  }
}

if(empty($correo)){
  echo  "<div class='alert alert-danger alert-dismissible'>
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

  if(empty($age)){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese su edad.
          </div>";
    $validEdad = false;
  }else{
    $validEdad = true;
  }
  if(empty($celular)){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese su numero celular.
          </div>";
    $validCel = false;
  }else{
    $validCel = true;
  }
  if(!isset($_POST['opcion'])){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese genero.
          </div>" ;
    $validSex = false;
  }else{
	$sexo = $_POST['opcion'];
    $validSex = true;
  }
  if(empty($contra1)){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese su contraseña.
          </div>" ;
    $validContra = false;
  }else{
    $validContra = true;
  }
  if(empty($contra2)){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Ingrese la confirmacion de su contraseña.
          </div>" ;
    $validContra2 = false;
  }else{
    $validContra2 = true;
  }

  if($contra1 != $contra2){
    echo "<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error!</strong> Las contraseñas no coinciden.
          </div>";
    $iguales = false;
  }else {
    $iguales = true;
  }


  if($validName && $validApe && $validCel && $validEdad && $validSex && $validCorreo && $validContra && $iguales){
		$registro = new Registrarse();//se crea el objeto para usar las funciones
		if(!$registro->existsEmail($correo)){
			$contraHash = password_hash($contra1, PASSWORD_DEFAULT);//encriptar contraseña 
			$nombre1 = $nombre.$apellido;
			if($registro->insertRecord($nombre1, $age, $sexo, $contraHash, $celular, $correo)){
         $_SESSION["nombreUser"]=$nombre;
         //$_SESSION["cel"]=$celular;
         $_SESSION["email"]=$correo;
          header("location:index_main.php");
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
  }
}
?>


