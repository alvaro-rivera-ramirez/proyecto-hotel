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

                <!-- Contenido -->
                <div class="content p-5" style="background: white;">
                    <div class="full-box page-header">
                        <h3 class="text-start">
                            <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR TIPO DE HABITACION
                        </h3>
                    </div>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i>
                                    EDITAR TIPO DE HABITACION</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista-tipohab')?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE TIPO DE HABITACIONES</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid">
                        <form action="" class="row g-3" method="POST" id="upd_tipohab">
                            <fieldset>
                                <legend><i class="far fa-plus-square"></i> Información</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="tipo_hab" value="<(?= $tipohab['idTipo']?>">
                                                <label for="tipo_hab" class="bmd-label-floating">Tipo de Habitacion</label>
                                                <input type="reader" name="tipo_hab" id="tipo_hab"
                                                    value="<?= $tipoHab['tipo']?>">
                                                    <input type= "hidden" value="<!?= $tipoHab['idTipo']?>" id= "idTipo">
                                                <p class="text-danger"><?= session('errors.tipo_hab')?></p>
                                                <p class="d-none text-danger" id="validacion1" >No cambie este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                        <div class="form-group">
                                                <label for="precio_tipohab" class="bmd-label-floating">Precio Tipo del Habitacion</label>
                                                <input type="text" name="precio_tipohab" id="precio_tipohab"
                                                    value="<?= old('precio_tipohab',$tipoHab['precio'])?>">
                                                <p class="text-danger"><?= session('errors.precio_tipohab')?></p>
                                                <p class="d-none text-danger" id="validacion2" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                        <div class="form-group">
                                                <label for="descripcion_hab" class="bmd-label-floating">Descripcion del Tipo de Habitacion</label>
                                                <input type="text" name="descripcion_hab" id="descripcion_hab"
                                                    value="<?= old('descripcion_hab',$tipoHab['descripcion'])?>">
                                                <p class="text-danger"><?= session('errors.descripcion_hab')?></p>
                                                <p class="d-none text-danger" id="validacion3" >Complete este campo por favor</p>
                                            </div>
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
                                                <input type="text" class="form-control" name="admin_usuario"
                                                    id="admin_usuario" value="<?= old('admin_usuario')?>" required>
                                                <p class="text-danger"><?= session('errors.admin_usuario')?></p>
                                                <p class="d-none text-danger" id="validacion4" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control"
                                                    value="<?= old('admin_clave')?>" name="admin_clave" id="admin_clave"
                                                    required>
                                                <p class="text-danger"><?= session('errors.admin_clave')?></p>
                                                <p class="d-none text-danger" id="validacion5" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <?php if(session('msg')): ?>
                                        <div class="col-md-12">
                                            <div class="alert alert-danger" role="alert">
                                                <?= session('msg')?>
                                            </div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </fieldset>

                            
                            <div class="w-100 d-flex justify-content-end">
                                <button type="button" class="btn-guardar" id="act_tipohab">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let boton_enviar = document.getElementById('act_tipohab');
        let val1 = document.getElementById('tipo_hab');
        let val2 = document.getElementById('precio_tipohab');
        let val3 = document.getElementById('descripcion_hab');
        let val4 = document.getElementById('admin_usuario');
        let val5 = document.getElementById('admin_clave');        

        boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val3.value === '' ||
                val3.value === null) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })

                if(val1.value !== '' || val1.value !== null)
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

            } 
            else {
                Swal.fire({
                    title: '¿Estás seguro que desea actualizar esta habitación?',
                    text: "Está a punto de actualizar esta habitación",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, estoy seguro',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form_upd = document.getElementById('upd_tipohab');
                        let update = new FormData(form_upd);

                        fetch('<?= base_url('actualizar_tipohab')?>', {
                                method: 'POST',
                                mode: 'no-cors',
                                headers: {
                                    "Content-Type": "application/json",
                                    "X-Requested-With": "XMLHttpRequest"
                                },
                                body: update

                            }).then(res => res.json()).then(res => {
                            console.log(res);
                            console.log("prueb")
                            if (res['respuesta']) {
                                Swal.fire(
                                    'Tipo de Habitación actualizada!',
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