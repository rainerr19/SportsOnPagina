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
    <h1>Escenarios</h1>
    <hr>
    <form role='form' method='post' action='mensaje.php' enctype='multipart/form-data'>
    <div class='form-group'>
        <label >Nombre de escenario </label>
        <input type='text' class='form-control' placeholder='Nombre' maxlength='45' name='name' title='maximo 45 caracteres' required>
    </div>
    <div class='form-group'>
        <label >Caracteristicas </label>
        <input type='text' class='form-control' placeholder='Caracteristicas' maxlength='250' name='cara' title='maximo 45 caracteres' required>
    </div>
    <div class='form-group'>
        <label for='Select1'>Paga?</label>
        <select class='form-control' id='Select1' name='paga'>
            <option>No</option>
            <option>Si</option>
        </select>
    </div>
    <div class='form-group'>
        <label>Detalles</label>
        <textarea class='form-control ckeditor' id='txt_res' name='editor1'></textarea>
    </div>
    <div class='form-group'>
        <label for='Select2'>Tipo</label>
        <select class='form-control' id='Select2' name='tipo'>
            <option>Futbol</option>
            <option>Baloncesto</option>
            <option>Mixto</option>
            </select>
    </div>
    <div class='form-group'>
        <label >direccion</label>
        <input type='text' class='form-control' maxlength='45' name='direccion' required>
    </div>
        <div class='form-group'>
            <label >Ubicacion  (Cordenadas geograficas)</label>
            <input type='number' class='form-control' placeholder='Latitud' name='lat' min='-180' max='180' lang='en' step='0.000001' required>
            <input type='number' class='form-control' placeholder='Longitud' name='lon' min='-180' max='180' lang='en' step='0.000001' required>
        </div>
        <div class='form-group'>
            <label >link mapa google del escenario</label>
            <input type='text' class='form-control' 
                placeholder='<iframe src=  allowfullscreen></iframe>'
                name='mapa' required>
        </div>   
        
        <div class='form-group'>
            <label >encargado</label>
            <input type='text' class='form-control' name='encar'>
        </div>
        <div class='form-group'>
            <label >correo</label>
            <input type='email' class='form-control' name='correo'>
        </div>
        <div class='form-group'>
            <label>Celular(opcional)</label>
            <input type='number' class='form-control' name='cel' placeholder='Celular' min='1000000000'>
        </div> 
        <div class='form-group'>
            <label for='exampleFormControlFile1'>subir imagen del Escenario</label>
            <input type='file' class='form-control-file' name='img' required>
        </div>
        <h4>horario restringido</h4>
        <p>(seleccione las hora en las que el escenario no se puede prestar)</p>
        <hr>
        <div class="form-group table-responsive">
            <table id="horario" class="table table-bordered table-striped table-condensed">
                <?php
                include 'hora.php';
                $ban = DBsemana("");//horrios restringidos
                //$reservado = DBsemana("1011L07-09S07-09D");
                $reservado = DBsemana("");
                //date_default_timezone_set("America/Mexico_City");
                //$actual=[date("l",strtotime("now")),date("H",strtotime("now"))];
                //var_dump($actual);
                tablaCreator($ban,$reservado,[" ","-1"]); 
                ?>
            </table>
        </div>
        <div class='form-group'>
            <a class="btn btn-warning" onclick='clearSelec()'>Borrar seleccion<span class='badge' id='c'>0</span></a>
            <input type='text' name='ban_dia' id='dia' hidden>
            <input type='text' name='ban_hora' id='hora' hidden>
        </div>
        <hr>		
        <div class='form-group'>
            <button type='submit' class='btn btn-primary' name='bt_subir_escenario'> Subir a paguina  </button>
        </div> 
     
    </form>
    <hr>
</div>
<hr>


<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script>	 -->
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
<script>
    //jquery--hover effect
      $(document).ready(function(){
        $("td").hover(function(){
            $(this).addClass("success");
            }, function(){
            $(this).removeClass("success");
        })
        });
        // seleccion de una celda javascript
        var count=0;// global # de seleccion
        var celda1=[];// global horas seleccionada
        var celda2=[];// global dias selecionados
        document.getElementById("dia").value = "";
        document.getElementById("hora").value = "";
        function cellSelec(hora,dia) {
            //var count=document.getElementById("c");
            count=count+1;
          
            var d = ["L","M","I","J","V","S","D"]; 
            var cel = "cell-" + hora + "-" + dia;
            document.getElementById(cel).style.background = "#5cb85c";
            document.getElementById(cel).style.color = "white";
            document.getElementById(cel).innerHTML="selec";
            document.getElementById("c").innerHTML = count;
            celda1.push(hora);
            celda2.push(dia);
            document.getElementById("hora").value = celda1;
            document.getElementById("dia").value = celda2;
            console.log(celda1);
            console.log(celda2);
             //document.getElementById("se").innerHTML = ("horas= " + "cell-" + hora + "-" + d[dia]);
        }
        //limppiar seleccion
        function clearSelec() {
            count=0;
            
            document.getElementById("c").innerHTML = count;
            document.getElementById("dia").innerHTML = "";
            document.getElementById("hora").innerHTML = "";
            for (i = 0; i < celda1.length; i++) {
                cel = "cell-" + celda1[i] + "-" + celda2[i];
                document.getElementById(cel).style.background = null;
                document.getElementById(cel).style.color = null;
                document.getElementById(cel).innerHTML="";
                
            }
            celda1=[];
            celda2=[];
            
        }
        
</script>
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