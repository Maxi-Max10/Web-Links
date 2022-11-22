<?php
  session_start();

  include_once 'Vista/header.php';

  if (!isset($_SESSION['id_adm'])) {
    header('Location: loginA.php');
  }elseif(isset($_SESSION['id_adm'])){
      include 'model/conexion.php';  
      $id = $_GET['id'];
      $sentencia = $bd->query("SELECT * FROM usuarios WHERE id = '".$id."'");
      $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
      
      //$sentencia2 = $bd->query("SELECT usuarios.usuario, COUNT(links.usuario_id) FROM usuarios INNER JOIN links ON usuarios.id = links.usuario_id GROUP BY usuarios.id;");
      //$links2 = $sentencia2->fetchAll();
      
  }else{
      echo "ERROR EN EL SISTEMA";
  }

?>

<?php
        foreach($usuarios as $dato){                               
    ?>
    
    <div class="container mt-5 ">
    
    <div class="row justify-content-center">
        <h3 class="mb-3 text-center">Editar Usuario</h3>
        <div id="mensajeED"></div>

        <div class="modal-body">
            <form method="POST" action="" id="form_ajaxEditar">
                <input type="text" name="id" value="<?php echo $dato->id; ?> "
                    style="visibility: hidden;">
                <div class="card-body">
                    <div class="mb-3">
                        <h6 class="card-title"> ID<input type="text"  class="form-control" 
                                disabled value="<?php echo $dato->id; ?>"></h6>
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title"> Usuario<input type="text" id="usuario" class="form-control" name="usuario"
                        require value="<?php echo $dato->usuario; ?>"></h6>
                        <div id="e_usuario" class="text-danger" style="font-size: 12px;"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title"> Nombre<input type="text" id="nombre" class="form-control" name="nombre"
                                require value="<?php echo $dato->nombre; ?>"></h6>
                                <div style="font-size: 12px;" id="e_nombre" class="text-danger"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title"> Email <input type="text" id="email" class="form-control" name="email" require
                                value="<?php echo $dato->email; ?>"></h6>
                                <div id="e_email" class="text-danger" style="font-size: 12px;"></div>
                    </div>
                    <div class="mb-3">
                        <h6 class="card-title"> Contraseña <input id="password_us" type="text" class="form-control " rows="3"
                                name="password_us" require value="<?php echo $dato->password_us; ?>"></h6>
                                <div id="e_password" class="text-danger" style="font-size: 12px;"></div>
                    </div>
                    <div class="modal-footer mt-5">
                       
                        <input type="hidden" name="ajaxEd">
                         <input type="button" id="btn_ajaxE" class="btn btn-primary mt-3 btn-lg shadow" value="Guardar"></input>
                    </div>
                </div>
            </form>
        </div>
           
    <?php
      }                               
    ?>

<script>
            $(function()
            {
                $("#btn_ajaxE").click(function(){
                    var url = "Controller/editarUsuario.php";
                    $.ajax({
                        type:"POST",
                        url: url,
                        data: $("#form_ajaxEditar").serialize(),
                        success: function(data)
                        {
                            //para que se me borren los alertas cuando el campo cumplte las condiciones
                            $('#e_nombre').html('');
                            $('#e_usuario').html('');
                            $('#e_email').html('');
                            $('#e_password').html('');
                            
                            $("#mensajeED").html(data);
                        }

                    });
                });
            });
</script>

