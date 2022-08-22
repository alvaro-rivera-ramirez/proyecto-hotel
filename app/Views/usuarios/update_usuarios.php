<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>

</head>

<body>
    <div class="d-flex">
        <?php include "include/navLateral.php"?>

        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-2 pt-3 content-body">
                <div class="content p-5" style="background: white;">
                    <!-- Contenido -->
                    <div class="full-box page-header">
                        <h3 class="text-start">
                            <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR USUARIO
                        </h3>
                    </div>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i></i>
                                    EDITAR USUARIO</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista_usuarios')?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE USUARIO</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid p-3">
                        <form id="upd_form" action="<?= base_url('actualizar_usuario')?>" class="row g-3"
                            autocomplete="off" method="POST">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> Información Personal</legend>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="hidden" name="user_id" value="<?= $usuario['id']?>">
                                            <div class="form-group">
                                                <label for="user_dni" class="bmd-label-floating">DNI</label>
                                                <input type="text" name="user_dni" id="user_dni" class="validar" value="<?= $usuario['dni']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="user_nombre" id="user_nombre" class="validar" value="<?= $usuario['nombre']?>">
                                                <p class="d-none text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_apellido" class="bmd-label-floating">Apellidos</label>
                                                <input type="text" name="user_apellido" id="user_apellido" class="validar" value="<?= $usuario['apellidoPaterno']." ".$usuario['apellidoMaterno']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_telefono" class="bmd-label-floating">Teléfono</label>
                                                <input type="text" name="user_telefono" id="user_telefono" class="validar" value="<?= $usuario['telefono']?>">
                                                <p class="d-none text-danger validacion"></p>
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
                                                <label for="user_usuario" class="bmd-label-floating">Nombre de
                                                    usuario</label>
                                                <input type="text" name="user_usuario" id="user_usuario" class="validar" value="<?= $usuario['username']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_email" class="bmd-label-floating">Email</label>
                                                <input type="email" name="user_email" id="user_email" class="validar" value="<?= $usuario['email']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p>Estado de la cuenta <span class="badge bg-info">Activa</span></p>
                                            <div class="form-group">
                                                <select class="form-control validar" name="user_activo" id="user_estado">
                                                    <option value="" disabled="">Seleccione una opción
                                                    </option>
                                                    <option value="1" <?php if($usuario['activo']=="1"):?> selected
                                                        <?php endif; ?>>Activo</option>
                                                    <option value="0" <?php if($usuario['activo']=="0"):?> selected
                                                        <?php endif; ?>>Inactivo</option>
                                                </select>
                                                <p class="d-none text-danger validacion"></p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <legend><i class="fas fa-lock"></i> Nueva contraseña</legend>
                                <p style="margin-bottom:10px">En caso no desee cambiar la contraseña debe dejar estos
                                    espacios en blanco.</p>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_1" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" name="user_clave_1" id="user_clave_1">
                                                <p class="d-none text-danger validacion"></p>
                                                
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_2" class="bmd-label-floating">Repetir
                                                    contraseña</label>
                                                <input type="password" name="user_clave_2" id="user_clave_2">
                                                <p class="d-none text-danger validacion"></p>
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
                                            <p><span class="badge bg-primary"
                                                    style="background-color:#0d6efd !important">Administrador</span>
                                                Permisos para registrar, actualizar y eliminar</p>
                                            <p><span class="badge bg-secondary">Recepcionista</span> Permisos para
                                                registrar y actualizar</p>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <select name="user_privilegio" class="form-control validar" id="user_privilegio">
                                                    <option disabled="">Seleccione una opción
                                                    </option>
                                                    <option value="1" <?php if($usuario['idRol']=="1"):?>
                                                        selected <?php endif; ?>>Administrador</option>
                                                    <option value="2" <?php if($usuario['idRol']=="2"):?>
                                                        selected <?php endif; ?>>Recepcionista</option>
                                                </select>
                                                <p class="d-none text-danger validacion"></p>                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset>
                                <p style="margin:10px 0px" class="text-center">Para poder guardar los cambios en esta
                                    cuenta debe de ingresar su nombre de usuario y contraseña</p>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_usuario" class="bmd-label-floating">Nombre de
                                                    usuario</label>
                                                <input type="text" name="admin_usuario" id="admin_usuario" class="validar">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" name="admin_clave" id="admin_clave" class="validar">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-none alert alert-danger validacion" id="datosAdmin"role="alert">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn-guardar" id="act_usuario">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include "include/script.php"?>
    <script src="<?= base_url('js/usuarios/editarUsuario.js') ?>"></script>
</body>

</html>