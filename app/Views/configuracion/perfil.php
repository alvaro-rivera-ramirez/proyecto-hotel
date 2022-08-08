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
                                <div class="col-md-6" id="grupo__per_nombre">
                                        <label for="per_nombre" class="bmd-label-floating">Nombres</label>
                                        <input type="text" name="per_nombre" id="per_nombre"
                                                value="<?= old('per_nombre',$usuario['nombre'])?>">
                                            <p class="formulario__input-error text-danger">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                            
                                    
                                </div>

                                <div class="col-md-6" id="grupo__per_apellido">
                                    <label for="per_apellido" class="bmd-label-floating">Apellidos</label>
                                    <input type="text" name="per_apellido" id="per_apellido"
                                                    value="<?= old('per_apellido',$usuario['apellidoPaterno']." ".$usuario['apellidoMaterno'])?>">
                                                    <p class="formulario__input-error text-danger">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                                
                                </div>
                                
                                <div class="col-md-12" id="grupo__per_email">
                                    <label for="per_email" class="bmd-label-floating">Email</label>
                                    <input type="email" name="per_email" id="per_email"
                                                    value="<?= old('per_email',$usuario['email'])?>" maxlength="70">
                                                <p class="text-danger"><?= session('errors.per_email')?></p>
                                                <p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
                                                
                                            
                                </div>

                                <div class="col-md-6" id="grupo__per_telefono">
                                    <label for="per_telefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" name="per_telefono" id="per_telefono"
                                                    value="<?= old('per_telefono',$usuario['telefono'])?>">
                                                    <p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
                                                
                                           
                                </div>

                                <div class="col-md-6" id="grupo__per_username">
                                    <label for="per_username" class="bmd-label-floating">Username</label>
                                    <input type="text" name="per_username" id="per_username"
                                                    value="<?= old('per_username',$usuario['username'])?>"
                                                    maxlength="35">
                                                <p class="text-danger"><?= session('errors.per_username')?></p>
                                                <p class="formulario__input-error text-danger">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
                                </div>
                                <div class="col-md-12 mt-2" >
                                    <p class="d-none text-danger" id="msg_error">Por favor rellenar el formulario correctamente</p>
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
                            <div class="col-12 mt-2">
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
    
    const formulario =document.getElementById('upd_form');
    const inputs = document.querySelectorAll('#upd_form input');

    const expresiones = {
	usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
	password: /^.{4,12}$/, // 4 a 12 digitos.
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono: /^\d{7,14}$/ // 7 a 14 numeros.
    }

    const campos = {
        per_username: true,
        per_nombre: true,
        per_apellido: true,
        per_email: true,
        per_telefono: true
    }

    const validarFormulario = (e) => {
        switch (e.target.name) {
            case "per_nombre":
                validarCampo(expresiones.nombre, e.target, 'per_nombre');
            break;
            case "per_apellido":
                validarCampo(expresiones.nombre, e.target, 'per_apellido');
            break;
            case "per_email":
                validarCampo(expresiones.correo, e.target, 'per_email');
            break;
            case "per_telefono":
                validarCampo(expresiones.telefono, e.target, 'per_telefono');
            break;
            case "per_username":
                validarCampo(expresiones.usuario, e.target, 'per_username');
            break;
        }
    }

    const validarCampo = (expresion, input, campo) => {
        if(expresion.test(input.value)){
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        } else {
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo] = false;
        }
    }

    inputs.forEach((input) => {
	    input.addEventListener('keyup', validarFormulario);
        input.addEventListener('blur', validarFormulario);
    });

    let boton_enviar = document.getElementById('btn_guardar');

    boton_enviar.addEventListener('click', e =>{
        e.preventDefault();
        if(campos.per_username && campos.per_apellido && campos.per_email && campos.per_telefono && campos.per_username){
            document.getElementById('msg_error').classList.add('d-none');
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
                            .then(res => { console.log(res['errors']);
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

    //-------------------------------------------------------------------

    

    </script>
</body>

</html>