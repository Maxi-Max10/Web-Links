<?php

// NO ME DEJA VER EL ID DEL USUARIO SI NO TENGO TARJETAS CREADAS

if (!isset($_SESSION['id'])) {//si NO existe una sesion llamada nombre que lo mande a login
    header('Location: login.php');
}elseif(isset($_SESSION['id'])){
    include 'model/conexion.php';//
    $id = $_SESSION['id'];   
    $sentencia = $bd->query("SELECT * FROM usuarios WHERE id = '".$id."'");// estos tres los borro y lo cambio por el de la pagina
    $links = $sentencia->fetchAll(PDO::FETCH_OBJ);//

}else{
    echo "ERROR EN EL SISTEMA";
}

?>

<head>
    <title>Bienvenido a WEB LINK</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="./Includes/assets/Untitled.svg" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

        <!-- iconos cdn -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="./Includes/css/style.css">
    
</head>

<body>
<div class="container-fluid" style="background: #e4fbfb";>
    <nav class="navbar navbar-expand-lg " style="background: #e4fbfb;">
        
            <a class="navbar-brand" href="#">WEBLINK</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mt-2 mb-2 me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a style="cursor: pointer;" class="nav-link active bi bi-file-earmark-plus-fill" aria-current="page"  data-bs-target="#crearTarjeta" data-bs-toggle="modal">Crear Tarjeta</a> 
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link active" aria-current="page" href="cerrar.php">Cerrar Sesion</a>
                    </li> 
                </ul>
                
                <?php
                        foreach($links as $dato){
                    ?>
                        
                        <a class="nav-link active bi bi-person-fill" aria-current="page"><?php echo" ".$dato->usuario; ?></a>
                          
                    <?php
                        }
                    ?>
                    
            </div>
       
    </nav>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    </body>