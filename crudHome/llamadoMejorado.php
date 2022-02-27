<?php

    include_once './crudMejorado.php';
    CRUD::get();

    $function = $_POST['function'];
    $clase = "CRUD";
    $clase::$function();

    var_export($_POST);

?>