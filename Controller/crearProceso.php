<?php
session_start();

include_once '../model/conexion.php';

$titulo = $_POST['title'];
$url = $_POST['url'];
$descripcion = $_POST['description'];

$sentencia = $bd->prepare("INSERT INTO links(title,url,description) VALUES (?,?,?);");// no inserto id porque se va incrementando automaticamente
$resultado = $sentencia->execute([$titulo,$url,$descripcion]);

if ($resultado === TRUE) {
    header('Location: ../index.php');
} else {
    //header('Location: index.php?mensaje=error');
    echo "error";
    exit();
}


?>