<?php 
require 'Conexion.php';
class canchas extends Conexion{
    function __construct(){
      parent::__construct();
    }
    function numCanchas(){
      $stmt = "SELECT COUNT(id_canchas) FROM canchas";
      $result = self::$conn->prepare($stmt);
      $result->execute();//ejcutar 
      $c = ($result->fetch(PDO::FETCH_ASSOC));
      $conteo = $c["COUNT(id_canchas)"];
      return $conteo ;
      $result->closeCursor();
    }
    function datoCanchas(){
        $stmt = "SELECT * FROM canchas";
        $result = self::$conn->prepare($stmt);
        $result->execute();//ejcutar 
        $datos = ($result->fetch(PDO::FETCH_ASSOC));
        return $datos ;
        $result->closeCursor();
      }
      function dateUpdate($now, $ocup, $canchaID){
          //UPDATE `canchas` SET `ocupacion` = '1011L1819M09-12I0809S07-09D', `fecha_g` = '2018-05-26 17:00:00' WHERE `canchas`.`id_canchas` = 1;
          $data=['actual'=>$now, 'prestamo'=>$ocup, 'id'=>$canchaID];
          $stmt = "UPDATE canchas SET ocupacion=:prestamo, fecha_g=:actual WHERE id_canchas=:id ";            //$stmt = "INSERT INTO canchas () VALUES (:nom, :ed, :se, :con, :cel, :mai)";
            $result = self::$conn->prepare($stmt);
            $result->execute($data);//
            $result->closeCursor();
      }
  }
 // $o = new canchas();//se crea el objeto
//   $conteo=$o->numCanchas();
//   $co=$o->datoCanchas();
function DBsemana( $horadb)
{    /*formato de hora --> 02-04L--> de 2am hasta 4pm del lunes
      formato de hora --> *D--> todas las horas del domingo
      formato de hora --> 02-04L2123M--> de 2am hasta 4pm del lunes y martes a las 9pm
      y 11pm
      L --> lunes
      M --> martes
      I --> miercoles
      J --> jueves
      V --> viernes
      S --> sabado
      D --> domingo
    */
    $size = strlen ($horadb);
    $semana=array(
    "L"=>array(),  
    "M"=>array(), 
    "I"=>array(), 
    "J"=>array(), 
    "V"=>array(), 
    "S"=>array(), 
    "D"=>array()  
    );
    $horas=[array(), array(), array(), array(), array(), array(), array()];
    $d = ["L","M","I","J","V","S","D"];    
    for ($i = 0; $i <= 6; $i++) {
        $pos =stripos($horadb, $d[$i]);
        if($pos){
            $tem = substr($horadb,0, $pos);
            $horadb = substr($horadb,$pos+1, $size);
            $pos2 =stripos($tem, "-");
            while($pos2) {
                $value1 = substr($tem, $pos2-2, 2);
                $value2 = substr($tem, $pos2+1, 2);
                for($j = $value1; $j <= $value2; $j++){
                    array_push($horas[$i], intval($j));
                }
                //$horadb = substr(,$pos, $size);  elimina el fracmento de string en pos2
                $tem = substr_replace($tem, '', $pos2-2, 5); 
                $pos2 =stripos($tem, "-");
            }
            $pos3 =stripos($tem, "*");
            if($pos3 !== false){
                for($k=0; $k <= 23; $k++){
                    array_push($horas[$i], $k);
                }
            }else{               
                if (strlen($tem)>0) {
                    # 
                    for($j = 0;$j <strlen ($tem); $j+=2){
                        array_push($horas[$i], intval(substr($tem, $pos2+$j, 2)));
                    }
                }
            }   
        }
    }
    $i=0;
    foreach( $d as $val ){
        $semana[$val] = $horas[$i];
        #var_dump($dia);
        $i+=1;
    }
    //echo $horas[0];
    //semana--->> array de horas[-,-,-,-]
    return $semana;
    
}
function consecutivo($arr)
{   sort($arr,SORT_NUMERIC);//ordenar
   $str = "";
    $sz = count($arr);
    $n1tem = $arr[0];
    array_push($arr, $arr[$sz-1]);
    if($sz<24){
        for ($i=0; $i < $sz; $i++) {
            $n2 = $arr[$i+1];
            $n1 = $arr[$i];
            if($n2!=$n1+1){
                if ($n1tem!=$n1){
                    if ($n1tem+1==$n1) {
                        if ($n1tem<10){$n1tem ="0$n1tem";}
                        if ($n1<10){$n1 = "0$n1";}
                        $str = $str."$n1tem$n1";
                    }else{
                        if ($n1tem<10){$n1tem ="0$n1tem";}
                        if ($n1<10){$n1 ="0$n1";}
                        $str = $str."$n1tem-$n1";
                    }
                }else{
                    if ($n1<10){$n1 = "0$n1";}
                    $str = $str.$n1;
                }
                $n1tem = $n2;
            }
        }
    }else{
        $str = $str."*";
    }
    return $str;
}
function semanaDB($semana)
{   $str='';
    $dia = ["L","M","I","J","V","S","D"];
    foreach( $dia as $val ){
        $ho =$semana[$val] ;
        
        if (count($ho)!=0) {
            $str=$str.consecutivo($ho).$val;
        }
    }
   //echo $dia;
    return $str;
}

