<?php
  class Conexion {
    private $host, $Huser, $Hpass, $db, $charset;
    
    public function __construct() {
      $this->host = "localhost";
      $this->Huser = "root";
      $this->Hpass = "";
      $this->db = "crudproyecto";
      $this->charset = "utf8";
    }
      
    public function conectar(){
      try {
        $connection="mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
        $con=new PDO($connection,$this->Huser,$this->Hpass);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
      }catch(Exception $e){
        echo 'Error PDO: '.$e->getLine();
      }
          
      return $con;
    }
  }
?>