<?php

session_start();
//SI YA EXISTE UNA SESION LE DIGO QUE NO SALGA DE LA PAGINA INDEX
if (isset($_SESSION['id_adm'])) { 
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="Includes/assets/Untitled.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Iniciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />

</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">
    <?php
               
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'no'){                                  
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Campos Inválidos
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>

        <div class="d-flex justify-content-center">
            <img src="Includes/assets/login-icon.svg" alt="login-icon" style="height: 7rem" />
        </div>
        <div class="text-center fs-1 fw-bold">Bienvenido Admin</div>
        <form action="Controller/loginAdmi.php" method="POST">
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" id="us" placeholder="Usuario" name="usuario"
                    autocomplete="none" />
            </div>
            <div class="input-group mt-3">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" placeholder="Password" name="password"
                    autocomplete="none" />
            </div>
            <div class="d-flex left-content-around mt-1">

                <div class="pt-1 ">
                    <a href="#" class="text-decoration-none text-info fw-semibold fst-italic text"
                        style="font-size: 0.8rem">¿Ovidaste tu contraseña?</a>
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-info mt-5 text-white" >Iniciar Sesión</button>
            </div>
        </form>
       

    </div>
</body>

</html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../Includes/js/alerts.js"></script>