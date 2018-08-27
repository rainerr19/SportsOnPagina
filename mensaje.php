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
        $img = $evento["evento_imagen1"];
        echo "evento  =  $idEvento <br>";
        echo "titulo  =  $tituloEvento <br>";
        echo "fecha de subida =  $postEvento";
        echo "<input class='form-control' value='$img' name='idEvento' hidden>";
        echo "<input class='form-control' id='idEvento' value='$idEvento' name='idEvento' hidden>";
    }

}


if(isset($_POST['btn_eliminar'])){
    $id_evento = $_POST['id_evento'];
    $arch = $_POST['imagen'];
    $admin = new Admin;
    $dir="img/eventos/$id_evento/$arch";
    $dirEmty="img/eventos/$id_evento/";
    //echo "eliminado.";
     if($admin->eliminarEvento($id_evento)){
         unlink($dir);
         rmdir($dirEmty);
         echo "Evento eliminado con éxito.";
         echo "<input class='form-control' id='idEvento' value='0' name='idEvento' hidden>";
     }else{echo "error en sql";}
}

///////////////////////////Noticias////////////////////////////////////////7777
if(isset($_POST["bt_subir_new"])){
    $error=FALSE;

    $resumen = $_POST["editor1"];
    $p1 = $_POST["editor2"];
    
    $titulo = $_POST["titulo"];
    $sub = $_POST["sub"];
    $p2 = $_POST["editor3"];
    $p3 = $_POST["editor4"];
    $p4 = $_POST["editor5"];
    //$im1 = $_POST["img1"];
    $pie1 =  $_POST["pie_foto1"];
    //$im2 = $_POST["img2"];
    $pie2 =  $_POST["pie_foto2"];
    //$im3 = $_POST["img3"];
    $pie3 =  $_POST["pie_foto3"];
    $video =  $_POST["video"];
    $autor = $_POST["autor"];
    date_default_timezone_set("America/Mexico_City");    
    $fecha_post= date("Y-m-d H:i:s");//fecha de subida

    if(empty($resumen)){
        $error = TRUE;
        echo "<h1>resumen vacio</h1>";
    }
    if(empty($sub)){
        $sub= NULL;
    }
    if(empty($p1)){
        $error = TRUE;
        echo "parrafo vacio.
        ";
    }
    if(empty($p2)){
        $p2= NULL;
    }
    if(empty($p3)){
        $p3= NULL;
    }
    if(empty($p4)){
        $p4= NULL;
    }
    if(empty($pie2)){
        $pie2= NULL;
    }
    if(empty($pie3)){
        $pie3= NULL;
    }
    if(empty($video)){
        $video= NULL;
    }else{
        $find=strpos($video, "watch?v=");
        if($find != FALSE){
            $error==TRUE;
            echo "error en formato del link del video";
        }

        
    }
    if($error==FALSE){
        $admin = new Admin;
       
        // intval()//to int
        $newID = (intval($admin->nuevoIDnews()))+1;
        if (!file_exists("img/imgNews/$newID")) {
            mkdir("img/imgNews/$newID", 0777, true);// se crea archivo
        }
        $formatos=array('.png','.jpg','.jpeg');
        
        $imgEr= FALSE;
        $file_name=$_FILES["img1"]["name"];
        $file_name_tmp=$_FILES["img1"]["tmp_name"];
        if (!empty($_FILES["img2"]["name"])){
            $file_name2=$_FILES["img2"]["name"];
            $file_name_tmp2=$_FILES["img2"]["tmp_name"];
            $dir_guardar="img/imgNews/$newID/$file_name2";
             $dir = substr($file_name2,strrpos($file_name2,"."));
            if(in_array($dir,$formatos)){
                if (move_uploaded_file($file_name_tmp2,$dir_guardar)){
                    echo "subido correctamente. imagen2";
                }else{echo "error en subida de archivo img2";$imgEr= TRUE;}
            }else{
                echo "archivo no permitido imagen 2";
                $imgEr= TRUE;
            }
        }else{$file_name2 = NULL;}
        if (!empty($_FILES["img3"]["name"])){
            $file_name3=$_FILES["img3"]["name"];
            $file_name_tmp3=$_FILES["img3"]["tmp_name"];
            $dir_guardar="img/imgNews/$newID/$file_name3";
             $dir = substr($file_name3,strrpos($file_name3,"."));
            if(in_array($dir,$formatos)){
                if (move_uploaded_file($file_name_tmp2,$dir_guardar)){
                    echo "subido correctamente. imagen 3";
                }else{echo "error en subida de archivo img3";$imgEr= TRUE;}
            }else{
                echo "archivo no permitido imagen 3";
                $imgEr= TRUE;
            }
        }else{$file_name3 = NULL;}
        if($imgEr == FALSE){
            $dir_guardar="img/imgNews/$newID/$file_name";
            $dir = substr($file_name,strrpos($file_name,"."));
            if(in_array($dir,$formatos)){
                if (move_uploaded_file($file_name_tmp,$dir_guardar)){
                    if($admin->insertNoticia($titulo,$sub,$resumen, $p1, $p2, $p3, $p4, $autor,$fecha_post, $file_name, $pie1,$file_name2,$pie2,$file_name3,$pie3,$video)){
                        echo "nuevo id = $newID";
                        echo "subido correctamente. <a href='admin.php'> Crear nueva Noticia<a>";
                        
                    }else{
                        echo "error en sql";
                    }
                }else{echo "error en subida de archivo";}
                
            }else{
                echo "archivo no permitido";
            }
            
        }
    }
    
}

