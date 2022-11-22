
<?php

//print_r($_POST);
$mensajeE = null;

if (isset($_POST["ajaxE"]))
{

    include_once '../model/conexion.php';

    $id_link = $_POST['id_link'];
    $title = $_POST['title'];
    $url = $_POST['url'];
    $description = $_POST['description'];
    $created_at = $_POST['created_at'];

    if ($url == "") {
        $mensajeE = "<script>document.getElementById('e_urlE').innerHTML='Por favor ingrese URL.';</script>"; 

    }else{
    $sentencia = $bd->prepare("UPDATE links SET title = ?, url = ?, description = ?, created_at = ? WHERE id_link = ?");
    $resultado = $sentencia->execute([$title,$url,$description,$created_at,$id_link]);
    
      $mensajeE = "<script>window.location='index.php';</script>";
    
   

}


}

 echo $mensajeE;


?>