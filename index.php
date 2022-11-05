<?php
// con esto protejo todas la paginas
session_start();

include 'Vista/header.php';

if (!isset($_SESSION['nombre'])) {//si NO existe una sesion llamada nombre que lo mande a login
    header('Location: login.php');
}elseif(isset($_SESSION['nombre'])){
    include 'model/conexion.php';//
    $usuario = $_SESSION['nombre'];   
    $sentencia = $bd->query("SELECT * FROM links INNER JOIN usuarios ON
                            usuarios.id = links.usuario_id
                            where usuarios.usuario = '".$usuario."'");// estos tres los borro y lo cambio por el de la pagina
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