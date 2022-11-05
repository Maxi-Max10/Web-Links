<?php   
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/x-icon" href="Includes/assets/logo-vt.svg" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </symbol>
        <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
            <path
                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
        </symbol>
    </svg>
    <div class="bg-white p-5 rounded-5 text-secondary shadow" style="width: 25rem">

        <div class="d-flex justify-content-center">
            <img src="Includes/assets/login-icon.svg" alt="login-icon" style="height: 7rem" />
        </div>
        <!-- INICIO ALERTA -->
        <?php
                //si existe = isset
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'vacio'){
                                   
            ?>
        <div class="alert alert-danger d-flex align-items-center width-10" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="10" height="10" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                Existen campos vacios!
            </div>
        </div>
        <?php
              }
            ?>

        <?php
                //si existe = isset
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'password'){
                                   
            ?>
        <div class="alert alert-danger d-flex align-items-center width-10" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="10" height="10" role="img" aria-label="Danger:">
                <use xlink:href="#exclamation-triangle-fill" />
            </svg>
            <div>
                Las contraseñas no coinciden!
            </div>
        </div>
        <?php
              }
            ?>
        <!-- INICIO ALERTA -->
        <div class="text-center fs-1 fw-bold">

        </div>
        <form action="Controller/registrarProceso.php" method="POST">
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" placeholder="Nombre" name="nombre" />
            </div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/username-icon.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" placeholder="Nombre de Usuario" name="usuario" />
            </div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/envelope-fill.svg" alt="username-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="text" placeholder="Email" name="email" />
            </div>
            <div class="input-group mt-4">
                <div class="input-group-text bg-info">
                    <img src="Includes/assets/password-icon.svg" alt="password-icon" style="height: 1rem" />
                </div>
                <input class="form-control bg-light" type="password" placeholder="Password" name="password_us" />
            </div>
            



            
            <div class="d-grid gap-2">
                <input type="submit" class="btn btn-info mt-5 text-white" ></input>
            </div>
        </form>

    </div>
</body>





</html>