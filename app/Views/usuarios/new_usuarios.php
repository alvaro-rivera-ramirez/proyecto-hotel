<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
</head>
<body>
   <div class="d-flex">
        <?php include "include/navLateral.php"?>     
       
        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <!-- Contenido -->
            <div class="ps-2 pt-3 content-body">
                <div class="content p-5" style="background: white;">
                       <!---->
                       <div class="full-box page-header">
                            <h3 class="text-start">
                                <i class="fas fa-plus fa-fw"></i> AGREGAR USUARIO
                            </h3>
                        </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR USUARIO</a></div>
                        <div class="box-nav"> <a href="<?= base_url('lista_usuarios') ?>"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE USUARIOS</a> </div>
                        <!-- <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR EMPLEADOS</a> </div> -->
                    </div>
                                
                </div>
                
                     <div class="container-fluid">
                          <form action="<?= base_url('guardar_usuario') ?>" class="row g-3" autocomplete="off" method="post">
                        <fieldset>
                            <legend><i class="far fa-address-card"></i> Información Personal</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_dni" class="bmd-label-floating">DNI</label>
                                            <input type="text" name="user_dni" id="user_dni" value="<?= old('user_dni')?>" required>
                                            <p><?= session('errors.user_dni')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_nombre" class="bmd-label-floating">Nombre</label>
                                            <input type="text" name="user_nombre" id="user_nombre" value="<?= old('user_nombre')?>" maxlength="40">
                                            <p><?= session('errors.user_nombre')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_apellido" class="bmd-label-floating">Apellidos</label>
                                            <input type="text" name="user_apellido" id="user_apellido" value="<?= old('user_apellido')?>" maxlength="40">
                                            <p><?= session('errors.user_apellido')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_telefono" class="bmd-label-floating">Teléfono</label>
                                            <input type="text" name="user_telefono" id="user_telefono" value="<?= old('user_telefono')?>" maxlength="15">
                                            <p><?= session('errors.user_telefono')?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><i class="fas fa-user-lock"></i> Información de la cuenta</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_usuario" class="bmd-label-floating">Nombre de usuario</label>
                                            <input type="text" name="user_usuario" id="user_usuario" value="<?= old('user_usuario')?>" maxlength="35">
                                            <p><?= session('errors.user_usuario')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_email" class="bmd-label-floating">Email</label>
                                            <input type="email" name="user_email" id="user_email" value="<?= old('user_email')?>" maxlength="70">
                                            <p><?= session('errors.user_email')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_clave_1" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" name="user_clave_1" id="user_clave_1" maxlength="100" required>
                                            <p><?= session('errors.user_clave_1')?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="user_clave_2" class="bmd-label-floating">Repetir contraseña</label>
                                            <input type="password" name="user_clave_2" id="user_clave_2" maxlength="100" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                        <fieldset>
                            <legend><i class="fas fa-medal"></i> Nivel de privilegio</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <p><span class="badge bg-primary" style="background-color:#0d6efd !important">Administrador</span> Permisos para registrar, actualizar y eliminar</p>
                                        <p><span class="badge bg-secondary">Recepcionista</span> Permisos para registrar y actualizar</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <select name="user_privilegio">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <option value="1" <?php if(old('user_privilegio')=="1"):?> selected <?php endif; ?>>Administrador</option>
                                                <option value="2" <?php if(old('user_privilegio')=="2"):?> selected <?php endif; ?>>Recepcionista</option>
                                            </select>
                                            <p><?= session('errors.user_privilegio')?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn-limpiar me-2"><i class="fa-solid fa-brush me-1"></i> Limpiar</button>
                            
                                <button type="submit" class="btn-guardar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>
                            
                            <!---- confirmación--------->
                            <!--- modal de confirmación----->
                                    <div class="m-confirmacion modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                           <h5 class="modal-title mb-2" >Confirmación</h5>
                                           <p class="mb-3"> ¿Estas seguro de guardar?</p>
                                             <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-guardar me-1">Guardar</button>
                                                <button type="button" class="btn-cancelar" data-bs-dismiss="modal">Cerrar</button>
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <!--- modal ----->
                            
                        
                        
                    </form>
                     </div>
                      <!----->
                  </div>
            
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>