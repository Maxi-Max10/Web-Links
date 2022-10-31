<?php include 'Vista/header.php'; ?>
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="card-header">
            Crear tarjeta
        </div>
        <div class="col">
            <div class="card h-100">
                
                <form method="POST" action="Controller/crearProceso.php">
                <div class="card-body">
                    <h6 class="card-title"> TÍtulo<input type="text" class="form-control" name="title" require
                    value=""></h6>
                    <h6 class="card-title"> URL <input type="text" class="form-control" name="url" require
                    value=""></h6>
                    <h6 class="card-title"> Descripcion <input type="text" class="form-control" name="description" require
                    value=""></h6>
                    <input type="submit" value="Crear" class="btn btn-primary">
                </div>
                </form>
            </div>
        </div>
    </div>
</div>