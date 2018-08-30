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
     <h1>Escenarios deportivos</h1>
    <div class="card-deck">
     
        <div class="card bg-secondary">
            <img class="card-img-top" src="img/img_brasil.png" alt="Card image" style="max-height: 300px;width:100%">
            <div class="card-body">
            <h4 class="card-title">imagen prueba</h4>
            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            <a href="#" class="btn btn-primary">See more</a>
            </div>
        </div>
        <div class="card bg-secondary">
            <img class="card-img-top" src="img/img_hebreo.jpg" alt="Card image" style="max-height: 300px;width:100%">
            <div class="card-body">
            <h4 class="card-title">imagen prueba2</h4>
            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            <a href="#" class="btn btn-primary">See more</a>
            </div>
        </div>
        <div class="card bg-secondary">
            <img class="card-img-top" src="img/ppp.png" alt="Card image" style="max-height: 300px;width:100%">
            <div class="card-body">
            <h4 class="card-title">imagen prueba3</h4>
            <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
            <a href="#" class="btn btn-primary">See more</a>
            </div>
        </div>

        
    </div>
    <br>
    <div class='card-deck'>
     
        <div class='card bg-secondary'>
            <img class='card-img-top' src='img/img_hebreo.jpg' alt='Card image' style='max-height: 300px;width:100%'>
            <div class='card-body'>
            <h4 class='card-title'>imagen prueba2</h4>
            <p class='card-text'>Some example text some example text. John Doe is an architect and engineer</p>
            <a href='#' class='btn btn-primary'>See more</a>
            </div>
        </div>
        <div class='card bg-secondary'>
            <img class='card-img-top' src='img/ppp.png' alt='Card image' style='max-height: 300px;width:100%'>
            <div class='card-body'>
            <h4 class='card-title'>imagen prueba3</h4>
            <p class='card-text'>Some example text some example text. John Doe is an architect and engineer</p>
            <a href='#' class='btn btn-primary'>See more</a>
            </div>
        </div>
        <div class='card'>
        </div>

    </div>
</div>
<hr>


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