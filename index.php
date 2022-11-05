<?php

// NO ME DEJA VER EL ID DEL USUARIO SI NO TENGO TARJETAS CREADAS

session_start();

include 'Vista/header.php';

if (!isset($_SESSION['id'])) {//si NO existe una sesion llamada nombre que lo mande a login
    header('Location: login.php');
}elseif(isset($_SESSION['id'])){
    include 'model/conexion.php';//
    $id = $_SESSION['id'];   
    $sentencia = $bd->query("SELECT * FROM links WHERE usuario_id = '".$id."'");// estos tres los borro y lo cambio por el de la pagina
    $links = $sentencia->fetchAll(PDO::FETCH_OBJ);//

}else{
    echo "ERROR EN EL SISTEMA";
}

?>

<!doctype html>
<html lang="en">

<header>
    <!-- place navbar here -->
    <div class="container mt-5">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                                          
                
            ?>

            <?php
                foreach($links as $dato){                               

            ?>

            <div class="col mt-5">
                <div class="card h-100">

                    <div class="card-body">
                        <h5 class="card-title"><?php echo $dato -> title; ?></h5>
                        <p class="card-text"><?php echo $dato -> description; ?></p>
                        <a au class="card-text" href="<?php echo $dato -> url; ?>">URL</a>
                    </div>
                    <div class="row">
                        <i class="bi bi-pen-fill"></i>
                    </div>

                    <div class="card-footer">

                        <small class="text-muted">Última actualización <?php echo $dato -> created_at; ?></small>
                    </div>
                </div>
            </div>
            <?php
                                
                }
            ?>

        </div>
    </div>

    <!-- MODALS -->
    <div class="modal fade" id="crearTarjeta" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nueva Nota</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="Controller/crearProceso.php">
                        <input type="text" name="id" value="<?php echo $_SESSION['id']; ?> " style="visibility: hidden;"  >
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="card-title"> TÍtulo<input type="text" class="form-control" name="title"
                                        require value=""></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> URL <input type="text" class="form-control" name="url" require
                                        value=""></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> Descripcion <input type="text" class="form-control"
                                        name="description" require value=""></h6>
                            </div>
                            <div class="modal-footer mt-5">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-primary" value="Crear" class="btn btn-primary">
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</header>

<footer class="container-fluid bg-dark fixed-bottom">
    <div class="row ">
        <div class="col-md text-light text-center py-4">Desarrollado por Maximiliano</div>

    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
    </body>

</html>