<?php
include 'hora.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/misestilos.css" type="text/css">
    <script src="js/jquery.js"></script>
    </script>
    <title>Registro</title>
  </head>
  
<body>
<?php
if(isset($_POST['btn-b'])){
    $idCancha=$_POST['btn-b'];
}
$o = new canchas();//se crea el objeto
$conteo=$o->numCanchas();//numero de canchas
$b = $o->datoCanchas($idCancha);//funcion que obtien los datos de la cancha 1
?>
    <div class="jumbotron">
        <div class="container">
            <h1>Horario de Cancha numero <?php print $conteo;?></h1>
            <h4>
                <?php
            date_default_timezone_set("America/Mexico_City");
            echo " La fecha y hora de hoy: " ."<strong>".date("d l H:i")."</strong>";
            ?>
            </h4>
        </div>
    </div>

    <div class="container">
        <div class="row">
          <div class="table-responsive">
            <table id="horario" class="table table-bordered table-striped table-condensed">          
            <?php
                actualiza();
               
                
                $ban = DBsemana($b["restric"]);//horrios restringidos
                //$reservado = DBsemana("1011L07-09S07-09D");
                $reservado = DBsemana($b["ocupacion"]);
                $actual=[date("l",strtotime("now")),date("H",strtotime("now"))];
                tablaCreator($ban,$reservado,$actual);
            ?>
            <tr></tr>
            </table>
            
          </div>
        </div>

    </div>
    <hr>
    <div class="container margin-b-2">
            <a href="#" class="btn btn-success btn-lg">Reservar seleccion <span class="badge" id="c">0</span></a>
            <button class="btn btn-warning btn-lg" onclick="clearSelec()">Borrar seleccion</button>
    </div>
  <hr>
  <br> 
<script>
    //jquery--hover effect
      $(document).ready(function(){
        $("td").hover(function(){
            $(this).addClass("success");
            }, function(){
            $(this).removeClass("success");
        })});
        // seleccion de una celda javascript
        var count=0;// global # de seleccion
        var celda1=[];// global horas seleccionada
        var celda2=[];// global dias selecionados
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
            console.log(celda1);
             //document.getElementById("se").innerHTML = ("horas= " + "cell-" + hora + "-" + d[dia]);
        }
        function clearSelec() {
            count=0;
            document.getElementById("c").innerHTML = count;
            for (i = 0; i < celda1.length; i++) {
                cel = "cell-" + celda1[i] + "-" + celda2[i];
                document.getElementById(cel).style.background = null;
                document.getElementById(cel).style.color = null;
                document.getElementById(cel).innerHTML="";
                
            }
            
        }
        
</script>
<script src="js/bootstrap.min.js"></script>

</body>

<!-- <footer>

        <div class="row">
         
            <div class="col-md-6">
                <h3>redes sociales</h3>
            </div>
            <div class="col-md-6">
                <h3>mensajes</h3>
            </div>
        </div>                
    

</footer> -->
</html>