<?php


print_r($_POST);

 

 session_start();
 include_once '../model/conexion.php';
    
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password_us'];
    

    $sentencia = $bd->prepare("INSERT INTO usuarios(usuario,email,password_us,nombre) VALUE (?,?,?,?)");
    $resultado = $sentencia->execute([$usuario,$email,$password,$nombre]);
   
    if ($resultado === TRUE) {
        header('Location: ../index.php');
    }else{
        echo 'ERROR';
    }







?>