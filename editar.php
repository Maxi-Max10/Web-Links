<?php
session_start();

include 'Vista/header.php';

if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}elseif(isset($_SESSION['id']) && isset($_GET['id_link'])){
    include 'model/conexion.php';//
    $id = $_SESSION['id']; 
    $idLink = $_GET['id_link'];  
    $sentencia = $bd->query("SELECT * FROM links WHERE id_link = '".$idLink."'");
    $links = $sentencia->fetchAll(PDO::FETCH_OBJ);//

}else{
    echo "ERROR EN EL SISTEMA";
}

?>
<?php
        foreach($links as $dato){                               
    ?>
<div class="container mt-5 ">
    <div class="row justify-content-center">
        <h3 class="mb-3 text-center">Editar Tarjeta</h3>
<div id="mensajeED"></div>
            <div class="modal-body">
                <form method="POST" action="" id="form_ajaxE">
                    <input type="text" id="id_linkE" name="id_link" value="<?php echo $dato->id_link; ?> "
                        style="visibility: hidden;">

                    <input type="text" name="created_at" value="<?php echo $dato->created_at; ?> "
                        style="visibility: hidden;">
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="card-title"> TÍtulo<input type="text" id="titleE" class="form-control" name="title" require
                                    value="<?php echo $dato->title; ?>"></h6>
                        </div>
                        <div class="mb-3">
                            <h6 class="card-title"> URL <input type="text" class="form-control" id="urlE" name="url" require
                                    value="<?php echo $dato->url; ?>"></h6>
                                    <div id="e_urlE" class="text-danger" style="font-size: 12px;"></div>
                        </div>
                        <div class="mb-3">
                            <h6 class="card-title"> Descripción <input type="text" class="form-control " rows="3" id="descriptionE"
                                    name="description" require value="<?php echo $dato->description; ?>"></h6>
                        </div>
                        <div class="modal-footer mt-5">
                        <input type="hidden" name="ajaxE">
                         <input type="button" id="btn_ajaxE" class="btn btn-primary mt-3 btn-lg shadow" value="Guardar"></input>
                        </div>
                    </div>
                </form>
            </div>
            </div>
            </div>
            <?php
      }                               
    ?>

    

<script>
            $(function()
            {
                $("#btn_ajaxE").click(function(){
                    var url = "Controller/editarProceso.php";
                    $.ajax({
                        type:"POST",
                        url: url,
                        data: $("#form_ajaxE").serialize(),
                        success: function(data)
                        {
                            //para que se me borren los alertas cuando el campo cumplte las condiciones
                            $('#e_urlE').html('');
                            

                            $("#mensajeED").html(data);
                        }

                    });
                });
            });
</script>