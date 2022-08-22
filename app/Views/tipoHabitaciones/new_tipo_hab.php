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
                                            <input type="text"  name="tipo_hab" id="tipo_hab" class="form-control validar">
                                            <p class="d-none text-danger validacion" ></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="precio_tipohab" class="bmd-label-floating">Precio</label>
                                            <input type="text"  class="form-control validar" name="precio_tipohab" id="precio_tipohab">
                                            <p class="d-none text-danger validacion" ></p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="descripcion_hab" class="bmd-label-floating">Descripcion</label>
                                            <input type="text" name="descripcion_hab" id="descripcion_hab" class="form-control validar">
                                            <p class="d-none text-danger validacion" ></p>
                                        </div>
                                    </div> -->
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
   <script src="js/tiposHabitacion/nuevoTipoH.js"></script>
</body>
</html>