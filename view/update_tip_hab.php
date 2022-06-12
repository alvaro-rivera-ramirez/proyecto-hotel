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
                        <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR TIPO DE HABITACION
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR TIPO DE HABITACION</a></div>
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

                        <fieldset>
                            <p style="margin:10px 0px"class="text-center">Para poder guardar los cambios en esta cuenta debe de ingresar su nombre de usuario y contraseña</p>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="usuario_admin" class="bmd-label-floating">Nombre de usuario</label>
                                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="usuario_admin" id="usuario_admin" maxlength="35" required="" >
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label for="clave_admin" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" name="clave_admin" id="clave_admin" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                                        </div>
                                    </div>
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