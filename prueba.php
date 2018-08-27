<!DOCTYPE html>
<html lang="es">
  <head>  
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
  
  <header>
   <nav class="navbar sticky-top navbar-expand-md bg-dark navbar-dark" role="navigation">
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
              <span class="navbar-toggler-icon"></span>
            </button>
              <!-- <a class="navbar-brand" href="#">
                <img alt="Brand" src="img/ppp.png" width="100" height="40">
              </a> -->
              <a href="index_main.php" class="navbar-brand">SportsOn</a>
            <!-- menu -->
            <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">
  
              <li class="nav-item">
              <a class="nav-link" href="index_main.php">Inicio</a>
              </li>
  
              <li class="nav-item">
              <a class="nav-link" href="canchas.php">Canchas</a>
              </li>
              <li class='nav-item'>
                  <a class='nav-link active' href='registro.php'>Registro</a>
              </li>
           </ul>
           <ul class='navbar-nav ml-auto'>
                  <li class='dropdown'>
                    <a class='nav-link dropdown-toggle' href='#' data-toggle='dropdown'>
                       $nom 
                    </a>
                    <div class='dropdown-menu dropdown-menu-right'>
                      <a class='dropdown-item' href='#'>Perfil</a>
                      <a class='dropdown-item' href='close.php'>Cerrar Sesion</a>
                    </div>
                  </li>
                </ul>
            </div>
  
        </nav>
    </header>
    <!-- fin de header -->
<br>
<hr>
 <div class="container">
     <h1>Noticias</h1>
    
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
    <nav class="navbar navbar-light bg-light justify-content-between">
     <a class="navbar-brand">Eliminar Noticia por nombre <br>(buscar nombre de la Noticia a eliminar)</a>
    <!-- <a class="navbar-brand"> (buscar nombre de evento a eliminar)</a> -->
    <form class="form-inline">
        <input class='form-control mr-sm-3' id='del_title' placeholder='buscar' maxlength='200' required>
        <button type='button' class='btn btn-outline-danger my-3 my-sm-0' value="1" id='buscar'>Eliminar</button>
    </form>
    </nav>
</div>
<hr>
<br>
<div class="modal fade" tabindex="-1" role="dialog" id="Modal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- <form role="form" method="post" action=""> -->
        <div class="modal-body">
            <div class="container" id="mensaje">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" >Close</button>
            <button type="button" class="btn btn-danger" id="eliminar" >Eliminar</button>
        </div>
      <!-- </form> -->
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script>	 -->
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
$(document).ready(function(){
    $("#buscar").click(function(){
        //$("#forgot").html(hidden);
        
        if ($('#del_title').val() != "") {
            if($('#buscar').val()==1){
            //console.log("noticia");
            $.post("mensaje.php",
                {   btn_buscar_noticia: "1",
                    del_title: $('#del_title').val()
                },
                function(data, status){
                    if(status=="success"){
                        //console.log(data);
                        $("#mensaje").html(data);
                        if($('#idNoticia').val()==0){
                            $("#eliminar").attr({
                                "id" : "eliminar",
                                "class" : "btn btn-danger",
                                "disabled": ""
                            });
                        }else{$("#eliminar").removeAttr("disabled")}
                        $('#Modal').modal('show');
                    }else{alert("ERROR: response");};

                });
            }else{
                //console.log("evento");
                $.post("mensaje.php",
                {   btn_buscar: "1",
                    del_title: $('#del_title').val()
                },
                function(data, status){
                    if(status=="success"){
                        //console.log(data);
                        $("#mensaje").html(data);
                        if($('#idEvento').val()==0){
                            $("#eliminar").attr({
                                "id" : "eliminar",
                                "class" : "btn btn-danger",
                                "disabled": ""
                            });
                        }else{$("#eliminar").removeAttr("disabled")}
                        $('#Modal').modal('show');
                    }else{alert("ERROR: response");};

                });
            }
        }

    });
    $("#eliminar").click(function(){
        if($('#buscar').val()==1){
            
            if ($('#idNotica').val() != "") {
                
                $.post("mensaje.php",
                {   btn_eliminar_noticia: "1",
                    id_Noticia: $('#idNoticia').val(),
                    titulo_del: $('#del_title').val()
                },
            function(data, status){
                if(status=="success"){
                    //console.log(data);
                    $("#mensaje").html(data);
                    if($('#idNoticia').val()==0){
                        $("#eliminar").attr({
                            "id" : "eliminar",
                            "class" : "btn btn-danger",
                            "disabled": ""
                        });
                    }else{$("#eliminar").removeAttr("disabled")}
                $('#Modal').modal('show');
                    //console.log("hola");
                }else{alert("ERROR: response");};

            });
            }

        }else{
            
            if ($('#idEvento').val() != "") {
                
                $.post("mensaje.php",
                {   btn_eliminar: "1",
                    imagen: $('#img').val(),
                    id_evento: $('#idEvento').val()
                },
            function(data, status){
                if(status=="success"){
                    //console.log(data);
                    $("#mensaje").html(data);
                    if($('#idEvento').val()==0){
                        $("#eliminar").attr({
                            "id" : "eliminar",
                            "class" : "btn btn-danger",
                            "disabled": ""
                        });
                    }else{$("#eliminar").removeAttr("disabled")}
                    $('#Modal').modal('show');
                }else{alert("ERROR: response");};

            });
            }

        }
        //$('#Modal').modal('show');
    });
});

</script>
<script type="text/javascript">
CKEDITOR.replace( 'editor1', {
  toolbar: [
    { name: 'document', items: [ 'Undo', 'Redo' ] },
    { name: 'styles', items: [ 'Format' ] },
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] }
  ]
 
} );
CKEDITOR.replace( 'editor2', {
  toolbar: [
    { name: 'document', items: [ 'Undo', 'Redo' ] },
    { name: 'styles', items: [ 'Format' ] },
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] }
  ]
 
} );
CKEDITOR.replace( 'editor3', {
  toolbar: [
    { name: 'document', items: [ 'Undo', 'Redo' ] },
    { name: 'styles', items: [ 'Format' ] },
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] }
  ]
 
} );CKEDITOR.replace( 'editor4', {
  toolbar: [
    { name: 'document', items: [ 'Undo', 'Redo' ] },
    { name: 'styles', items: [ 'Format' ] },
    { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
    { name: 'paragraph', items: [ 'NumberedList', 'BulletedList' ] },
    { name: 'links', items: [ 'Link', 'Unlink' ] }
  ]
 
} );
</script>
  
</body>
</html> 