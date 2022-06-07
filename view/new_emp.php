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
                <div class="full-box page-header">
                    <h3 class="text-start">
                        <i class="fas fa-plus fa-fw"></i> AGREGAR EMPLEADO
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR EMPLEADO</a></div>
                        <div class="box-nav"> <a href="registro_emp.php"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE EMPLEADOS</a> </div>
                        <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR EMPLEADOS</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid p-3">
                    <form action="" class="row g-3" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-address-card"></i> Información Personal</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_dni" class="bmd-label-floating">DNI</label>
                                            <input type="text" pattern="[0-9-]{1,27}" class="form-control" name="emp_dni_reg" id="emp_dni" maxlength="27">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_nombre" class="bmd-label-floating">Nombre</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="emp_nombre_reg" id="emp_nombre" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_apellido" class="bmd-label-floating">Apellidos</label>
                                            <input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,40}" class="form-control" name="emp_apellido_reg" id="emp_apellido" maxlength="40">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_telefono" class="bmd-label-floating">Teléfono</label>
                                            <input type="text" pattern="[0-9()+]{8,20}" class="form-control" name="emp_telefono_reg" id="emp_telefono" maxlength="15">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset>
                            <legend><i class="fas fa-user-lock"></i> Información de la cuenta</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_usuario" class="bmd-label-floating">Nombre de usuario</label>
                                            <input type="text" pattern="[a-zA-Z0-9]{1,35}" class="form-control" name="emp_usuario_reg" id="emp_usuario" maxlength="35">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_email" class="bmd-label-floating">Email</label>
                                            <input type="email" class="form-control" name="emp_email_reg" id="emp_email" maxlength="70">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_clave_1" class="bmd-label-floating">Contraseña</label>
                                            <input type="password" class="form-control" name="emp_clave_1_reg" id="emp_clave_1" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="emp_clave_2" class="bmd-label-floating">Repetir contraseña</label>
                                            <input type="password" class="form-control" name="emp_clave_2_reg" id="emp_clave_2" pattern="[a-zA-Z0-9$@.-]{7,100}" maxlength="100" required="" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <br><br><br>
                        <fieldset>
                            <legend><i class="fas fa-medal"></i> Nivel de privilegio</legend>
                            <div class="container-fluid">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <p><span class="badge bg-primary" style="background-color:#0d6efd !important">Administrador</span> Permisos para registrar, actualizar y eliminar</p>
                                        <p><span class="badge bg-secondary">Recepcionista</span> Permisos para registrar y actualizar</p>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <select class="form-control" name="emp_privilegio_reg">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Recepcionista</option>
                                                <option value="3">Registrar</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <p class="text-center" style="margin-top: 20px;">
                            <button type="reset" class="btn btn-info"><i class="fa-solid fa-brush"></i> Limpiar</button>
                            <button type="submit" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa-regular fa-floppy-disk"></i> Guardar</button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Esta seguro de guardar?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Guardar</button>
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </p>
                        
                    </form>
                </div>
            
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>