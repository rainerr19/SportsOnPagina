<?php
  require 'Conexion.php';
  require '/PHPMailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->isSMTP();                                      // Set mailer to use SMTP
  $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth = true;                               // Enable SMTP authentication
  $mail->Username = 'sportsoncol@gmail.com';                 // SMTP username
  $mail->Password = 'barranquilla10';                           // SMTP password
  $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
  $mail->Port = 587;                                    // TCP port to connect to
  
 
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
    function Generate_password($largo){
      $cadena_base =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      $cadena_base .= '0123456789' ;
      $cadena_base .= '!@#%^&*()_,./<>?;:[]{}\|=+';
     
      $pass = '';
      $limite = strlen($cadena_base) - 1;
     
      for ($i=0; $i < $largo; $i++)
        $pass .= $cadena_base[rand(0, $limite)];
     
      return $pass;
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
            header("location:index.php");
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
 
  if(isset($_POST['mail'])){
    
    $Email=$_POST['mail'];
    if($Email != "") {
      if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-danger alert-dismissible'>
                <strong>Error!</strong> Formato de correo invalido.
              </div>" ;
      }else{
        $login = new Login();
        if($login->existsEmail($Email)){
          $password = $login-> Generate_password(8);
          $mensaje="
            <table  style='background-color:#f1f1f1;min-width:600px' width='100%' bgcolor='#f1f1f1'>
            <tr>
              <td style='min-width:600px' width='100%' valign='top' align='center'>
                <table bgcolor='#f1f1f1'> 
                  <tr>
                    <td align='center'>
                      <table style='min-width:600px'  width='100%' cellspacing='0' cellpadding='0' border='0'>
                      
                        <tr height='50'>
                          <td style='line-height:1px;font-size:1px' width='100%' height='50'>&nbsp;</td>
                        </tr>
                        <tr>
                          <td align='center'>
                            <table style='min-width:600px' cellspacing='0' cellpadding='0' border='0'>
                              <tr>
                                <td align='center'>
                                  <div  style='max-height:50px'>
                                      <a><img alt='sportsOn' src='https://sportsoncol.000webhostapp.com/img/ppp.png' style='max-width:auto;height:auto' title='SportsOn' width='250px'>
                                      </a>
                                  </div>
                                </td>
                              </tr>
                            </table><!-- imagen tables -->
                          </td>
                        </tr>
                      </table>
                      <table style='min-width:600px'  width='100%' cellspacing='0' cellpadding='0' border='0'>
                        <tr height='50'>
                          <td style='line-height:1px;font-size:1px' width='100%' height='50'>&nbsp;</td>
                        </tr><!-- espacio -->
                        <tr>
                          <td align='center'>
                            <div style='font-family:arial,Helvetica Neue,sans-serif;font-weight:bold;font-size:50px;color:#313131;text-align:center;line-height:75px'>
                              Contraseña cambiada.
                            </div>
                          </td>
                        </tr><!-- title -->
                        <tr height='30'>
                          <td style='line-height:1px;font-size:1px' width='100%' height='30'>&nbsp;</td>
                        </tr><!-- espacio -->
                      </table><!-- title table -->
                      
                    </td>
                  </tr>
                </table>
                <!-- imagen y titulo --> 
                <table bgcolor='#f1f1f1'>
                  <tr>
                    <td align='center'>
                      <table style='min-width:600px;background-color:#ffffff' width='600' border='0' bgcolor='#ffffff'>
                        <tr height='30'>
                          <td style='line-height:1px;font-size:1px' width='100%' height='30'>&nbsp;</td>
                        </tr><!-- espacio -->
                        <tr>
                          <td style='font-family:arial,helvetica,sans-serif;font-size:16px;color:#313131;text-align:left;line-height:24px' align='center'>
                            <div style='font-family:arial,helvetica,sans-serif;font-size:16px;color:#313131;text-align:center;line-height:24px'>
                              <span style='font-size:18px'><strong>Saludos, </strong></span><br>
                              <br>
                              Se ha cambiado con éxito la contraseña. Si no has realizado esta solicitud, 
                              ponte en contacto con nosotros inmediatamente.
                              <br>
                              Contraseña: $password 
                              <br>
                              <br>
                            </div>
                          </td>
                        </tr>
                        <tr height='30'>
                          <td style='line-height:1px;font-size:1px' width='100%' height='30'>&nbsp;</td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <!-- footer mail --> 
                <table style='min-width:600px' width='600' cellspacing='0' cellpadding='0' border='0'>
                  <td align='center'>
                    <div style='font-family:ariel,helvetica,sans-serif;font-weight:bold;font-size:14px;color:#313131;text-align:center;line-height:26px'>
                      comunícate con nosotros
                      <p style='text-decoration:none;color:#17a2c5' target='_blank'>
                      sportsoncol@<span class='il'>gmail</span>.com
                      </p>
                      <br>
                    </div>
                  </td> 
                  <tr height='20'>
                    <td style='line-height:1px;font-size:1px' width='100%' height='20'>&nbsp;</td>
                  </tr>
                  <tr>
                    <td align='center'>
                      <div style='font-family:ariel,helvetica,sans-serif;font-size:12px;color:#858585;text-align:center;line-height:20px'>
                        <p>© 2018, <span class='il'>SportsOnCol</span>, Inc. All rights reserved. </p>
                        <a href='#' style='color:#17a2c5' target='_blank'>Terms of Service</a> | <a style='color:#17a2c5' href='#'>Privacy Policy</a>
                      </div>
                    </td>
                  </tr>
                  <tr height='20'>
                    <td style='line-height:1px;font-size:1px' width='100%' height='20'>&nbsp;</td>
                  </tr>
                </table>
                </center>
              </td>
            </tr>

          </table>
          ";
          $mail->setFrom('sportsoncol@gmail.com', 'SportOnCol');
          $mail->addAddress($Email);     // Add a recipient
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'SportsON cambio de password';
          $mail->Body    =  $mensaje;
          $mail->AltBody = 'tu nueva contraseña es : ';
          
          if(!$mail->send()) {
            echo "<h4>Error en envio</h4>";
            echo "<div class='alert alert-warning alert-dismissible'>
                      Su nueva contraseña no pude ser enviada
                    </div>";
            echo 'Mailer Error: ' . $mail->ErrorInfo;
          } else {
            echo "<h4>Se Ha enviado una nueva contraseña a su correo</h4>";
            echo 'Message has been sent';
          }
        }else{
          
          echo "<div class='alert alert-warning alert-dismissible'>
                  Su correo no existe en la base de datos.
                </div>" ;
        }

      }
     
    
      }else{
      echo "<h4>Ingrese su Email e intente de nuevo</h4>";
      }
    
  }
 ?>
