<?php
require 'Conexion.php';
class Perfil extends Conexion{
    function __construct(){
      parent::__construct();
    }
      function getData($email){
          $stmt = "SELECT * FROM usuarios WHERE email = :email";
          $result = self::$conn->prepare($stmt);
          $result->execute(array(":email"=>$email));
          return $result->fetch(PDO::FETCH_ASSOC);
          $result->closeCursor();
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
        function changeNombre($ValNew, $IDuser){
//UPDATE `usuarios` SET `nombre` = 'Rainer' WHERE `usuarios`.`id_usuario` = 17;
            $stmt = "UPDATE usuarios SET nombre = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changeApellido($ValNew, $IDuser){

            $stmt = "UPDATE usuarios SET apellido = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changeEmail($ValNew, $IDuser){

            $stmt = "UPDATE usuarios SET email = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changeAge($ValNew, $IDuser){
            $stmt = "UPDATE usuarios SET edad = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changeCel($ValNew, $IDuser){
            $stmt = "UPDATE usuarios SET celular = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changeSex($ValNew, $IDuser){
            $stmt = "UPDATE usuarios SET sexo = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function changePass($ValNew, $IDuser){
            $stmt = "UPDATE usuarios SET contra = :val WHERE id_usuario=:id";
            $data=['val'=>$ValNew, 'id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
        function getPass($IDuser){
            $stmt = "SELECT contra FROM usuarios WHERE id_usuario=:id";
            $result = self::$conn->prepare($stmt);
            $result->execute(array('id'=>$IDuser));
            return $result->fetch(PDO::FETCH_ASSOC);
            $result->closeCursor();
          }
          //"DELETE FROM `usuarios` WHERE `usuarios`.`id_usuario` = 9"
          function deliteUser($IDuser){
            $stmt = "DELETE FROM usuarios WHERE id_usuario = :id";
            $data=['id'=>$IDuser];
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
        }
    
    }
if(isset($_POST['btn-change'])){
    $IDusuario = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['email'];
    $sexo = $_POST['sexo'];
    $age = $_POST['edad'];
    $celular = $_POST['cel'];
    
    $contra1 = $_POST['passActual'];
    $contra2 = $_POST['Newpassword'];
    $contra3 = $_POST['confirm'];
    $perfil = new Perfil;
    $change = FALSE;
    if(!empty($nombre)){
        if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
            echo "
                <div class='alert alert-danger' role='alert'>
                Nombre no premitido. (solo se permiten letras y espacios)
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";
        }else {
            
            $perfil->changeNombre($nombre,$IDusuario);
            $_SESSION["nombreUser"]=$nombre;
            $change = TRUE;
        }
       
    }
    if(!empty($apellido)){
        if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
            echo "
                <div class='alert alert-danger' role='alert'>
                Apellido no premitido. (solo se permiten letras y espacios)
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";
        }else {
            $perfil->changeApellido($apellido,$IDusuario);
            $change = TRUE;  
        }
    }
    if(!empty($correo)){
        if(!$registro->existsEmail($correo)){
            $perfil->changeEmail($correo,$IDusuario);
            $_SESSION["email"] = $correo;
            $change = TRUE;  
        }else {
            echo "<div class='alert alert-danger alert-dismissible'>
                <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                <strong>Error!</strong> Este correo ya existe.
            </div>";
        }
    }
    if($sexo != "No Cambiar" ){
        if($sexo == "Femenino"){
            $perfil->changeSex(0,$IDusuario);
        }else{
            $perfil->changeSex(1,$IDusuario);
        }

        $change = TRUE;
       
    }
    if(!empty($age)){
        $perfil->changeAge($age,$IDusuario);
        $change = TRUE;  
    }
    if(!empty($celular)){
        $perfil->changeCel($celular,$IDusuario);
        
        $change = TRUE;  
    }

    if(!empty($contra1) and !empty($contra2) and !empty($contra3)){
        if($contra2 == $contra3){

            $valor = $perfil->getPass($IDusuario);
            $contraHash = $valor["contra"];
            if(password_verify($contra1, $contraHash)){
                $contra2 = password_hash($contra2, PASSWORD_DEFAULT);//encriptar contraseña 
                $perfil->changePass($contra2,$IDusuario);
                $change = TRUE;  
            }else {
                echo "
                <div class='alert alert-danger' role='alert'>
                Contraseña incorrecta.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";
            }
        }else{
            echo "
                <div class='alert alert-danger' role='alert'>
                Las contraseñas no coinciden.
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
                </button>
                </div>
                ";
        }
    }elseif(!empty($contra1) or !empty($contra2) or !empty($contra3)){
        echo "
        <div class='alert alert-warning' role='alert'>
        Se tiene que llenar los tres campos de la contraseña para poder cambiarla.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }


    if($change){
        //echo " goood";
        header("location:index.php");
    }else{
        echo "
        <div class='alert alert-warning' role='alert'>
        No se ha hecho ningún cambio.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                <span aria-hidden='true'>&times;</span>
            </button>
        </div>
        ";
    }


}
if(isset($_POST['btn_delite'])){
    $perfil = new Perfil;
    $IDusuario = $_POST['id'];
    $perfil->deliteUser($IDusuario);
    echo "eliminado";
}


?>