<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
                <div class="full-box page-header">
                    <h3 class="pb-2 text-start">
                        <i class="fas fa-plus fa-fw"></i>AGREGAR TIPO DE HABITACION
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR TIPO DE HABITACION</a></div>
                        <div class="box-nav"> <a href="#"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a> </div>
                        <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR HABITACION</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid">
                    <form action="" class="row g-3" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="num_hab" class="bmd-label-floating">Tipo</label>
                                            <input type="text" name="tipo_hab" id="num_hab" maxlength="4">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-3">
                                        <div class="form-group">
                                            <label for="precio_hab" class="bmd-label-floating">Precio</label>
                                            <input type="text"  name="precio_hab" id="precio_hab" placeholder="S/00.00">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="tipo_hab" class="bmd-label-floating">Descripción</label>
                                            <input type="text"  name="precio_hab" id="des_hab" placeholder="TV con Cable, Cama de plaza y media, Baño Privado....">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-----BOTONES------> 
                         <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn-limpiar me-2"><i class="fa-solid fa-brush me-1"></i> Limpiar</button>
                            
                            <button type="submit" class="btn-guardar" id="new_hab">
                            <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                        </div>
                        <!-----BOTONES----->
                    </form>
                </div>
                </div>
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
   <script>
        let boton_enviar = document.getElementById('new_hab');
        let dni = document.getElementById('cli_dni_reg');
        let nombre = document.getElementById('cli_nombre_reg');
        let paterno = document.getElementById('cli_apellidop_reg');
        let materno = document.getElementById('cli_apellidom_reg');
        let fono = document.getElementById('cli_telefono_reg');
        let correo = document.getElementById('cli_email_reg');
        

        boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (dni.value === '' || dni.value === null || nombre.value === '' || nombre.value === null || paterno.value === '' || paterno.value === null
            || materno.value === '' || materno.value === null || fono.value === '' || fono.value === null || correo.value === '' || correo.value === null) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })

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
                            } 
                        })
                    }
                })
            }
        })
    </script>
</body>
</html>