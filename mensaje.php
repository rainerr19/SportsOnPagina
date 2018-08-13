<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UFT-8">    
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/misestilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="css/editor.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>SportsOnCol</title>
  </head>
  <body>
      
      <?php
require 'DBadmin.php';
if(isset($_POST["bt_subir"])){
    
    $error=FALSE;

    $resumen = $_POST["editor1"];
    $extra = $_POST["editor2"];
    
    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $dura = $_POST["duracion"];
    $encarg= $_POST["encar"];
    $cel = $_POST["cel"];
    $valor = $_POST["valor"];
    $eda_min = $_POST["min"];
    $eda_max =  $_POST["max"];
    $sex = $_POST["gender"];
    
    $fecha_li = $_POST["fecha_limite"];
    $hora_li = $_POST["hora_limite"];
    $fecha_ev = $_POST["fecha_evn"];
    $hora_ev = $_POST["hora_evn"];
    
    $limite_per = $_POST["limite_personas"];
    date_default_timezone_set("America/Mexico_City");    
    $fecha_post= date("Y-m-d H:i:s");//fecha de subida
    
    // <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3916.597046992243!2d-74.80579424978124!3d10.993757092135885!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef42d734ce53191%3A0x36096a35aad42f5e!2sParque+Suri+Salcedo!5e0!3m2!1ses!2sco!4v1533957481268" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    $ubica = $_POST["ubicacion"];
    $dire = $_POST["direccion"];
    
    if(empty($resumen)){
        $error = TRUE;
        echo "<h1>resumen vacio</h1>";
    }
    if(empty($titulo)){
        $error = TRUE;
        echo "titulo vacio";
    }
    if(empty($dura)){
        $error = TRUE;
        echo "campo duracion del evento vacio";
    }
    if(empty($encarg)){
        $error = TRUE;
        echo "campo encargado del evento vacio";
    }
    if($eda_min>=$eda_max){
        echo "Error en el rango de edad. (Edad minima es mayor que edad maxima) ";
    }

    if($sex=="NULL"){
        $sex=3;
    }elseif($sex=="Femenino"){
        $sex=0;
    }else{$sex=1;}
    
    if($valor==0){
        $valor=NULL;
    }
    
    if($error==FALSE){
        
        $admin = new Admin;
       
        // intval()//to int
        $newID = (intval($admin->nuevoID()))+1;
        //var_dump($newID);
        if (!file_exists("img/eventos/$newID")) {
            mkdir("img/eventos/$newID", 0777, true);
        }
        $formatos=array('.png','.jpg','.jpeg');
        
        $file_name=$_FILES["img"]["name"];
        $file_name_tmp=$_FILES["img"]["tmp_name"];
        
        $dir_guardar="img/eventos/$newID/$file_name";
        $dir = substr($file_name,strrpos($file_name,"."));
        
        if(in_array($dir,$formatos)){
            if (move_uploaded_file($file_name_tmp,$dir_guardar)){
                if($admin->insertEvento($titulo , $resumen, $tipo, $dura, $encarg, $cel, $valor,$extra,$fecha_post,$fecha_li,$fecha_ev,$limite_per,$ubica,$dire, $eda_min, $eda_max, $sex,$file_name)){
                    echo "subido con exito <br>";
                    echo"subido correctamente. <a href='admin.php'> Crear nuevo evento<a>";
                }else{
                    echo "error en sql";
                }
            }else{echo "error en subida de archivo";}
        }else{
            echo "archivo no permitido";
        }
    }
    
    
    
    
}
if(isset($_POST['btn_buscar'])){
    $title_del = $_POST['del_title'];
    $admin = new Admin;
    $evento = $admin->getEvento($title_del);
    if(!$evento){
        echo "<div class='alert alert-danger alert-dismissible'>
        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span></button>
       Evento no encontrado. (el titulo tiene que ser identico)
       <input class='form-control' id='idEvento' value='0' name='idEvento' hidden>
      </div>";
    }else{
        $idEvento = $evento["id_evento"];
        $tituloEvento = $evento["titulo"];
        $postEvento = $evento["fecha_post"];
        echo "evento  =  $idEvento <br>";
        echo "titulo  =  $tituloEvento <br>";
        echo "fecha de subida =  $postEvento";
        echo "<input class='form-control' id='idEvento' value='$idEvento' name='idEvento' hidden>";
    }

}

function deleteDir($dirPath) {
    if (! is_dir($dirPath)) {
        throw new InvalidArgumentException("$dirPath must be a directory");
    }
    if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
        $dirPath .= '/';
    }
    $files = glob($dirPath . '*', GLOB_MARK);
    foreach ($files as $file) {
        if (is_dir($file)) {
            self::deleteDir($file);
        } else {
            unlink($file);
        }
    }
    rmdir($dirPath);
}


if(isset($_POST['btn_eliminar'])){
    $id_evento = $_POST['id_evento'];
    
    $admin = new Admin;
    $dir="img/eventos/$id_evento/";
    //echo "eliminado.";
     if($admin->eliminarEvento($id_evento)){
        deleteDir($dir);
         echo "Evento eliminado con éxito.";
         echo "<input class='form-control' id='idEvento' value='0' name='idEvento' hidden>";
     }else{echo "error en sql";}
}
?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>