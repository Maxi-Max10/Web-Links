<?php

session_start();
include_once '../model/conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sentencia = $bd->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password_us = ?");
$sentencia->execute([$usuario, $password]);
$datos = $sentencia->fetch(PDO::FETCH_OBJ);//Lo guardo dentro del objeto

// print_r($datos);

if ($datos === FALSE) {
    header('Location: ../login.php');
}elseif($sentencia->rowCount() == 1){
   $_SESSION['nombre'] = $datos->nombre;
   header('Location: ../index.php');
}

?>