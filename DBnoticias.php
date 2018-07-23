<?php 
require 'Conexion.php';
class noticias extends Conexion{
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
    function datoNoticias($noticiaID){
        $stmt = "SELECT * FROM noticias WHERE id_noticia=:id";
        $data=['id'=>$noticiaID];
        $result = self::$conn->prepare($stmt);
        $result->execute($data);//ejcutar 
        $datos = ($result->fetch(PDO::FETCH_ASSOC));
        return $datos ;
        $result->closeCursor();
      }
      
  }
  ?>