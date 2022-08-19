<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <style>
    .container-fluid {
        padding-right: 25px;
        padding-left: 25px;
    }

    label {
        margin: 0 !important;
    }
    </style>
</head>

<body>
    <div class="d-flex">

        <?php include "include/navLateral.php"?>

        <div class="w-100" style="background-color: #F1F3F5">

            <?php include "include/navBar.php"?>

            <!--------------CONTENIDO-------------->

            <div class="ps-2 pt-3 content-body">
                <div class="content p-5" style="background: white;">
                    <h3 class="cli-title pb-2">
                        <i class="icon-user-add me-1"></i>Registrar Cliente
                    </h3>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR
                                    CLIENTE</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista-clientes') ?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE CLIENTE</a> </div>
                        </div>
                    </div>

                    <section class=" row cli-content">
                        <form id="reg_clie" class="row g-3" autocomplete="off" method="post">
                            <legend><i class="far fa-address-card"></i> Información Personal</legend>

                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_dni_reg" class="bmd-label-floating">DNI</label>
                                            <input type="text" pattern="[0-9-]{1,27}" name="cli_dni_reg"
                                                id="cli_dni_reg" maxlength="27">
                                            <p class="d-none text-danger" id="validacion1">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_nombre_reg" class="bmd-label-floating">Nombre</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}"
                                                name="cli_nombre_reg" id="cli_nombre_reg" maxlength="40">
                                            <p><?= session('errors.cli_nombre_reg')?></p>
                                            <p class="d-none text-danger" id="validacion2">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_apellidop_reg" class="bmd-label-floating">Apellido
                                                Paterno</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}"
                                                name="cli_apellidop_reg" id="cli_apellidop_reg" maxlength="40">
                                            <p><?= session('errors.cli_apellidop_reg')?></p>
                                            <p class="d-none text-danger" id="validacion3">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_apellidom_reg" class="bmd-label-floating">Apellido
                                                Materno</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}"
                                                name="cli_apellidom_reg" id="cli_apellidom_reg" maxlength="40">
                                            <p><?= session('errors.cli_apellidom_reg')?></p>
                                            <p class="d-none text-danger" id="validacion4">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_telefono_reg" class="bmd-label-floating">Teléfono</label>
                                            <input type="text" name="cli_telefono_reg" id="cli_telefono_reg"
                                                maxlength="15">
                                            <p><?= session('errors.cli_telefono_reg')?></p>
                                            <p class="d-none text-danger" id="validacion5">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cli_email_reg" class="form-label">Email</label>
                                            <input type="email" name="cli_email_reg" id="cli_email_reg">
                                            <p><?= session('errors.cli_email_reg')?></p>
                                            <p class="d-none text-danger" id="validacion6">Complete este campo por favor
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 pt-4">
                                <div class="d-flex">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button type="button" class="btn-guardar" id="guardar">
                                            Guardar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <?php include "include/script.php"?>
    <script>
    let boton_enviar = document.getElementById('guardar');
    let val1 = document.getElementById('cli_dni_reg');
    let val2 = document.getElementById('cli_nombre_reg');
    let val3 = document.getElementById('cli_apellidop_reg');
    let val4 = document.getElementById('cli_apellidom_reg');
    let val5 = document.getElementById('cli_telefono_reg');
    let val6 = document.getElementById('cli_email_reg');


    boton_enviar.addEventListener('click', e => {
        e.preventDefault();
        if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val3
            .value === '' ||
            val3.value === null || val4.value === '' || val4.value === null || val5.value === '' || val5
            .value === null ||
            val6.value === '' || val6.value === null) {
            let timerInterval
            Swal.fire({
                icon: 'warning',
                title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                timer: 1500,
            })
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

        } else {
            Swal.fire({
                title: 'ESTÁ SEGURO DE REGISTRAR ESTE NUEVO CLIENTE?',
                text: "Está a punto de registrar un NUEVO cliente",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    let form_upd = document.getElementById('reg_clie');
                    let data = new FormData(form_upd);

                    fetch('<?= base_url('registrar_cliente') ?>', {
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
                                'CLIENTE REGISTRADO EXITOSAMENTE',
                                res['mensaje'],
                                'success'
                            ).then((value) => {
                                location.reload();
                            });
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Revisa que los campos sean correctos!',
                            })
                            mensajesError(res.errors);
                        }
                    })
                }
            })
        }
    })

    function mensajesError(mensajes){
        console.log(mensajes);
    }
    </script>
</body>

</html>