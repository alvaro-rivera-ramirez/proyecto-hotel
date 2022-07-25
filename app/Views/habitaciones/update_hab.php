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
                            <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR HABITACION
                        </h3>
                    </div>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i>
                                    EDITAR HABITACION</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista-habitaciones')?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid">
                        <form action="" class="row g-3" method="POST" id="upd_hab">
                            <fieldset>
                                <legend><i class="far fa-plus-square"></i> Información</legend>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <input type="hidden" name="id_hab" value="<?= $hab['idHab']?>">
                                                <label for="num_hab" class="bmd-label-floating">Numero</label>
                                                <input type="text" class="form-control"
                                                    value="<?= old('num_hab',$hab['numero']) ?>" name="num_hab"
                                                    id="num_hab" maxlength="4">
                                                <p class="text-danger"><?= session('errors.num_hab')?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="tipo_hab" class="bmd-label-floating">Tipo Habitación</label>
                                                <select class="form-control" name="tipo_hab" id="tipo_hab">
                                                    <option value="" selected="" disabled="">Seleccione una opción
                                                    </option>
                                                    <?php foreach($tipo as $tipos):?>
                                                    <option value="<?= $tipos['idTipo'] ?>"
                                                        <?php if(old('tipo_hab',$hab['idTipo'])==$tipos['idTipo']):?>selected
                                                        <?php endif;?>> <?= $tipos['tipo'].' - '.$tipos['precio'] ?>
                                                    </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p class="text-danger"><?= session('errors.tipo_hab')?></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="estado_hab" class="bmd-label-floating">Estado</label>
                                                <select class="form-control" name="estado_hab" id="estado_hab">
                                                    <option value="" selected="" disabled="">Seleccione una opción
                                                    </option>
                                                    <?php foreach($estado as $estados):?>
                                                    <option value="<?= $estados['idEstado'] ?>"
                                                        <?php if(old('estado_hab',$hab['idEstado'])==$estados['idEstado']):?>selected
                                                        <?php endif;?>> <?= $estados['estado'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p class="text-danger"><?= session('errors.estado_hab')?></p>
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
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control"
                                                    value="<?= old('admin_clave')?>" name="admin_clave" id="admin_clave"
                                                    required>
                                                <p class="text-danger"><?= session('errors.admin_clave')?></p>
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

                            <div class="d-flex justify-content-end">


                                <button type="button" class="btn-guardar" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" id="act_habitacion">
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
        let boton_enviar = document.getElementById('act_habitacion');
        let admin_clave = document.getElementById('admin_clave');
        let admin_usuario = document.getElementById('admin_usuario');


        boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (admin_clave.value === '' || admin_clave.value === null || admin_usuario.value === '' ||
                admin_usuario.value === null) {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })

            } else {
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
                        let form_upd = document.getElementById('upd_hab');
                        let update = new FormData(form_upd);

                        fetch('<?= base_url('actualizar_habitacion')?>', {
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
                                    'Habitación actualizada!',
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