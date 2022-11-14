<?php

session_start();
include_once '../Model/conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

//print_r($_POST);


$sentencia = $bd->prepare("SELECT * FROM admin WHERE usuario = ? AND password_ad = ? ");
$sentencia->execute([$usuario, $password]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);//Lo guardo dentro del objeto

// print $_SESSION['id'] = $datos->id;
if ($datos === FALSE) {
   header('Location: ../loginA.php?mensaje=no');
}else if( $sentencia->rowCount() == 1){
   $_SESSION['id_adm'] = $datos->id_adm;
   header('Location: ../index.php');
   
}



?>