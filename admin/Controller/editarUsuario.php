<?php
    include_once '../model/conexion.php';
    $mensaje = null;

    
    
 if (isset($_POST["ajaxEd"]))
{
   $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password_us = $_POST['password_us'];

    // var_dump($resultadoUsu); imprimo

    
    if ($nombre == "") {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Por favor ingrese nombre.';</script>"; 

    }else if (!preg_match('/^\S+$/',$nombre)) {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='No ingrese solo espacios';</script>"; 

    }else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i',$nombre)){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Solo se permiten letras!';</script>";

    }else if(strlen($nombre) < 3){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El nombre debe contener al menos 3 caracteres.';</script>";
        
    }else  if ($usuario == "") {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='Por favor ingrese usuario.';</script>";

    }else if (!preg_match('/^\S+$/',$usuario)) {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='No ingrese solo espacios.';</script>"; 

    }else  if(strlen($usuario) < 3){
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='El usuario debe contener al menos 3 caracteres.';</script>";
        
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='Email inválido.';</script>";

    }else if (strlen($password_us) < 6) {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='La contraseña debe contener por lo menos 6 caracteres.';</script>";

    }else if(!preg_match('/^\S+$/',$password_us)){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Dato incorrecto.';</script>"; 

    }else{
       
      $sentencia = $bd->prepare("UPDATE usuarios SET usuario = ?, nombre = ?, email = ?, password_us = ? WHERE id = ?");
      $resultado = $sentencia->execute([$usuario,$nombre,$email,$password_us,$id]);

        
        $mensaje = "<script>window.location='index.php';</script>";
        }

}
    
echo $mensaje;

?>