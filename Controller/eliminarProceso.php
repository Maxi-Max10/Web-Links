<?php

print_r($_POST);


    include '../model/conexion.php';

    $id_link = $_POST['id_link'];

    $sentencia = $bd->prepare("DELETE FROM links WHERE id_link = ?;");
    $resultado = $sentencia->execute([$id_link]);

    if ($resultado === TRUE) {
        header('Location: ../index.php');
    } 

?>