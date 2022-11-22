<?php
    include_once '../model/conexion.php';
    $mensaje = null;

    
    
 if (isset($_POST["ajaxR"]))
{
    
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    

    $buscoUsu = "SELECT * FROM admin WHERE usuario = ? ;";
    $sentenciaUsu = $bd->prepare($buscoUsu);
    $sentenciaUsu->execute(array($usuario));
    $resultadoUsu = $sentenciaUsu->fetch();

    $buscoMail = "SELECT * FROM admin WHERE email = ? ;";
    $sentenciaMail = $bd->prepare($buscoMail);
    $sentenciaMail->execute(array($email));
    $resultadoMail = $sentenciaMail->fetch();

    // var_dump($resultadoUsu); imprimo

    if ($usuario == "") {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='Por favor ingrese usuario.';</script>";

    }else if (!preg_match('/^\S+$/',$usuario)) {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='No ingrese solo espacios.';</script>"; 

    }else if ($resultadoUsu == FALSE) {
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='El usuario no existe!';</script>";

    }else if(strlen($usuario) < 3){
        $mensaje = "<script>document.getElementById('e_usuario').innerHTML='El usuario debe contener al menos 3 caracteres.';</script>";
        
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='Email inválido.';</script>";

    }else  if ($resultadoMail == FALSE) {
        $mensaje = "<script>document.getElementById('e_email').innerHTML='El mail no existe';</script>";

    }else{

        $consulta = $bd->query("SELECT password_ad FROM admin WHERE email = '".$email."'");
        $contrasenia = $consulta->fetchAll(PDO::FETCH_OBJ);
        //print $contasenia;

        foreach ($contrasenia as $dato){
            $contra = $dato->password_ad;
        }

        mail($email,"Recuperación de contraseña","Contraseña Adiministrador","USUARIO ".$usuario." SU CONTRASEÑA ES ".$contra);

        $mensaje = "<script>window.location='loginA.php';</script>";

        }

}
    
echo $mensaje;