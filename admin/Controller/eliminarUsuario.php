<?php

print_r($_POST);


    include '../model/conexion.php';

    $id = $_POST['id'];

    $sentencia = $bd->prepare("DELETE FROM usuarios WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);

    if ($resultado === TRUE) {
        
        header('Location: ../index.php');
    } 

?>