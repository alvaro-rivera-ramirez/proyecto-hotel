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
                        <i class="fas fa-plus fa-fw"></i> AGREGAR HABITACION
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR HABITACION</a></div>
                        <div class="box-nav"> <a href="<?= base_url('lista-habitaciones')?>"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid">
                    <form action="<?= base_url('guardar_habitacion')?>" class="row g-3" method="POST">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="num_hab" class="bmd-label-floating">Numero</label>
                                            <input type="text" name="num_hab" id="num_hab" value="<?= old('num_hab')?>">
                                            <p class="text-danger"><?= session('errors.num_hab')?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="precio_hab" class="bmd-label-floating">Precio</label>
                                            <input type="text" disabled="" class="form-control" name="precio_hab" id="precio_hab">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_hab" class="bmd-label-floating">Tipo Habitación</label>
                                            <select name="tipo_hab" id="tipo_hab" class="form-control">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <?php foreach($tipo as $tipos):?>
                                                <option value="<?= $tipos['idTipo'] ?>" <?php if(old('tipo_hab')==$tipos['idTipo']):?>selected <?php endif;?>> <?= $tipos['tipo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <p class="text-danger"><?= session('errors.tipo_hab')?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <!-----BOTONES------> 
                         <div class="d-flex justify-content-end mt-4">
                                <button type="reset" class="btn-limpiar me-2"><i class="fa-solid fa-brush me-1"></i> Limpiar</button>
                            
                            <button type="submit" class="btn-guardar" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
</body>
</html>