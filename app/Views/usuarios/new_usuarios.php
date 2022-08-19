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
                            <!-- <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR EMPLEADOS</a> </div> -->
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
                                                <input type="text" name="user_dni" id="user_dni"
                                                    value="<?= old('user_dni')?>" required>
                                                <p class="text-danger"><?= session('errors.user_dni')?></p>
                                                <p class="d-none text-danger" id="validacion1">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="user_nombre" id="user_nombre"
                                                    value="<?= old('user_nombre')?>" maxlength="40">
                                                <p class="text-danger"><?= session('errors.user_nombre')?></p>
                                                <p class="d-none text-danger" id="validacion2">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_apellido" class="bmd-label-floating">Apellidos</label>
                                                <input type="text" name="user_apellido" id="user_apellido"
                                                    value="<?= old('user_apellido')?>" maxlength="40">
                                                <p class="text-danger"><?= session('errors.user_apellido')?></p>
                                                <p class="d-none text-danger" id="validacion3">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_telefono" class="bmd-label-floating">Teléfono</label>
                                                <input type="text" name="user_telefono" id="user_telefono"
                                                    value="<?= old('user_telefono')?>" maxlength="15">
                                                <p class="text-danger"><?= session('errors.user_telefono')?></p>
                                                <p class="d-none text-danger" id="validacion4">Complete este campo por
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
                                                <input type="text" name="user_usuario" id="user_usuario"
                                                    value="<?= old('user_usuario')?>" maxlength="35">
                                                <p class="text-danger"><?= session('errors.user_usuario')?></p>
                                                <p class="d-none text-danger" id="validacion5">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_email" class="bmd-label-floating">Email</label>
                                                <input type="email" name="user_email" id="user_email"
                                                    value="<?= old('user_email')?>" maxlength="70">
                                                <p class="text-danger"><?= session('errors.user_email')?></p>
                                                <p class="d-none text-danger" id="validacion6">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_1" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" name="user_clave_1" id="user_clave_1"
                                                    maxlength="100" required>
                                                <p class="text-danger"><?= session('errors.user_clave_1')?></p>
                                                <p class="d-none text-danger" id="validacion7">Complete este campo por
                                                    favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="user_clave_2" class="bmd-label-floating">Repetir
                                                    contraseña</label>
                                                <input type="password" name="user_clave_2" id="user_clave_2"
                                                    maxlength="100" required>
                                                <p class="d-none text-danger" id="validacion8">Complete este campo por
                                                    favor</p>
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
                                                <select name="user_privilegio" class="form-control" id="user_rol">
                                                    <option value="" selected="" disabled="">Seleccione una opción
                                                    </option>
                                                    <option value="1" <?php if(old('user_privilegio')=="1"):?> selected
                                                        <?php endif; ?>>Administrador</option>
                                                    <option value="2" <?php if(old('user_privilegio')=="2"):?> selected
                                                        <?php endif; ?>>Recepcionista</option>
                                                </select>
                                                <p class="text-danger"><?= session('errors.user_privilegio')?></p>
                                                <p class="d-none text-danger" id="validacion9">Seleccione una opción por
                                                    favor</p>
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

    <script>
    let boton_enviar = document.getElementById('new_usu');
    let val1 = document.getElementById('user_dni');
    let val2 = document.getElementById('user_nombre');
    let val3 = document.getElementById('user_apellido');
    let val4 = document.getElementById('user_telefono');

    let val5 = document.getElementById('user_usuario');
    let val6 = document.getElementById('user_email');
    let val7 = document.getElementById('user_clave_1');
    let val8 = document.getElementById('user_clave_2');
    let val9 = document.getElementById('user_rol');


    boton_enviar.addEventListener('click', e => {
        e.preventDefault();
        if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val3
            .value === '' ||
            val3.value === null || val4.value === '' || val4.value === null || val5.value === '' || val5
            .value === null ||
            val6.value === '' || val6.value === null || val7.value === '' || val7.value === null || val8
            .value === '' ||
            val8.value === null || val9.value === null) {
            let timerInterval
            Swal.fire({
                icon: 'warning',
                title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                timer: 1500,
            })

            // COMPLETAR CAMPOS UNO POR UNO
            if (val1.value === '' || val1.value === null) {
                let error = document.getElementById('validacion1');
                error.classList.remove('d-none');
            }

            if (val2.value === '' || val2.value === null) {
                let error = document.getElementById('validacion2');
                error.classList.remove('d-none');
            }

            if (val3.value === '' || val3.value === null) {
                let error = document.getElementById('validacion3');
                error.classList.remove('d-none');
            }

            if (val4.value === '' || val4.value === null) {
                let error = document.getElementById('validacion4');
                error.classList.remove('d-none');
            }

            if (val5.value === '' || val5.value === null) {
                let error = document.getElementById('validacion5');
                error.classList.remove('d-none');
            }

            if (val6.value === '' || val6.value === null) {
                let error = document.getElementById('validacion6');
                error.classList.remove('d-none');
            }

            if (val7.value === '' || val7.value === null) {
                let error = document.getElementById('validacion7');
                error.classList.remove('d-none');
            }

            if (val8.value === '' || val8.value === null) {
                let error = document.getElementById('validacion8');
                error.classList.remove('d-none');
            }

            if (val9.value === '' || val9.value === null) {
                let error = document.getElementById('validacion9');
                error.classList.remove('d-none');
            }

            // COMPLETAR CAMPOS UNO POR UNO FIIIN

        } else {
            Swal.fire({
                title: 'ESTÁ SEGURO DE REGISTRAR ESTE NUEVO USUARIO',
                text: "Está a punto de registrar un NUEVO usuario",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    let form_upd = document.getElementById('form_hab');
                    let data = new FormData(form_usu);

                    fetch('<?= base_url('guardar_usuario') ?>', {

                        method: 'POST',
                        mode: 'no-cors',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: data

                    }).then(res => res.json()).then(res => {
                        if (res['respuesta']) {
                            Swal.fire(
                                'USUARIO REGISTRADO EXITOSAMENTE',
                                '',
                                'success'
                            ).then((value) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Revisa que los campos sean correctos!',
                            })
                        }
                    })
                }
            })
        }
    })
    </script>
</body>

</html>