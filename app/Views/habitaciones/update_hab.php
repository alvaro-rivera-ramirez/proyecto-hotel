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
                        <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i> EDITAR HABITACION</a></div>
                        <div class="box-nav"> <a href="<?= base_url('lista-habitaciones')?>"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid">
                    <form action="<?= base_url('actualizar_habitacion')?>" class="row g-3" method="POST">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <input type="hidden" name="id_hab" value="<?= $hab['idHab']?>">
                                            <label for="num_hab" class="bmd-label-floating">Numero</label>
                                            <input type="text" class="form-control" value="<?= old('num_hab',$hab['numero']) ?>" name="num_hab" id="num_hab"  maxlength="4">
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
                                            <select class="form-control" name="tipo_hab" id="tipo_hab">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <?php foreach($tipo as $tipos):?>
                                                <option value="<?= $tipos['idTipo'] ?>" <?php if(old('tipo_hab',$hab['idTipo'])==$tipos['idTipo']):?>selected <?php endif;?>> <?= $tipos['tipo'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <p class="text-danger"><?= session('errors.tipo_hab')?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <p style="margin:10px 0px"class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de usuario y contraseña</p>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_usuario" class="bmd-label-floating">Nombre de usuario</label>
                                            <input type="text" class="form-control" name="admin_usuario" id="admin_usuario" value="<?= old('admin_usuario')?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" value="<?= old('admin_clave')?>" name="admin_clave" id="admin_clave" required>
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
                            
                            
                            <button type="button" class="btn-guardar" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-regular fa-floppy-disk me-1"></i> Guardar</button>
                            </div>
                        
                        <!---- confirmación--------->
                            <!--- modal de confirmación----->
                                    <div class="m-confirmacion modal fade" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-body">
                                           <h5 class="modal-title mb-2" >Confirmación</h5>
                                           <p class="mb-3"> ¿Estas seguro de guardar?</p>
                                             <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn-guardar me-1">Guardar</button>
                                                <button type="button" class="btn-cancelar" data-bs-dismiss="modal">Cerrar</button>
                                             </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <!--- modal ----->
                    </form>
                </div>
                </div>
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>