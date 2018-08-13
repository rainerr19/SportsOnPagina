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
     <h1>eventos</h1>
    
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
            <input type='number' class='form-control' name='valor' required>
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
    <nav class="navbar navbar-light bg-light justify-content-between">
     <a class="navbar-brand">Eliminar evento por nombre <br>(buscar nombre de evento a eliminar)</a>
    <!-- <a class="navbar-brand"> (buscar nombre de evento a eliminar)</a> -->
    <form class="form-inline">
        <input class='form-control mr-sm-3' id='del_title' placeholder='buscar' maxlength='45' required>
        <button type='button' class='btn btn-outline-danger my-3 my-sm-0' id='buscar'>Eliminar</button>
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
      <form role="form" method="post" action="">
        <div class="modal-body">
            <div class="container" id="mensaje">
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal" >Close</button>
            <button class="btn btn-danger" data-dismiss="modal" id="eliminar" >Eliminar</button>
        </div>
      </form>
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

    });
    $("#eliminar").click(function(){
        
        if ($('#idEvento').val() != "") {
            
            $.post("mensaje.php",
            {   btn_eliminar: "1",
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
</script>
  
</body>
</html> 