function tablaCreator($semBAN,$semBloc,$now){
    echo "<tr class='active success'>
            <th>Horas</th>";
    $week=[
        "L" => ["Lunes","Monday"],
        "M" => ["Martes","Tuesday"],
        "I" => ["Miercoles","Wednesday"],
        "J" => ["Jueves","Thursday"],
        "V" => ["Viernes","Friday"],
        "S" => ["Sabado","Saturday"],
        "D" => ["Domingo","Sunday"]
    ];
    
    date_default_timezone_set("America/Mexico_City");
    $iDia=0;
    foreach($week as $d){
        if($now[0] == $d[1]){
            $now[0]="$iDia";
        }
        $iDia=$iDia+1;
        echo "<th>".$d[0]."<i style='color:grey;'>".date("-d",strtotime("now ".$d[1]))."</i>"."</th>";
    }
    echo"</tr>";
    for ($i=0; $i < 24 ; $i++) {
        if ($i<10) {
            if ($i==9) {
                $hora ="0$i-".($i+1);
            }else{
                $hora ="0$i-0".($i+1);     
            }                  
        }else {if($i==23){
                $hora ="$i-00";
                }else{
                    $hora ="$i-".($i+1);
                }
        }

        echo "<tr><th>$hora</th>";
        
        $dia = ["L","M","I","J","V","S","D"];
        for($j=0;$j < 7;$j++){
            $ar =$semBAN[$dia[$j]]; 
            $ar2 =$semBloc[$dia[$j]]; 
            //$semBloc
            if ($i==intval($now[1]) && $j==intval($now[0])){
                $celda = "<th class='cel-p' id='cell-$i-$j'>En progreso</th>";
            }else{

                if (count($ar)!=0 && count($ar2)!=0) {
                    $celda ="<td id='cell-$i-$j' onclick='cellSelec($i,$j)'></td>";
                    foreach($ar as $v){
                        if($v==$i){
                            $celda = "<th class='cel-ban' id='cell-$i-$j'>No habilitado</th>";
                        }
                    }
                    foreach($ar2 as $v2){
                        if($v2==$i){
                            $celda = "<th class='cel-busy' id='cell-$i-$j'>ocupado</th>"; 
                        }
                    }
                }else{
                    $celda ="<td id='cell-$i-$j' onclick='cellSelec($i,$j)'></td>";
                    if (count($ar)!=0){
                        foreach($ar as $v){
                            if($v==$i){
                                $celda = "<th class='cel-ban' id='cell-$i-$j'>No habilitado</th>";
                            }
                        }
                    }elseif (count($ar2)!=0) {
                        # code...
                        foreach($ar2 as $v2){
                            if($v2==$i){
                                $celda = "<th class='cel-busy' id='cell-$i-$j'>ocupado</th>";
                            }
                        }
                    }   
                }
            }
            echo $celda;
        }//end for
  echo "</tr>";
    }    
}
//
function actualiza(){
    $p = new canchas();
    $g = $p->datoCanchas(); //dia-mes-año hora:mi:s
    $guardado=strtotime($g["fecha_g"]);//stamp 2018-05-25 17:44:0
    $ocupa=DBsemana($g["ocupacion"]);//"1011L1819M09-12I07-09S07-09D"
    if($ocupa!=NULL){
        date_default_timezone_set("America/Mexico_City");
        $actual = strtotime("now");// stamp "now" "27-05-2018 09:01"
        $week=[
            "Monday" =>  "L",
            "Tuesday" =>  "M",
            "Wednesday" =>  "I",
            "Thursday" =>  "J",
            "Friday" =>  "V",
            "Saturday" =>  "S",
            "Sunday" =>  "D"
        ];
        while ($guardado < $actual) {
            $dia = date("l", $guardado);
            $dia = $week[$dia];
            $hora = date("H", $guardado);
            $dias = ["L","M","I","J","V","S","D"];                        
            for($i=0;$i<7;$i++){
                $d=$ocupa[$dias[$i]];
                if(NULL != $d){
                    foreach($d as $h){
                        if($h==$hora && $dia==$dias[$i]){
                            $ocupa[$dias[$i]] = array_diff($ocupa[$dias[$i]], array($h));
                            break;
                        }
                    }
                    
                }
            }
            
            $guardado = strtotime("+1 hour", $guardado);
            
        }

        $p->dateUpdate(date("Y-m-d H:i",$actual),semanaDB($ocupa),1); 
    }

}
// date_default_timezone_set("America/Mexico_City");
// echo "Today is " . date("d l H:i");//L--> minuscula semana
// echo "<br>";
// $startdate=strtotime("now");
// $enddate=strtotime("+24 hour", $startdate);
// while ($startdate < $enddate) {
//   echo date("l H", $startdate)."<br>";
//   $startdate = strtotime("+1 hour", $startdate);
// }
?>