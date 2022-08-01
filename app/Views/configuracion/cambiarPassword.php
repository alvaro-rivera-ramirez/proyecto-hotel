<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    <style>
    </style>
</head>

<body>
   <div class="d-flex">
        <?php include "include/navLateral.php"?>     
       
        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-2 pt-3 content-body">
                <div class="content p-5" style="background: white;">
                    <h3 class="pb-2">CAMBIAR CONTRASEÑA</h3>
                
                
                    <!-- Contenido -->
                    <form id="upd_form" action="<?= base_url('ed_Password')?>" class="row g-3"
                                autocomplete="off" method="POST">
                        <div class="row col-lg-6 mt-4">
                            

                        <div class="col-md-12">
                                <div class="form-group">
                                    <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                    <input type="password" name="admin_clave" id="admin_clave" required="">
                                    <p class="text-danger"><?= session('errors.admin_clave')?> </p>
                                    <small class="d-none text-danger" id="validacion1" >Complete este campo por favor</small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_clave_1" class="bmd-label-floating">Nueva Contraseña</label>
                                    <input type="password" name="user_clave_1" id="user_clave_1">
                                    <small class="d-none text-danger" id="validacion2" >Complete este campo por favor</small>
                                    <small class="d-none text-danger" id="validacion4" >Tiene que ser más de 5 caracteres.</small>                      
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="user_clave_2" class="bmd-label-floating">Confirmar contraseña</label>
                                    <input type="password" name="user_clave_2" id="user_clave_2">
                                    <small class="d-none text-danger" id="validacion3" >El campo no coincide con el anterior.</small>
                                                        
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 text-center">
                                <span class="bolded "><br>IMPORTANTE<br></span>
                                <p class="mt-3">Se recomienda tener en<br>
                                cuenta usar una contraseña<br>
                                facil de recordar y dificil de<br>
                                descifrar para evitar posibles<br>
                                inconvenientes y/o posibles ataques<br>
                                maliciosos.</p>
                        </div> 
                        <?php if(session('msg')): ?>
                                            <div class="col-md-12">
                                                <div class="alert alert-danger" role="alert">
                                                    <?= session('msg')?>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                        <!-- Botones -->
                        <div class="col">
                            <button type="submit" class="btn-guardar" id="btn_guardar">
                            <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                        </div>
                    </form>
                </div>        
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>

    <script>
        let boton_enviar = document.getElementById('btn_guardar');

        let val1 = document.getElementById('admin_clave');
        let clave1 = document.getElementById('user_clave_1');
        let clave2 = document.getElementById('user_clave_2');
        
        boton_enviar.addEventListener('click', e => {
            e.preventDefault();console.log(clave1.value.length);
            if (val1.value === '' || val1.value === null || clave1.value === ''|| clave1.value === null ) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })
                // COMPLETAR CAMPOS UNO POR UNO
                if(val1.value === '' || val1.value === null)
                {
                    let error = document.getElementById('validacion1');
                    error.classList.remove('d-none');
                }
                if(clave1.value === '' || clave1.value === null)
                {
                    let error = document.getElementById('validacion2');
                    error.classList.remove('d-none');
                }

                // COMPLETAR CAMPOS UNO POR UNO FIIIIN

            }
            
            else if(clave1.value != clave2.value){
                let error = document.getElementById('validacion3');
                error.classList.remove('d-none');
                document.getElementById('validacion1').classList.add('d-none');
                document.getElementById('validacion2').classList.add('d-none');
            }else if(clave1.value.length <=5 ){
                let error = document.getElementById('validacion4');
                error.classList.remove('d-none');
            }
             else {
                if(clave1.value == clave2.value){
                    document.getElementById('validacion3').classList.add('d-none');
                }
                Swal.fire({
                    title: '¿Estás seguro que desea cambiar tu contraseña?',
                    text: "Está a punto de cambiar tu contraseña",
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
                        fetch('<?= base_url('ed_Password ') ?>', {
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
                                    'Contraseña actualizada!',
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
