<?php
require 'DBadmin.php';
if(!isset($_SESSION)){
  session_start();}
if (isset($_SESSION['email'])){      
    $admin = new Admin;
    if($admin->existsEmail(isset($_SESSION['email']))){
        $log=FALSE;
    }else{  header("location:index.php");}

}
?>
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

    </header>
    <div class="container" <?php if($log){echo"hidden";}  ?> >
            <hr>
   <form class="form-horizontal" role="form" method="POST">
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <h2>Admin Login</h2>
               <hr>
           </div>
       </div>
       <div class="row">
            <div class="col-md-3"></div>
           <div class="col-md-6">
               <div class="form-group has-danger">
                   <label class="sr-only" for="email">E-Mail Address</label>
                   <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                       <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                       <input type="email" name="email" class="form-control"
                       placeholder="you@example.com" required autofocus>
                    </div>
                </div>
            </div>
            
       </div>
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <div class="form-group">
                   <label class="sr-only" for="password">Password</label>
                   <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                       <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                       <input type="password" name="passAdmin" pattern=".{8,}" title="8 o mas caracteres" class="form-control"
                               placeholder="Password" required>
                   </div>
               </div>
           </div>

       </div>
       <div class="row">
           <div class="col-md-3"></div>
           <div class="col-md-6" style="padding-top: .35rem">
           
                    <label for="Select1" class="sr-only">Agrgar: </label>
               <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <div class="col-sm-9">
                            <select class="form-control" id="Select1" name='agregar'>
                                <option>Eventos</option>
                                <option>Noticias</option>
                                <option>Escenarios</option>
                           
                  
                            </select>
                        </div> 
                   <!-- <label class="form-check-label">
                       <input class="form-check-input" name="remember"
                               type="checkbox" >
                       <span style="padding-bottom: .15rem">Remember me</span>
                   </label> -->
               </div>  
           </div>
       </div>
       <div class="row" style="padding-top: 1rem">
           <div class="col-md-3"></div>
           <div class="col-md-6">
               <button type="submit" name="btn_editor" class="btn btn-success"><i class="fa fa-sign-in"></i> Login</button>
               <!-- <a class="btn btn-link" href="#">Forgot Your Password?</a> -->
           </div>
       </div>
   </form>
   <hr>
</div>

<div class="container" >
    <?= $editor_form?>
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
            <button class="btn btn-danger" id="eliminar" >Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="ckeditor/ckeditor.js"></script>	 -->
<script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>

<script type="text/javascript">
        // document.getElementById("tabla").innerHTML ="<?php $ban = DBsemana("");
        //         $reservado = DBsemana("");
        //         echo 'hola';
        //         tablaCreator($ban, $reservado, [' ','-1']);?>";
     
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
     $(document).ready(function(){
        $("td").hover(function(){
            $(this).addClass("success");
            }, function(){
            $(this).removeClass("success");
        })
        });
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