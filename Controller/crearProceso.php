<?php
    $mensaje = null;

    include_once '../model/conexion.php';

    $id = $_POST['id'];
    $titulo = $_POST['title'];
    $url = $_POST['url'];
    $descripcion = $_POST['description'];

    // print_r($_POST);

    $sentencia = $bd->prepare("INSERT INTO links(title,url,description,usuario_id) VALUES (?,?,?,?);");
    $resultado = $sentencia->execute([$titulo,$url,$descripcion,$id]);


    $mensaje = "<script>window.location='index.php';</script>";
   
    echo $mensaje;

?>