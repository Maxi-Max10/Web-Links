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
                foreach($links as $dato){                               
            ?>
            <div class="col mt-5">
                <div class="card h-100">

                    <div class="card-body mb-3">
                        <h5 class="card-title"><?php echo $dato -> title; ?></h5>
                        <p class="card-text"><?php echo $dato -> description; ?></p>
                        <a au class="card-text" href="<?php echo $dato -> url; ?>">URL</a>
                        <div class="row justify-content-around mt-3">
                            <div class="col-2">
                                <a class="text-success" data-bs-target="#editarTarjeta<?php echo $dato -> id_link; ?>"
                                    data-bs-toggle="modal">
                                    <i class="bi bi-pencil-square"></i></a>
                            </div>
                            <div class="col-2">
                                <a class="text-danger" data-bs-target="#eliminarTarjeta<?php echo $dato -> id_link; ?>"
                                    data-bs-toggle="modal">
                                    <i class="bi bi-trash-fill"></i></a>
                            </div>
                        </div>
                    </div>


                    <div class="card-footer">
                        <small class="text-muted">Fecha de creación <?php echo $dato -> created_at; ?></small>
                    </div>
                </div>
            </div>
            <?php
                                
                }
            ?>

        </div>
    </div>

    <!-- MODALS CREAR -->

    <div class="modal fade" id="crearTarjeta" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nueva Nota</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="Controller/crearProceso.php">
                        <input type="text" name="id" value="<?php echo $_SESSION['id']; ?> "
                            style="visibility: hidden;">
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
                                <input type="submit" class="btn btn-primary" value="Crear" >
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- MODALS EDITAR -->
    <?php
        foreach($links as $dato){                               
    ?>

    <div class="modal fade" id="editarTarjeta<?php echo $dato -> id_link; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Editar Nota</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body">
                    <form method="POST" action="Controller/editarProceso.php">
                        <input type="text" name="id_link" value="<?php echo $dato->id_link; ?> "
                            style="visibility: hidden;">

                        <input type="text" name="created_at" value="<?php echo $dato->created_at; ?> "
                            style="visibility: hidden;">
                        <div class="card-body">
                            <div class="mb-3">
                                <h6 class="card-title"> TÍtulo<input type="text" class="form-control" name="title"
                                        require value="<?php echo $dato->title; ?>"></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> URL <input type="text" class="form-control" name="url" require
                                        value="<?php echo $dato->url; ?>"></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> Descripcion <input type="text" class="form-control"
                                        name="description" require value="<?php echo $dato->description; ?>"></h6>
                            </div>
                            <div class="modal-footer mt-5">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-primary" value="Crear" >
                            </div>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
    <?php
      }                               
    ?>

    <!-- MODALS ELIMINAR -->

    <?php
        foreach($links as $dato){                               
    ?>
    <div class="modal fade" id="eliminarTarjeta<?php echo $dato -> id_link; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">¿Esta seguro que desea eliminar tarjeta?</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Controller/eliminarProceso.php">
                        <input type="text" name="id_link" value="<?php echo $dato->id_link; ?> "
                            style="visibility: hidden;">
                        <div class="mb-3">
                            <h2> <?php echo $dato->title; ?> </h2>
                        </div>
                        <div class="modal-footer mt-5">
                            <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Cancelar">
                            <input type="submit" class="btn btn-danger btn-lg" value="Eliminar">
                        </div>           
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
      }                               
    ?>

</header>


    

</html>