<?php
  include_once 'vista/formularioRegister.php';
  if(isset($_POST['submitLogin'])){
    header('location: index.php');
  }
?>