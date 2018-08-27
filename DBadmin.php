<?php
require 'Conexion.php';
class Admin extends Conexion{
    function __construct(){
      parent::__construct();
    }
    function getDataAdmin($email){
        $stmt = "SELECT * FROM admin_user WHERE correo_admin = :email";
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":email"=>$email));
        return $result->fetch(PDO::FETCH_ASSOC);
        $result->closeCursor();
    }
    function eliminarEvento($id_evn){

        $stmt = "DELETE FROM eventos WHERE id_evento = :id";
        $result = self::$conn->prepare($stmt);
        return $result->execute(array(":id"=>$id_evn));
        $result->closeCursor();
    }
    function getEvento($titu){
        $stmt = "SELECT * FROM eventos WHERE titulo = :titu";
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":titu"=>$titu));
        return $result->fetch(PDO::FETCH_ASSOC);
        $result->closeCursor();
    }
    function existsEmail($email){
        $stmt = "SELECT COUNT(id_admin) FROM admin_user WHERE correo_admin = :email"; //statement
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":email"=>$email));
        $c = ($result->fetch(PDO::FETCH_ASSOC));// te genera un arreglo en forma de json
        $conteo = $c["COUNT(id_admin)"];// se toma el dato del arreglo
        return $conteo > 0 ? true : false;
        $result->closeCursor();
        }
    function nuevoID(){
        $stmt = "SELECT MAX(id_evento)  FROM eventos";
        $result = self::$conn->prepare($stmt);
        $result->execute();
        $dato_arr = $result->fetch(PDO::FETCH_ASSOC);
        return $dato_arr["MAX(id_evento)"];
        $result->closeCursor();
    }
    function nuevoIDnews(){
        $stmt = "SELECT MAX(id_noticia)  FROM noticias";
        $result = self::$conn->prepare($stmt);
        $result->execute();
        $dato_arr = $result->fetch(PDO::FETCH_ASSOC);
        return $dato_arr["MAX(id_noticia)"];
        $result->closeCursor();
    }
    function getNoticia($titu){
        $stmt = "SELECT * FROM noticias WHERE titulo = :titu";
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":titu"=>$titu));
        return $result->fetch(PDO::FETCH_ASSOC);
        $result->closeCursor();
    }
    function insertNoticia($title,$sub,$res, $p1, $p2, $p3, $p4, $aut,$fe_post, $img1, $pf1,$img2,$pf2,$img3,$pf3,$vi){
        $stmt = "INSERT INTO noticias (titulo, subtitulo, resumen, parrafo1, parrafo2, parrafo3, parrafo4, autor, fecha, imagen1, pieFoto1, imagen2, pieFoto2, imagen3, pieFoto3, video)
         VALUES (:ti, :su, :res, :parrafo1, :parrafo2, :parrafo3, :parrafo4, :aut, :fech, :imagen1, :pieFoto1, :imagen2, :pieFoto2, :imagen3, :pieFoto3,:vid)";
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":ti"=>$title, ":su"=>$sub,":res"=>$res, ":parrafo1"=>$p1, ":parrafo2"=>$p2, ":parrafo3"=>$p3, ":parrafo4"=>$p4, ":aut"=>$aut, ":fech"=>$fe_post, ":imagen1"=>$img1,":pieFoto1"=>$pf1, ":imagen2"=>$img2,":pieFoto2"=>$pf2,":imagen3"=>$img3,":pieFoto3"=>$pf3,":vid"=>$vi));//se verifica lo que se inserto
        $conteo = $result->rowCount();//contar las filas que se seleccionan
        return $conteo > 0 ? true : false;
        $result->closeCursor();
      }
      function eliminarNoticia($id_n){

        $stmt = "DELETE FROM noticias WHERE id_noticia = :id";
        $result = self::$conn->prepare($stmt);
        return $result->execute(array(":id"=>$id_n));
    }
     
    function insertEvento($title,$res, $tip, $du, $enc, $cel, $valor,$extr,$pos,$f_li,$f_ev,$lim_per,$ubi,$di, $ed_min, $ed_max, $se,$imag){
        $stmt = "INSERT INTO eventos (titulo, resumen, tipo, duracion, encargado, cel, valor, extra_requisito ,fecha_post ,fecha_limite, fecha_evento, personas_limite, ubicacion_evento, direccion, edad_min, edad_max, sexo, evento_imagen1)
         VALUES (:ti, :res, :tip, :du, :enc, :cel, :val, :extr, :fecha_po, :fecha_li, :fecha_ev, :personas_l, :ubi, :di, :edad_m, :edad_ma, :sex,:evento_im)";
        $result = self::$conn->prepare($stmt);
        $result->execute(array(":ti"=>$title, ":res"=>$res, ":tip"=>$tip, ":du"=>$du, ":enc"=>$enc, ":cel"=>$cel, ":val"=>$valor, ":extr"=>$extr, ":fecha_po"=>$pos, 
        ":fecha_li"=>$f_li, ":fecha_ev"=>$f_ev,":personas_l"=>$lim_per, ":ubi"=>$ubi, ":di"=>$di, ":edad_m"=>$ed_min, ":edad_ma"=>$ed_max, ":sex"=>$se, ":evento_im"=>$imag));//se verifica lo que se inserto
        $conteo = $result->rowCount();//contar las filas que se seleccionan
        return $conteo > 0 ? true : false;
        $result->closeCursor();
      }
}
    
    
    if(isset($_POST['btn_editor'])){
        $contra = $_POST['passAdmin'];
        $ad_mail = $_POST['email'];
        $admin = new Admin;
        if($admin->existsEmail($ad_mail)){
            $data = $admin->getDataAdmin($ad_mail);
            if(password_verify($contra, $data["pass_admin"])){
                //$_SESSION["cel"]=$celular;
               // $_SESSION["email"]=$ad_mail;
               if( $_POST['agregar']=="Eventos"){

                   $log=TRUE;
                   $editor_form="
                   <h1>eventos</h1>
                   <hr>
                   <form role='form' method='post' action='mensaje.php' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label >titulo</label>
                      <input type='text' class='form-control' placeholder='titulo' maxlength='45' name='titulo' title='maximo 45 caracteres' required>
                    </div>
                    <div class='form-group'>
                        <label>resumen</label>
                        <textarea class='form-control ckeditor' id='txt_res' name='editor1'></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='Select1'>Tipo</label>
                        
                        <select class='form-control' id='Select1' name='tipo'>
                            <option>futbol</option>
                            <option>otros</option>
                          </select>
                   
                      </div>
                      <div class='form-group'>
                        <label for='Select2'>Genero</label>
                        
                        <select class='form-control' id='Select2' name='gender'>
                            <option>NULL</option>
                            <option>Femenino</option>
                            <option>Masculino</option>
                          </select>
                   
                      </div>
                      <div class='form-group'>
                          <label>valor( 0 'cero' si es gratis )</label>
                          <input type='number' class='form-control' name='valor' min='0' required>
                      </div> 
                      <div class='form-group'>
                          <label>edad minima</label>
                          <input type='number' class='form-control' name='min' min='5' max='99'required>
                      </div> 
                      <div class='form-group'>
                          <label>edad maxima</label>
                          <input type='number' class='form-control' name='max' min='5' max='99' required>
                      </div>
                      <div class='form-group'>
                          <label>Duracion del evento (horas)</label>
                          <input type='number' class='form-control' min='1' name='duracion' required>
                      </div>
                      <div class='form-group'>
                          <label>limite de personas</label>
                          <input type='number' class='form-control' min='2' name='limite_personas' required>
                      </div>
                      <div class='form-row'>
                          <div class='col form-group'>
                              <label>fecha y hora limite de inscripcion</label>
                          </div>
                          <div class='col form-group'>
                              
                              <input type='date' class='form-control' name='fecha_limite' required>
                              <input type='time' class='form-control' name='hora_limite' required>
                          </div>
                      </div>
                      <div class='form-row'>
                          <div class='col form-group'>
                              <label>fecha y hora del evento</label>
                          </div>
                          <div class='col form-group'>
                              
                              <input type='date' class='form-control' name='fecha_evn' required>
                              <input type='time' class='form-control' name='hora_evn' required>
                          </div>
                      </div>
                      <div class='form-group'>
                      <label >direccion</label>
                      <input type='text' class='form-control' maxlength='45' name='direccion' required>
                    </div>
                    <div class='form-group'>
                      <label >link mapa google</label>
                      <input type='text' class='form-control' 
                          placeholder='<iframe src=  allowfullscreen></iframe>'
                           name='ubicacion' required>
                    </div>
                    
                      <div class='form-group'>
                          <label >encargado</label>
                          <input type='text' class='form-control' name='encar' required>
                      </div>
                      <div class='form-group'>
                          <label>Celular(opcional)</label>
                          <input type='number' class='form-control' name='cel' placeholder='Celular' min='1000000000'>
                      </div> 
                  
                    <div class='form-group'>
                      <label for='exampleFormControlFile1'>subir imagen del evento</label>
                      <input type='file' class='form-control-file' name='img' required>
                    </div>
                    <div class='form-group'>
                       <label>Extra requisito (opcional)</label>
                       <textarea class='form-control ckeditor' id='txt_res2' name='editor2'></textarea>
                   </div>
                  
                      <div class='form-group'>
                          <button type='submit' class='btn btn-primary' name='bt_subir'> Subir a paguina  </button>
                      </div> 
                  
                  </form>
                  <hr>
                   <nav class='navbar navbar-light bg-light justify-content-between'>
                   <a class='navbar-brand'>Eliminar evento por nombre <br>(buscar nombre de evento a eliminar)</a>
                   <!-- <a class='navbar-brand'> (buscar nombre de evento a eliminar)</a> -->
                   <form class='form-inline'>
                       <input class='form-control mr-sm-3' id='del_title' placeholder='buscar' maxlength='45' required>
                       <button type='button' class='btn btn-outline-danger my-3 my-sm-0' id='buscar'>Eliminar</button>
                   </form>
                   </nav>
                   ";
               }else{
                $log=TRUE;
                $editor_form="
                <h1>Noticias</h1>
                <hr>
                <form role='form' method='post' action='mensaje.php' enctype='multipart/form-data'>
                    <div class='form-group'>
                        <label >titulo</label>
                        <input type='text' class='form-control' placeholder='titulo' maxlength='200' name='titulo' title='maximo 200 caracteres' required>
                    </div>
                    <div class='form-group'>
                        <label >Subtitulo (opcional)</label>
                        <input type='text' class='form-control' placeholder='subtitulo' maxlength='200' name='sub' title='maximo 200 caracteres'>
                    </div>
                    <div class='form-group'>
                        <label>resumen</label>
                        <textarea class='form-control ckeditor' id='txt_res' name='editor1'></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='exampleFormControlFile1'>Imagen principal de la Noticia </label>
                        <input type='file' class='form-control-file' name='img1' required>
                    </div>
                    <div class='form-group'>
                        <label >pie de foto de imagen (colocar autor de foto.)</label>
                        <input type='text' class='form-control' placeholder='pie de foto' maxlength='200' name='pie_foto1' required>
                    </div>
                    <div class='form-group'>
                        <label>Parrafo1</label>
                        <textarea class='form-control ckeditor' id='txt_p1' name='editor2'></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='exampleFormControlFile1'>Imagen entre parrafos (opcional) </label>
                        <input type='file' class='form-control-file' name='img2'>
                    </div>
                    <div class='form-group'>
                        <label >pie de foto de imagen 2 (colocar autor de foto. opcional)</label>
                        <input type='text' class='form-control' placeholder='pie de foto' maxlength='200' name='pie_foto2'>
                    </div>
                    <div class='form-group'>
                        <label>Parrafo2(opcional)</label>
                        <textarea class='form-control ckeditor' id='txt_p2' name='editor3'></textarea>
                    </div>
                    <div class='form-group'>
                        <label for='exampleFormControlFile1'>Imagen 3 entre parrafos (opcional) </label>
                        <input type='file' class='form-control-file' name='img3'>
                    </div>
                    <div class='form-group'>
                        <label >pie de foto de imagen 3 (colocar autor de foto. opcional)</label>
                        <input type='text' class='form-control' placeholder='pie de foto' maxlength='200' name='pie_foto3'>
                    </div>
                    <div class='form-group'>
                        <label>Parrafo3(opcional)</label>
                        <textarea class='form-control ckeditor' id='txt_p3' name='editor4'></textarea>
                    </div>
                    <div class='form-group'>
                        <label>Parrafo4 (opcional)</label>
                        <textarea class='form-control ckeditor' id='txt_p4' name='editor5'></textarea>
                    </div>
                
                    <div class='form-group'>
                    <label >link de video (opcional)</label>
                    <label >Importante solo cambiar el codigo del link </label>
                    <input type='text' class='form-control' 
                        placeholder='https://www.youtube.com/embed/AFXe9XuUT4o'
                        name='video'>
                    </div>
                    <div class='form-group'>
                        <label >Auto de la redacción</label>
                        <input type='text' class='form-control' name='autor' required>
                    </div>

                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary' name='bt_subir_new'> Subir a paguina  </button>
                    </div> 
                </form>
                <hr>
                ";
               }

            }else {
                $log=FALSE;
                $editor_form="<div class='alert alert-danger alert-dismissible'>
                  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span></button>
                  <strong>Error! </strong> contraseña incorrecta.
              </div>";
            }

        }else{
            $log=FALSE;
            $editor_form="<div class='alert alert-danger alert-dismissible'>
            <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span></button>
            <strong>Error! </strong> Email no existente.
        </div>";
        }
    }else{
        $log=FALSE;
        $editor_form="
        ";
    }
    
    
    // password_verify($contra, $contraHash)


?>