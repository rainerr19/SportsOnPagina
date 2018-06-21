<?php
  class Conexion{
    protected static $conn;
    function __construct(){
      if(self::$conn==null){
        try{
          self::$conn = new PDO("mysql:host=localhost;dbname=aplication", "root", "");
          self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//se activan las exception
          self::$conn->exec("SET CHARACTER SET UTF8");
        }catch(ePDOException $e){
          die("Error base de datos. " . $e->getMessage());
        }
      }
    }
  }
?>
