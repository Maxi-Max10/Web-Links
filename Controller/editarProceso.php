<?php

// print_r($_POST);


include_once '../model/conexion.php';

$id_link = $_POST['id_link'];
$title = $_POST['title'];
$url = $_POST['url'];
$description = $_POST['description'];
$created_at = $_POST['created_at'];

$sentencia = $bd->prepare("UPDATE links SET title = ?, url = ?, description = ?, created_at = ? WHERE id_link = ?");
$resultado = $sentencia->execute([$title,$url,$description,$created_at,$id_link]);

if ($resultado === TRUE) {
    header('Location: ../index.php');
} else {
    //header('Location: index.php?mensaje=error');
    echo "error";
    exit();
}


?>