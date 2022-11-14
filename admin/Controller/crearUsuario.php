<?php
$mensaje = null;

    

include_once '../model/conexion.php';


$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password_us = $_POST['password_us'];

$sentencia = $bd->prepare("INSERT INTO usuarios(usuario,email,password_us,nombre) VALUE (?,?,?,?)");
$resultado = $sentencia->execute([$usuario,$email,$password_us,$nombre]);


$mensaje = "<script>window.location='index.php';</script>";
   
echo $mensaje;
?>