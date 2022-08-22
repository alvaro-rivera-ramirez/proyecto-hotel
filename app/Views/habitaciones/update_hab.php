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
                                                    id="num_hab" maxlength="4" class="validar" require>
                                                <p class="text-danger"><?= session('errors.num_hab')?></p>
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="tipo_hab" class="bmd-label-floating">Tipo Habitación</label>
                                                <select class="form-control" name="tipo_hab" id="tipo_hab" class="validar" require>
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
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="form-group">
                                                <label for="estado_hab" class="bmd-label-floating">Estado</label>
                                                <select class="form-control" name="estado_hab" id="estado_hab" class="validar" require>
                                                    <option value="" selected="" disabled="">Seleccione una opción
                                                    </option>
                                                    <?php foreach($estado as $estados):?>
                                                    <option value="<?= $estados['idEstado'] ?>"
                                                        <?php if(old('estado_hab',$hab['idEstado'])==$estados['idEstado']):?>selected
                                                        <?php endif;?>> <?= $estados['estado'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <p class="text-danger"><?= session('errors.estado_hab')?></p>
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
                                                <input type="text" class="form-control validar" name="admin_usuario" id="admin_usuario" require>
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control validar"
                                                    name="admin_clave" id="admin_clave" require>
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

                            <div class="w-100 d-flex justify-content-end">
                                   <button type="submit" class="btn-guardar"id="act_habitacion">
                                      Guardar
                                    </button>                                    
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="<?= base_url('js/habitaciones/editarHabitacion.js') ?>"></script>
    
    <script>
        // let boton_enviar = document.getElementById('act_habitacion');
        // let val1 = document.getElementById('num_hab');
        // let val2 = document.getElementById('admin_usuario');
        // let val3 = document.getElementById('admin_clave');        

        // boton_enviar.addEventListener('click', e => {
        //     e.preventDefault();
        //     if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val3.value === '' ||
        //         val3.value === null) 
        //     {
        //         let timerInterval
        //         Swal.fire({
        //             icon: 'warning',
        //             title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
        //             timer: 1500,
        //         })

        //         if(val1.value === '' || val1.value === null)
        //         {
        //             let error = document.getElementById('validacion1');
        //             error.classList.remove('d-none');
        //         }

        //         if(val2.value === '' || val2.value === null)
        //         {
        //             let error = document.getElementById('validacion2');
        //             error.classList.remove('d-none');
        //         }

        //         if(val3.value === '' || val3.value === null)
        //         {
        //             let error = document.getElementById('validacion3');
        //             error.classList.remove('d-none');
        //         }

        //     } 
        //     else {
        //         Swal.fire({
        //             title: '¿Estás seguro que desea actualizar esta habitación?',
        //             text: "Está a punto de actualizar esta habitación",
        //             icon: 'warning',
        //             showCancelButton: true,
        //             confirmButtonColor: '#3085d6',
        //             cancelButtonColor: '#d33',
        //             confirmButtonText: 'Sí, estoy seguro',
        //             cancelButtonText: 'Cancelar',
        //         }).then((result) => {
        //             if (result.isConfirmed) {
        //                 let form_upd = document.getElementById('upd_hab');
        //                 let update = new FormData(form_upd);

        //                 fetch('actualizar_habitacion', {
        //                         method: 'POST',
        //                         mode: 'no-cors',
        //                         headers: {
        //                             "Content-Type": "application/json",
        //                             "X-Requested-With": "XMLHttpRequest"
        //                         },
        //                         body: update

        //                     }).then(res => res.json()).then(res => {
        //                     console.log(res);
        //                     console.log("prueb")
        //                     if (res['respuesta']) {
        //                         Swal.fire(
        //                             'Habitación actualizada!',
        //                             res['mensaje'],
        //                             'success'
        //                         ).then((value) => {
        //                             location.reload();
        //                         });
        //                     } else {
        //                         Swal.fire(
        //                             'Error!',
        //                             res['mensaje'],
        //                             'error'
        //                         );
        //                     }
        //                 })
        //             }
        //         })
        //     }
        // })
    </script>
</body>

</html>