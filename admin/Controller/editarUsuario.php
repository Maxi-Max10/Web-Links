<?php

// print_r($_POST);

include_once '../model/conexion.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password_us = $_POST['password_us'];

$sentencia = $bd->prepare("UPDATE usuarios SET usuario = ?, nombre = ?, email = ?, password_us = ? WHERE id = ?");
$resultado = $sentencia->execute([$usuario,$nombre,$email,$password_us,$id]);

if ($resultado === TRUE) {
    header('Location: ../index.php');
} else {
    //header('Location: index.php?mensaje=error');
    echo "error";
    exit();
}


?>