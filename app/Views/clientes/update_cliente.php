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
                            <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR CLIENTE
                        </h3>
                    </div>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i></i>
                                    EDITAR CLIENTE</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista-clientes')?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE CLIENTES</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid p-3">
                        <form id="upd_form" action="<?= base_url('actualizar-cliente')?>" class="row g-3"
                            autocomplete="off" method="POST">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> Información del Cliente</legend>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="hidden" name="cliente_id" value="<?= $cliente['idCliente']?>">
                                            <div class="form-group">
                                                <label for="cliente_dni" class="bmd-label-floating">DNI</label>
                                                <input type="text" name="cliente_dni" id="cliente_dni"
                                                    value="<?= old('cliente_dni',$cliente['dni'])?>">
                                                    <input type= "hidden" value="<?= $cliente['idCliente']?>" id= "idCliente">
                                                <p class="text-danger"><?= session('errors.cliente_dni')?></p>
                                                <p class="d-none text-danger" id="validacion1" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="cliente_nombre" id="cliente_nombre"
                                                    value="<?= old('cliente_nombre',$cliente['nombre'])?>">
                                                <p class="text-danger"><?= session('errors.cliente_nombre')?></p>
                                                <p class="d-none text-danger" id="validacion2" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_apellidop" class="bmd-label-floating">Apellido Paterno</label>
                                                <input type="text" name="cliente_apellidop" id="cliente_apellidop"
                                                    value="<?= old('cliente_apellidop',$cliente['apellidoPaterno'])?>">
                                                <p class="text-danger"><?= session('errors.cliente_apellidop')?></p>
                                                <p class="d-none text-danger" id="validacion3" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_apellidom" class="bmd-label-floating">Apellido Materno</label>
                                                <input type="text" name="cliente_apellidom" id="cliente_apellidom"
                                                    value="<?= old('cliente_apellidom',$cliente['apellidoMaterno'])?>">
                                                <p class="text-danger"><?= session('errors.cliente_apellidom')?></p>
                                                <p class="d-none text-danger" id="validacion4" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_telefono" class="bmd-label-floating">Teléfono</label>
                                                <input type="text" name="cliente_telefono" id="cliente_telefono"
                                                    value="<?= old('cliente_telefono',$cliente['telefono'])?>">
                                                <p class="text-danger"><?= session('errors.cliente_telefono')?></p>
                                                <p class="d-none text-danger" id="validacion5" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_email" class="bmd-label-floating">Email</label>
                                                <input type="email" name="cliente_email" id="cliente_email"
                                                    value="<?= old('cliente_email',$cliente['email'])?>" maxlength="70">
                                                <p class="text-danger"><?= session('errors.cliente_email')?></p>
                                                <!---<p class="d-none text-danger" id="validacion6" >Complete este campo por favor</p>-->
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
                                                <p class="d-none text-danger" id="validacion7" >Complete este campo por favor</p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control"
                                                    value="<?= old('admin_clave')?>" name="admin_clave" id="admin_clave"
                                                    required>
                                                <p class="text-danger"><?= session('errors.admin_clave')?></p>
                                                <p class="d-none text-danger" id="validacion8" >Complete este campo por favor</p>
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
                                   <button type="submit" class="btn-guardar"id="act_cliente">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let boton_enviar = document.getElementById('act_cliente');

        let val1 = document.getElementById('cliente_dni');
        let val2 = document.getElementById('cliente_nombre');
        let val3 = document.getElementById('cliente_apellidop');
        let val4 = document.getElementById('cliente_apellidom');
        let val5 = document.getElementById('cliente_telefono');
        let val6 = document.getElementById('cliente_email');

        let val7 = document.getElementById('admin_usuario');
        let val8 = document.getElementById('admin_clave');

        boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null || val5.value === '' || val5.value === null 
            || val7.value === '' || val7.value === null || val8.value === '' || val8.value === null) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })
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

                if(val3.value === '' || val4.value === '')
                {
                    if(val3.value ==='' && val4.value !=''){
                        let error = document.getElementById('validacion3');
                        error.classList.remove('d-none');

                    }
                    if(val4.value ==='' && val3.value !=''){
                        let error2 = document.getElementById('validacion4');
                        error2.classList.remove('d-none');
                    }
                }

                // if(val4.value === '' || val4.value === null)
                // {
                //     let error = document.getElementById('validacion4');
                //     error.classList.remove('d-none');
                // }

                if(val5.value === '' || val5.value === null)
                {
                    let error = document.getElementById('validacion5');
                    error.classList.remove('d-none');
                }

              /*  if(val6.value === '' || val6.value === null)
                {
                    let error = document.getElementById('validacion6');
                    error.classList.remove('d-none');
                }*/

                if(val7.value === '' || val7.value === null)
                {
                    let error = document.getElementById('validacion7');
                    error.classList.remove('d-none');
                }

                if(val8.value === '' || val8.value === null)
                {
                    let error = document.getElementById('validacion8');
                    error.classList.remove('d-none');
                }

                // COMPLETAR CAMPOS UNO POR UNO FIIIIN

            } else {
                Swal.fire({
                    title: '¿Estás seguro que desea actualizar este cliente?',
                    text: "Está a punto de actualizar este cliente",
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

                        fetch('<?= base_url('actualizar-cliente ') ?>', {
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
                                    'Cliente actualizado!',
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
