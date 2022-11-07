<?php

 $mensaje = null;
    
 if (isset($_POST["ajax"]))
{
    $nombre = $_POST['nombre'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password_us'];
    
    if ($nombre == "") {
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Campo requerido';</script>";
    }else if(!preg_match('/^[a-záéóóúàèìòùäëïöüñ\s]+$/i',$nombre)){
        $mensaje = "<script>document.getElementById('e_nombre').innerHTML='Solo se perimiten letras!';</script>";
    }else{
       
    session_start();
    
    include_once '../model/conexion.php';

    $sentencia = $bd->prepare("INSERT INTO usuarios(usuario,email,password_us,nombre) VALUE (?,?,?,?)");
    $resultado = $sentencia->execute([$usuario,$email,$password,$nombre]);

    $mensaje = "<script>window.location='login.php';</script>";
    }

}
    
echo $mensaje;
   
  
 //        echo 'ERROR';
 //    }

?>