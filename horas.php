<?php
include 'hora.php';
if(!isset($_SESSION)){
    session_start();}
  //enviar post con--> action="recibir.php"
  if(isset($_COOKIE["cookieUserEmail"]) && isset($_COOKIE["cookieUserNombre"]) && !isset($_SESSION["nombreUser"])){
    $_SESSION["nombreUser"]=$_COOKIE["cookieUserNombre"];
    //$_SESSION["cel"]=$celular;
    $_SESSION["email"]=$_COOKIE["cookieUserEmail"];
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">  <!-- texto español -->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximun-scale=1, minimun-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/misestilos.css" type="text/css">
    </script>
    <link rel="icon" href="img/sprtON_icon.ico">
    <title>Horario</title>
  </head>
  
<body>
<header>
      <nav class="navbar  navbar-expand-md bg-dark navbar-dark" role="navigation">
        
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu1">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="index.php">
              <img alt="Brand" src="img/logo2.png" style="width: 10rem;height: 4rem;">
            </a>
            <!-- <a href="index_main.php" class="navbar-brand">SportsOn</a> -->
          <!-- menu -->
          <div class="collapse navbar-collapse" id="menu1">
            <ul class="navbar-nav">
              <li class='nav-item'>
                <a class='nav-link' href="index.php">Inicio</a>
              </li>
              <li class='nav-item active'>
                <a class='nav-link' href="#">Canchas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="eventos.php">Eventos</a>
              </li>
            <?php 
            if (!isset($_SESSION['nombreUser'])) {
              echo "
              <li class='nav-item'>
              <a class='nav-link' href='registro.php'>Registro</a>
                </li>
              </ul>
                <ul class='navbar-nav ml-auto'>
                  <li class='nav-item dropdown'>
                    <a class='nav-link' href='inicioS.php'>
                      Inicia Sesion
                    </a>
                  </li>
                </ul> ";
            }else{
              $nom =$_SESSION['nombreUser'];
              echo "
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
                </ul>  ";
            }
            ?>
          </div>

      </nav>
</header>

<?php
if(isset($_POST['btn-b'])){
    $idCancha = $_POST['btn-b'];
}else{

    header("location:canchas.php");
}
$o = new canchas();//se crea el objeto
$conteo=$o->numCanchas();//numero de canchas
$b = $o->datoCanchas($idCancha);//funcion que obtien los datos de la cancha 1
$Cnombre = $b["nombre"];
$detalles=$b["detalles"];
$tipo = $b["tipo"];
$dir = $b["direccion"];
$img = $b["imgen"];//img_brasil.png
?>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-7">

                    <h1>Horario de Cancha <?php print $Cnombre;?></h1>
                    <h4>
                        <?php
                    date_default_timezone_set("America/Mexico_City");
                    echo " La fecha y hora de hoy: " ."<strong>".date("d l H:i")."</strong>";
                    ?>
                    </h4>
                    <button id="update" class="btn btn-primary btn-lg">Actualizar horarios</button>
                </div>
                <div class="col-md-5">
                <ul class="list-group">

                    <h3>Codigo de colores</h3>
                <li class="list-group-item">Horario libre</li>
                <li class="list-group-item" style="background-color:#d74338">Horario reservado</li>
                <li class="list-group-item" style="background-color:#99583D">Horario en progreso</li>
                <li class="list-group-item list-group-item-dark">Horario no habil para prestamo</li>
                </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-1">  </div>
            <div class="col-md-10">  
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
            <div class="col-md-1">  </div>
        </div>

    </div>
    <hr>
    <div class="container margin-b-2">
            <a class="btn btn-success btn-lg" id="prestamo" type="button">Reservar seleccion <span class="badge" id="c">0</span></a>
            <button class="btn btn-warning btn-lg" onclick="clearSelec()">Borrar seleccion</button>
    </div>
  <hr>
  <br> 
  
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-6">
      <ul class="social">
        <span>Red Social</span>    
          <li>
              <a href="#"><i class="fa fa-facebook fa-4x"></i></a>
          </li>
        
          <li>
              <a href="#"><i class="fa fa-twitter fa-4x"></i></a>
          </li>
          
          <li>
              <a href="#"><i class="fa fa-instagram fa-4x"></i></a>
          </li>
        
    </ul>
      </div>
      <div class="col-md-6">
      <ul class="adress">
          <span>Contacto</span>    
          <li>
            <p>Lorem ipsum dolor sit amet, vero omnis vocibus</p>
          </li>
                
          <li>
            <p>+57 1234 56789</p>
          </li>
                
          <li>
            <p>info@gmail.com</p>
          </li>
      </ul>
      </div>
    </div>
  </div>
</footer>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
    //jquery--hover effect
      $(document).ready(function(){
        $("td").hover(function(){
            $(this).addClass("success");
            }, function(){
            $(this).removeClass("success");
        })
        });
        //actualizar pagina
        var cid = '<?php echo $idCancha;?>';
        $("#update").click(function() {
            $.ajax({
                type : "POST",
                url : "horas.php", 
                data : {'btn-b':cid},
                success : function(data) {
                    location.reload(true);
                }
            }); 
        });
        //prestamo
        $("#prestamo").click(function() {
            if ( celda1.length == 0) {
                alert("NO hay seleccion");
            } else {
                
            
            var txt;
            var conf="";
            var D = ["Lunes","Martes","Miercoles","Jueves","Viernes","Sabado","Domingo"];
            for (i = 0; i < celda1.length; i++) {
                conf = conf +  "\n " + D[celda2[i]] + " hora- " + celda1[i];
                }
            var conftxt=" Confirmar prestamo"+conf;
            if (confirm(conftxt)) {
                txt = "ajax";
            } else {
                txt = "You pressed Cancel!";
            }
            console.log(txt);
            }
        });

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
            console.log(celda2);
             //document.getElementById("se").innerHTML = ("horas= " + "cell-" + hora + "-" + d[dia]);
        }
        //limppiar seleccion
        function clearSelec() {
            count=0;
            
            document.getElementById("c").innerHTML = count;
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