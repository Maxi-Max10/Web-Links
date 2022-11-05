<?php
session_start();

include_once '../model/conexion.php';


$id = $_POST['id'];
$titulo = $_POST['title'];
$url = $_POST['url'];
$descripcion = $_POST['description'];

// print_r($_POST);


$sentencia = $bd->prepare("INSERT INTO links(title,url,description,usuario_id) VALUES (?,?,?,?);");// no inserto id porque se va incrementando automaticamente
$resultado = $sentencia->execute([$titulo,$url,$descripcion,$id]);


if ($resultado === TRUE) {
    header('Location: ../index.php');
} else {
    //header('Location: index.php?mensaje=error');
    echo "error";
    exit();
}


?>