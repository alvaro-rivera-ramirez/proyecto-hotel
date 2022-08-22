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
                            <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR
                                    USUARIO</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista_usuarios') ?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE USUARIOS</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid">
                        <form id="form_usu" action="" class="row g-3" autocomplete="off" method="post">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> Información Personal</legend>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_dni" class="bmd-label-floating">DNI</label>
                                                <input type="text" name="user_dni" id="user_dni" class="validar"
                                                required>
                                                <p class="d-none text-danger validacion" id="validacion1">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="user_nombre" id="user_nombre" class="validar" maxlength="40">
                                                <p class="d-none text-danger validacion" id="validacion2">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_apellido" class="bmd-label-floating">Apellidos</label>
                                                <input type="text" name="user_apellido" id="user_apellido" class="validar">
                                                <p class="d-none text-danger validacion" id="validacion3">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_telefono" class="bmd-label-floating">Teléfono</label>
                                                <input type="text" name="user_telefono" id="user_telefono" class="validar">
                                                <p class="d-none text-danger validacion" id="validacion4">Complete este campo por
                                                    favor</p>
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
                                                <input type="text" name="user_usuario" id="user_usuario" class="validar" maxlength="35">
                                                <p class="d-none text-danger validacion" id="validacion5">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_email" class="bmd-label-floating">Email</label>
                                                <input type="email" name="user_email" id="user_email" class="validar">
                                                <p class="d-none text-danger validacion" id="validacion6">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_1" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" name="user_clave_1" id="user_clave_1" class="validar" required>
                                                <p class="d-none text-danger validacion" id="validacion7">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_2" class="bmd-label-floating">Repetir
                                                    contraseña</label>
                                                <input type="password" name="user_clave_2" id="user_clave_2" class="validar" required>
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
                                                <select name="user_privilegio" class="form-control validar" id="user_rol">
                                                    <option value="" selected="" disabled="">Seleccione una opción
                                                    </option>
                                                    <option value="1">Administrador</option>
                                                    <option value="2">Recepcionista</option>
                                                </select>
                                                <p class="d-none text-danger validacion" id="validacion9"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn-limpiar me-2"><i class="fa-solid fa-brush me-1"></i>
                                    Limpiar</button>

                                <button type="submit" class="btn-guardar" id="new_usu">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!----->
                </div>

            </div>

        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="js/usuarios/nuevoUsuario.js"></script>
</body>

</html>