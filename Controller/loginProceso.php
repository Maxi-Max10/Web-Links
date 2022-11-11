<?php

session_start();
include_once '../model/conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

//print_r($_POST);


$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password_us = ? ");
$sentencia->execute([$usuario, $password]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);//Lo guardo dentro del objeto

// print $_SESSION['id'] = $datos->id;
if ($datos === FALSE) {
   header('Location: ../login.php?mensaje=no');
}else if( $sentencia->rowCount() == 1){
   $_SESSION['id'] = $datos->id;
   header('Location: ../index.php');
   
}



?>