if(isset($_POST['btn_buscar_noticia'])){
    $title_del = $_POST['del_title'];
    $admin = new Admin;
    $Noticia = $admin->getNoticia($title_del);
    if(!$Noticia){
        echo "<div class='alert alert-danger alert-dismissible'>
        <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
          <span aria-hidden='true'>&times;</span></button>
       Noticia no encontrado. (el titulo tiene que ser identico)
       <input class='form-control' id='idNoticia' value='0' name='idNoticia' hidden>
      </div>";
    }else{
        $idNoticia = $Noticia["id_noticia"];
        $tituloNoticia = $Noticia["titulo"];
        $postNoticia = $Noticia["fecha"];
        echo "Noticia  =  $idNoticia <br>";
        echo "titulo  =  $tituloNoticia <br>";
        echo "fecha de subida =  $postNoticia";
        echo "<input class='form-control' value='$tituloNoticia' id='titulo_de' hidden>";
        echo "<input class='form-control' id='idNoticia' value='$idNoticia' name='idNoticia' hidden>";
    }

}


if(isset($_POST['btn_eliminar_noticia'])){
    $id_Noticia = $_POST['id_Noticia'];
     $title_del = $_POST['titulo_del'];
     $admin = new Admin;
     $Noticia = $admin->getNoticia($title_del);
     $img1=$Noticia["imagen1"];
     $dir="img/imgNews/$id_Noticia/$img1";
     $dirEmty="img/imgNews/$id_Noticia/";
     unlink($dir);
     
     if($Noticia["imagen2"]!=NULL){
        echo "eliminado imagen2";
        $img2=$Noticia["imagen2"];
        $dir="img/imgNews/$id_Noticia/$img2";
        unlink($dir);
    }
    if($Noticia["imagen3"]!=NULL){
        echo "eliminado imagen3";
        $img3=$Noticia["imagen3"];
        $dir="img/imgNews/$id_Noticia/$img3";
        unlink($dir);
    }
        
        //echo "eliminado. <br> <input class='form-control' id='idNoticia' value='0' name='idNoticia' hidden> ";
     if($admin->eliminarNoticia($id_Noticia)){
         rmdir($dirEmty);
         echo "Evento eliminado con éxito.";
         echo "<input class='form-control' id='idNoticia' value='0' name='idNoticia' hidden>";
     }else{echo "error en sql";}
}

?>