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
                                <div class="form-group" id="grupo__admin_clave">
                                    <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                    <input type="password" name="admin_clave" id="admin_clave" required="">
                                    <p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos y sin espacio.</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group" id="grupo__user_clave_1">
                                    <label for="user_clave_1" class="bmd-label-floating">Nueva Contraseña</label>
                                    <input type="password" name="user_clave_1" id="user_clave_1">
                                    <p class="formulario__input-error">La contraseña tiene que ser de 5 a 8 dígitos y sin espacio.</p>                     
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group" id="grupo__user_clave_2">
                                    <label for="user_clave_2" class="bmd-label-floating">Confirmar contraseña</label>
                                    <input type="password" name="user_clave_2" id="user_clave_2">
                                    <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
                                                        
                                </div>
                            </div>
                            <div class="col-md-12 mt-2" >
                                    <p class="d-none text-danger" id="msg_error">Por favor rellenar el formulario correctamente</p>
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
        const formulario =document.getElementById('upd_form');
        const inputs = document.querySelectorAll('#upd_form input');

        const expresiones = {
            password: /^.{5,8}$/, // 4 a 12 digitos.
        }
        
        const campos = {
            admin_clave: false,
            user_clave_1: false,
        }

        const validarFormulario = (e) => {
        switch (e.target.name) {
            case "admin_clave":
                validarCampo(expresiones.password, e.target, 'admin_clave');
            break;
            case "user_clave_1":
                validarCampo(expresiones.password, e.target, 'user_clave_1');
                validarPassword2();
            break;
            case "user_clave_2":
                validarPassword2();
            break;
        }
        }

        const validarCampo = (expresion, input, campo) => {
            var noValido = / /;
            if(expresion.test(input.value) && !noValido.test(input.value)){
                document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
                campos[campo] = true;
            } else {
                document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
                campos[campo] = false;
            }
        }

        const validarPassword2 = () => {
            const inputPassword1 = document.getElementById('user_clave_1');
            const inputPassword2 = document.getElementById('user_clave_2');

            if(inputPassword1.value !== inputPassword2.value){
                document.querySelector(`#grupo__user_clave_2 .formulario__input-error`).classList.add('formulario__input-error-activo');
                campos['user_clave_1'] = false;
            } else {
                document.querySelector(`#grupo__user_clave_2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
                campos['user_clave_1'] = true;
            }
        }

        inputs.forEach((input) => {
            input.addEventListener('keyup', validarFormulario);
            input.addEventListener('blur', validarFormulario);
        });

        let boton_enviar = document.getElementById('btn_guardar');
        
        boton_enviar.addEventListener('click', e =>{
            e.preventDefault();
            if(campos.admin_clave && campos.user_clave_1){
                document.getElementById('msg_error').classList.add('d-none');
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
            }else{
                document.getElementById('msg_error').classList.remove('d-none');
                let timerInterval
                    Swal.fire({
                        icon: 'warning',
                        title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                        timer: 1500,
                    })
            }
        });
        //---------------------
        
      
    </script>
</body>
</html>
