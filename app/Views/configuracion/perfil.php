<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <style>
    .detail {
        padding: 8px 0px;
        margin: 0;
        justify-content:space-around;
    }

    .detail div {
        padding: 10px 20px;
    }

    .nh input:focus {
        box-shadow: none;
    }

    .input-costo input {
        padding: 4px 12px !important;
    }

    label {
        margin-top: 7px;
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
                    <h3 class="pb-2">Actualizar perfil</h3>
                    <section>
                    <form id="upd_form" action="<?= base_url('ed_perfil')?>" class="row g-3"
                            autocomplete="off" method="POST">
                            <input type="hidden" name="user_id" value="<?= $usuario['id']?>">
                            <div class="row g-3 mt-2">
                                <div class="col-lg-8 row pt-3"> 
                                <div class="col-md-6">
                                        <label for="per_nombre" class="bmd-label-floating">Nombres</label>
                                        <input type="text" name="per_nombre" id="per_nombre"
                                                value="<?= old('per_nombre',$usuario['nombre'])?>">
                                            <p class="text-danger"><?= session('errors.per_nombre')?></p>
                                            <p class="d-none text-danger" id="validacion1" >Complete este campo por favor</p>
                                    
                                </div>

                                <div class="col-md-6">
                                    <label for="per_apellidop" class="bmd-label-floating">Apellidos</label>
                                    <input type="text" name="per_apellido" id="per_apellido"
                                                    value="<?= old('per_apellido',$usuario['apellidoPaterno']." ".$usuario['apellidoMaterno'])?>">
                                                <p class="text-danger"><?= session('errors.per_apellido')?></p>
                                                <p class="d-none text-danger" id="validacion2" >Complete este campo por favor</p>
                                </div>
                                
                                <div class="col-md-12">
                                    <label for="per_email" class="bmd-label-floating">Email</label>
                                    <input type="email" name="per_email" id="per_email"
                                                    value="<?= old('per_email',$usuario['email'])?>" maxlength="70">
                                                <p class="text-danger"><?= session('errors.per_email')?></p>
                                                <p class="d-none text-danger" id="validacion3" >Complete este campo por favor</p>
                                            
                                </div>

                                <div class="col-md-6">
                                    <label for="per_telefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" name="per_telefono" id="per_telefono"
                                                    value="<?= old('per_telefono',$usuario['telefono'])?>">
                                                <p class="text-danger"><?= session('errors.per_telefono')?></p>
                                                <p class="d-none text-danger" id="validacion4" >Complete este campo por favor</p>
                                           
                                </div>

                                <div class="col-md-6">
                                    <label for="per_username" class="bmd-label-floating">Username</label>
                                    <input type="text" name="per_username" id="per_username"
                                                    value="<?= old('per_username',$usuario['username'])?>"
                                                    maxlength="35">
                                                <p class="text-danger"><?= session('errors.per_username')?></p>
                                                <p class="d-none text-danger" id="validacion5" >Complete este campo por favor</p>
                                </div>
                                </div>
                            </div>
                            <?php if(session('msg')): ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= session('msg')?>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                            <!------botones----------->
                            <div class="col-12 mt-4">
                                    <button type="submit" class="btn-guardar" id="btn_guardar">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>

                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <?php include "include/script.php"?>
    <script>

    let boton_enviar = document.getElementById('btn_guardar');

    let val1 = document.getElementById('per_nombre');
    let val2 = document.getElementById('per_apellido');
    let val3 = document.getElementById('per_email');
    let val4 = document.getElementById('per_telefono');
    let val5 = document.getElementById('per_username');
    
    boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val3.value === '' || val3.value === null
            || val4.value === '' || val4.value === null || val5.value === '' || val5.value === null ) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })
                console.log("siuuu")
                // COMPLETAR CAMPOS UNO POR UNO
                if(val1.value === '' || val1.value === null)
                {
                    let error = document.getElementById('validacion1');
                    error.classList.remove('d-none');
                }

                if(val2.value === '' || val2.value === null)
                {
                    let error = document.getElementById('validacion2');
                    error.classList.remove('d-none');
                }

                if(val3.value === '' || val3.value === null)
                {
                    let error = document.getElementById('validacion3');
                    error.classList.remove('d-none');
                }

                if(val4.value === '' || val4.value === null)
                {
                    let error = document.getElementById('validacion4');
                    error.classList.remove('d-none');
                }

                if(val5.value === '' || val5.value === null)
                {
                    let error = document.getElementById('validacion5');
                    error.classList.remove('d-none');
                }

                // COMPLETAR CAMPOS UNO POR UNO FIIIIN

            } else {
                Swal.fire({
                    title: '¿Estás seguro que desea actualizar?',
                    text: "Está a punto de actualizar tu perfil",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, estoy seguro',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form_upd = document.getElementById('upd_form');
                        let update = new FormData(form_upd);

                        fetch('<?= base_url('ed_perfil') ?>', {
                                method: 'POST',
                                mode: 'no-cors',
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-Requested-With": "XMLHttpRequest"
                                },
                                body: update

                            }).then(res => res.json())
                            .then(res => { console.log(res);
                            if (res['respuesta']) {
                                Swal.fire(
                                    'Perfil actualizado!',
                                    res['mensaje'],
                                    'success'
                                ).then((value) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    res['mensaje'],
                                    'error'
                                );
                            }
                        })
                    }
                })
            }
        })

    </script>
</body>

</html>