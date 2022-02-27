<?php
include_once './conexion.php';
$objeto     = new Conexion();
$conexion   = $objeto->Conectar();

$name       = (isset($_POST['name']))       ? $_POST['name']        : '';
$code       = (isset($_POST['code']))       ? $_POST['code']        : '';
$contents   = (isset($_POST['contents']))   ? $_POST['contents']    : '';
$type       = (isset($_POST['type']))       ? $_POST['type']        : '';
$process    = (isset($_POST['process']))    ? $_POST['process']     : '';


$opcion     = (isset($_POST['opcion']))     ? $_POST['opcion']      : '';
$user_id    = (isset($_POST['user_id']))    ? $_POST['user_id']     : '';


switch(strval($opcion)){
    case 'insert':
        $test = $code."-".uniqid();
        // $consulta   = "INSERT IGNORE INTO doc_documento (DOC_NOMBRE, DOC_CODIGO, DOC_CONTENIDO, DOC_ID_TIPO, DOC_ID_PROCESO) VALUES ('$name', '$test', '$contents', '$type', '$process');";			
        $consulta = "INSERT IGNORE INTO doc_documento
                        SELECT MAX(dd.DOC_ID) + 1, '$name', CONCAT(pp.PRO_NOMBRE, '-', tt.TIP_PREFIJO, '-', UUID()), '$contents', '$type', '$process'
                    FROM doc_documento AS dd
                    INNER JOIN pro_proceso AS pp ON (dd.DOC_ID_TIPO = pp.PRO_ID)
                    INNER JOIN tip_tipo_doc AS tt ON (dd.DOC_ID_PROCESO = tt.TIP_ID);";
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute(); 
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);       
    break;    
    case 'update':        
        $consulta   = "UPDATE doc_documento SET DOC_NOMBRE = '$name', DOC_CONTENIDO = '$contents', DOC_ID_TIPO = '$type', DOC_ID_PROCESO = '$process' WHERE DOC_ID = '$user_id';";		
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
    case 'delete':        
        $consulta   = "DELETE FROM doc_documento WHERE DOC_ID = '$user_id';";		
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute();                           
    break;
    case 'get':    
        $consulta   = "SELECT dd.DOC_ID, dd.DOC_NOMBRE, dd.DOC_CODIGO, dd.DOC_CONTENIDO, pp.PRO_PREFIJO, tt.TIP_NOMBRE
                        FROM doc_documento AS dd 
                        LEFT JOIN pro_proceso AS pp ON (dd.DOC_ID_PROCESO = pp.PRO_ID)
                        LEFT JOIN tip_tipo_doc AS tt ON (dd.DOC_ID_TIPO = tt.TIP_ID);";
        $resultado  = $conexion->prepare($consulta);
        $resultado->execute();        
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    break;
}
//envio el array final el formato json a AJAX
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = null;