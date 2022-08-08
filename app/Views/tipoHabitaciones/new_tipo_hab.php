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
                        <i class="fa-solid fa-tag"></i> AGREGAR TIPO HABITACION
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-solid fa-tag"></i> AGREGAR TIPO HABITACION</a></div>
                        <div class="box-nav"> <a href="<?= base_url('lista-tipohab')?>"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE TIPOS DE HABITACIONES</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid">
                    <form id="form_tipohab" class="row g-3" method="POST">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_hab" class="bmd-label-floating">Tipo Habitación</label>
                                            <input type="text"  name="tipo_hab" id="tipo_hab" value="<?= old('tipo_hab')?>">
                                            <p class="text-danger"><?= session('errors.tipo_hab')?></p>
                                            <p class="d-none text-danger" id="validacion3" >Complete este campo por favor</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="precio_tipohab" class="bmd-label-floating">Precio</label>
                                            <input type="text"  class="form-control" name="precio_tipohab" id="precio_tipohab">
                                            <p class="text-danger"><?= session('errors.precio_tipohab')?></p>
                                            <p class="d-none text-danger" id="validacion2" >Complete este campo por favor</p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="descripcion_hab" class="bmd-label-floating">Descripcion</label>
                                            <input type="text" name="descripcion_hab" id="descripcion_hab" value="<?= old('descripcion_hab')?>">
                                            <p class="text-danger"><?= session('errors.descripcion_hab')?></p>
                                            <p class="d-none text-danger" id="validacion1" >Complete este campo por favor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-----BOTONES------> 
                         <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn-limpiar me-2"><i class="fa-solid fa-brush me-1"></i> Limpiar</button>
                            
                            <button type="submit" class="btn-guardar" id="new_tipohab">
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
        let boton_enviar = document.getElementById('new_tipohab');
        let val1 = document.getElementById('tipo_hab');
        let val2 = document.getElementById('precio_tipohab');
        let val3 = document.getElementById('descripcion_hab');
        

        boton_enviar.addEventListener('click', e => {
            e.preventDefault();
            if (val1.value === '' || val1.value === null || val2.value === '' || val2.value === null 
            ||val3.value === '' || val3.value === null) 
            {
                let timerInterval
                Swal.fire({
                    icon: 'warning',
                    title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
                    timer: 1500,
                })

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

            } else {
                Swal.fire({
                    title: 'ESTÁ SEGURO DE REGISTRAR ESTE NUEVO TIPO DE HABITACIÓN?',
                    text: "Está a punto de registrar un NUEVO TIPO de habitación",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, estoy seguro',
                    cancelButtonText: 'Cancelar',
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form_upd = document.getElementById('form_tipohab');
                        let data = new FormData(form_upd);

                        fetch('<?= base_url('guardar_tipohab')?>', {
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
                                    'TIPO DE HABITACIÓN REGISTRADA EXITOSAMENTE',
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