<?php
    include_once './conexion.php';
    $objeto     = new Conexion();
    $conexion   = $objeto->Conectar();

    class CRUD {

        public function __construct($objeto, $conexion){
            $this->objeto = $objeto;
            $this->conexion = $conexion;
        }

        public static function get(){
            $consulta   = "SELECT * FROM usuarios";
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute();        
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public static function insert(){
            $consulta   = "INSERT INTO usuarios (username, first_name, last_name, gender, password, status) VALUES('$username', '$first_name', '$last_name', '$gender', '$password', '$status') ";			
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute(); 
            
            $consulta   = "SELECT * FROM usuarios ORDER BY user_id DESC LIMIT 1";
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);  
        }

        public static function update(){
            $consulta   = "UPDATE usuarios SET username='$username', first_name='$first_name', last_name='$last_name', gender='$gender', password='$password', status='$status' WHERE user_id='$user_id' ";		
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute();        
            
            $consulta   = "SELECT * FROM usuarios WHERE user_id='$user_id' ";       
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function delete(){
            $consulta   = "DELETE FROM usuarios WHERE user_id='$user_id' ";		
            $resultado  = $conexion->prepare($consulta);
            $resultado->execute();    
        }
    }

    print json_encode($data, JSON_UNESCAPED_UNICODE);
    $conexion=null;

?>