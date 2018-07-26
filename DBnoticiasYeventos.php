<?php 
require 'Conexion.php';
class noticiasYeventos extends Conexion{
    function __construct(){
      parent::__construct();
    }
    function numNoticias(){
      $stmt = "SELECT COUNT(id_noticia) FROM noticias";
      $result = self::$conn->prepare($stmt);
      $result->execute();//ejcutar 
      $c = ($result->fetch(PDO::FETCH_ASSOC));
      $conteo = $c["COUNT(id_noticia)"];
      return $conteo ;
      $result->closeCursor();
    }
    function NoticiasRecientes($cantidad){
        $stmt = "SELECT id_noticia FROM noticias ORDER BY fecha DESC LIMIT $cantidad";
        $result = self::$conn->prepare($stmt);
        $result->execute();//ejcutar 
        $datos = []; 
        while ($row = ($result->fetch(PDO::FETCH_ASSOC))){
          $datos[] = $row;
        }
        
        return $datos ;
        $result->closeCursor();
      }
    function datoNoticias($noticiaID){
        $stmt = "SELECT * FROM noticias WHERE id_noticia=:id";
        $data=['id'=>$noticiaID];
        $result = self::$conn->prepare($stmt);
        $result->execute($data);//ejcutar 
        $datos = ($result->fetch(PDO::FETCH_ASSOC));
        return $datos ;
        $result->closeCursor();
      }
      function numEventosActivos($actual){
        $stmt = "SELECT COUNT(id_evento) FROM eventos WHERE fecha_limite>$actual";
       
        $result = self::$conn->prepare($stmt);
        $result->execute();//ejcutar 
        $c = ($result->fetch(PDO::FETCH_ASSOC));
        $conteo = $c["COUNT(id_evento)"];
        return $conteo ;
        $result->closeCursor();
      }
      function numUsuariosIscritos($eventosID){
        $stmt = "SELECT COUNT(id_usuario) FROM historial_eventos WHERE id_evento=$eventosID";
       
        $result = self::$conn->prepare($stmt);
        $result->execute();//ejcutar 
        $c = ($result->fetch(PDO::FETCH_ASSOC));
        $conteo = $c["COUNT(id_usuario)"];
        return $conteo ;
        $result->closeCursor();
      }
      function datoEventos($eventosID){
          $stmt = "SELECT * FROM eventos WHERE id_evento=:id";
          $data=['id'=>$eventosID];
          $result = self::$conn->prepare($stmt);
          $result->execute($data);//ejcutar 
          $datos = ($result->fetch(PDO::FETCH_ASSOC));
          return $datos ;
          $result->closeCursor();
        }
        function inscribir($IDusuario, $eventosID, $fecha_ins){
          $stmt = "INSERT INTO historial_eventos (id_usuario, id_evento, hora_inscripcion) VALUES (:id_u, :id_e, :ho)";
          $result = self::$conn->prepare($stmt);
          $result->execute(array(":id_u"=>$IDusuario,":id_e"=>$eventosID, ":ho"=>$fecha_ins));//se verifica lo que se inserto
          $conteo = $result->rowCount();//contar las filas que se seleccionan
          return $conteo > 0 ? true : false;
          $result->closeCursor();
        }
        function idUsuario($email){
          $stmt = "SELECT id_usuario FROM usuarios WHERE email = :email"; //statement
          $result = self::$conn->prepare($stmt);
          $result->execute(array(":email"=>$email));
          $c = ($result->fetch(PDO::FETCH_ASSOC));// te genera un arreglo en forma de json
          return $c["id_usuario"];// se toma el dato del arreglo;
          $result->closeCursor();
        }
        function usarioIscrito($IDusuario,$eventosID){
          $stmt = "SELECT COUNT(id_usuario) FROM historial_eventos WHERE id_usuario = :id_u AND id_evento = :id_e"; //statement
          $result = self::$conn->prepare($stmt);
          $result->execute(array(":id_u"=>$IDusuario,":id_e"=>$eventosID));
          $c = ($result->fetch(PDO::FETCH_ASSOC));// te genera un arreglo en forma de json
          $conteo = $c["COUNT(id_usuario)"];// se toma el dato del arreglo
          return $conteo > 0 ? true : false;
          $result->closeCursor();
        }
        function DataUsuario($email){
          $stmt = "SELECT * FROM usuarios WHERE email = :email";
          $result = self::$conn->prepare($stmt);
          $result->execute(array(":email"=>$email));
          return $result->fetch(PDO::FETCH_ASSOC);
          $result->closeCursor();
        }
        function EventosRecientes($cantidad){
          $stmt = "SELECT id_evento FROM eventos ORDER BY fecha_post DESC LIMIT $cantidad";
          $result = self::$conn->prepare($stmt);
          $result->execute();//ejcutar 
          $datos = []; 
          while ($row = ($result->fetch(PDO::FETCH_ASSOC))){
            $datos[] = $row;
          }
          
          return $datos ;
          $result->closeCursor();
        }
      
  }
  ?>