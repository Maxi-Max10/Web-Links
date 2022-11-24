<?php
    include_once '../model/conexion.php';
    $mensaje = null;

    
    
 if (isset($_POST["ajax"]))
{
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password_us'];

    $buscoUsu = "SELECT * FROM usuarios WHERE usuario = ? ;";
    $sentenciaUsu = $bd->prepare($buscoUsu);
    $sentenciaUsu->execute(array($usuario));
    $resultadoUsu = $sentenciaUsu->fetch();

    $buscoMail = "SELECT * FROM usuarios WHERE email = ? ;";
    $sentenciaMail = $bd->prepare($buscoMail);
    $sentenciaMail->execute(array($email));
    $resultadoMail = $sentenciaMail->fetch();


    
    if ($nombre == "") {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Por favor ingrese nombre.';</script>"; 

    }else if (!preg_match('/^\S+$/',$nombre)) {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='No ingrese espacios';</script>"; 

    }else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i',$nombre)){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Solo se permiten letras!';</script>";

    }else if(strlen($nombre) < 3){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='El nombre debe contener al menos 3 caracteres.';</script>";
        
    }else  if ($usuario == "") {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='Por favor ingrese usuario.';</script>";

    }else if (!preg_match('/^\S+$/',$usuario)) {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='No ingrese espacios.';</script>"; 

    }else if ($resultadoUsu) {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='El usuario ya existe.';</script>";

    }else if(strlen($usuario) < 3){
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='El usuario debe contener al menos 3 caracteres.';</script>";
        
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='Email inválido.';</script>";

    }else  if ($resultadoMail) {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El mail ya se encuentra en uso.';</script>";

    }else  if (strlen($password) < 6) {
        $mensaje = "<script>document.getElementById('e_password').innerHTML='La contraseña debe contener por lo menos 6 caracteres.';</script>";

    }else if(!preg_match('/^\S+$/',$password)){
        $mensaje = "<script>document.getElementById('e_password').innerHTML='Dato incorrecto.';</script>"; 

    }else{
       
        $sentencia = $bd->prepare("INSERT INTO usuarios(usuario,email,password_us,nombre) VALUE (?,?,?,?)");
        $resultado = $sentencia->execute([$usuario,$email,$password,$nombre]);

        
        $mensaje = "<script>window.location='login.php';</script>";
        }

}
    
echo $mensaje;