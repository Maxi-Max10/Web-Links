<?php
  session_start();

  include_once 'Vista/header.php';

  if (!isset($_SESSION['id_adm'])) {
    header('Location: loginA.php');
  }elseif(isset($_SESSION['id_adm'])){
      include 'model/conexion.php';  
      $sentencia = $bd->query("SELECT * FROM usuarios");
      $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
      
      //$sentencia2 = $bd->query("SELECT usuarios.usuario, COUNT(links.usuario_id) FROM usuarios INNER JOIN links ON usuarios.id = links.usuario_id GROUP BY usuarios.id;");
      //$links2 = $sentencia2->fetchAll();
      
  }else{
      echo "ERROR EN EL SISTEMA";
  }

?>
<script>
           
        </script>
<div class="container mt-5 mb-5">
      
        <div class="row justify-content-center">
        <div class="card text-white bg-dark mb-5" style="width: 50rem;">
        <div class="card-body text-center text-blue">
          <h5 class="card-title">Total de usuarios registrados</h5>
          <h6 class="card-subtitle mb-2 text-muted">
            <script type="text/javascript">
              var d = new Date();
              document.write(d.getDate()+'/'+(d.getMonth()+1)+'/'+d.getFullYear());
            </script>
          </h6>
          <h1 class="card-text"><?php echo count($usuarios) ?></h1>
         
        </div>
      </div>
            <div class="col-md-9">

            <div class="card mt-3">
                    <div class="card-header text-center mb-5">
                    <h2>Lista de Usuarios</h2>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <!-- ACA VA BARRA BUSQUEDA -->                              
                    </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead >
                                <tr class="bg-info">
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuario</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Fecha de registro</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <?php
                                    foreach($usuarios as $dato){                               
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $dato -> id; ?></td>
                                    <td><?php echo $dato -> usuario; ?></td>
                                    <td><?php echo $dato -> nombre; ?></td>
                                    <td><?php echo $dato -> email; ?></td>
                                    <td><?php echo $dato -> password_us; ?></td>
                                    <td><?php echo $dato -> fecha_registro; ?></td>
                                    
                                    <td><a class="text-success" href="editarUsu.php?id=<?php echo $dato -> id; ?>">
                                        <i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="text-danger" data-bs-target="#eliminarUsuario<?php echo $dato -> id; ?>"
                                    data-bs-toggle="modal">
                                        <i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php                               
                                  }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            </div>
    </div>
</div>

    <!-- MODALS CREAR -->

    <div class="modal fade" id="crearUsuario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div id="mensaje"></div>
                <div class="modal-header">
                    <h3 class="modal-title">Crear Usuario</h3>
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                
                <p class=""></p>
                    <form method="POST" action="" id="form_ajax">
                        <div class="card-body">
                       
                            <div class="mb-3">
                                <h6 class="card-title"> Usuario<input type="text" id="usuario" class="form-control" name="usuario"
                                require ></h6>
                            </div>
                            <div id="e_usuarioU" class="text-danger" style="font-size: 12px;"></div>

                            <div class="mb-3">
                                <h6 class="card-title"> Nombre<input type="text" id="nombre" class="form-control" name="nombre"
                                require></h6>
                            </div>
                            <div style="font-size: 12px;" id="e_nombreU" class="text-danger"></div>

                            <div class="mb-3">
                                <h6 class="card-title"> Email <input type="text" id="email" class="form-control" name="email" 
                                require></h6>
                            </div>
                            <div id="e_emailU" class="text-danger" style="font-size: 12px;"></div>

                            <div class="mb-3">
                                <h6 class="card-title"> Contraseña <input type="text" id="password_us" class="form-control " rows="3"
                                        name="password_us" require ></h6>
                            </div>
                            <div id="e_passwordU" class="text-danger" style="font-size: 12px;"></div> 

                            <div class="modal-footer mt-5">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                               
                                <button type="button"  class="btn btn-primary submitBtn" onclick="submitForm()">Crear</button>
                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

 <!-- MODALS EDITAR 
 <?php
      /*  foreach($usuarios as $dato){                               
    ?>

    <div class="modal fade" id="editarUsuario<?php echo $dato -> id; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
            <div id="mensaje"></div>
                <div class="modal-header">
                    <h3 class="modal-title">Editar Usuario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>



                <div class="modal-body">
                    <form method="POST" action="Controller/editarUsuario.php">
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
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> Nombre<input type="text" id="nombre" class="form-control" name="nombre"
                                        require value="<?php echo $dato->nombre; ?>"></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> Email <input type="text" id="email" class="form-control" name="email" require
                                        value="<?php echo $dato->email; ?>"></h6>
                            </div>
                            <div class="mb-3">
                                <h6 class="card-title"> Contraseña <input id="password_us" type="text" class="form-control " rows="3"
                                        name="password_us" require value="<?php echo $dato->password_us; ?>"></h6>
                            </div>
                            <div class="modal-footer mt-5">
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Cancelar">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <?php
      }  */                             
    ?>
-->

<!-- MODALS ELIMINAR -->

<?php
        foreach($usuarios as $dato){                               
    ?>
    <div class="modal fade" id="eliminarUsuario<?php echo $dato -> id; ?>" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">¿Está seguro que desea eliminar a <?php echo $dato -> nombre; ?> ?</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Controller/eliminarUsuario.php">
                        <input type="text" name="id" value="<?php echo $dato->id; ?> "
                            style="visibility: hidden;">
                        <div class="mb-3">
                           <p class="text-danger bi bi-exclamation-triangle-fill"> Este usuario puede contener tarjetas vinculadas</p>
                            
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



  

<!-- <script src="Includes/js/validarForm.js"></script> 
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>-->







