<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>

</head>

<body>
    <div class="d-flex">
        <?php include "include/navLateral.php"?>

        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-2 pt-3 content-body">
                <div class="content p-5" style="background: white;">
                    <!-- Contenido -->
                    <div class="full-box page-header">
                        <h3 class="text-start">
                            <i class="fas fa-sync-alt fa-fw"></i> ACTUALIZAR CLIENTE
                        </h3>
                    </div>

                    <div class="container-fluid">
                        <div class="container-nav">
                            <div class="box-nav"> <a href="#" class="active"><i class="fas fa-sync-alt fa-fw"></i></i>
                                    EDITAR CLIENTE</a></div>
                            <div class="box-nav"> <a href="<?= base_url('lista-clientes')?>"><i
                                        class="fas fa-clipboard-list fa-fw"></i> LISTA DE CLIENTES</a> </div>
                        </div>

                    </div>

                    <div class="container-fluid p-3">
                        <form id="upd_form" action="<?= base_url('actualizar-cliente')?>" class="row g-3"
                            autocomplete="off" method="POST">
                            <fieldset>
                                <legend><i class="far fa-address-card"></i> Información del Cliente</legend>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <input type="hidden" name="cliente_id" value="<?= $cliente['idCliente']?>">
                                            <div class="form-group">
                                                <label for="cliente_dni" class="bmd-label-floating">DNI</label>
                                                <input type="text" name="cliente_dni" id="cliente_dni"
                                                  class="validar" value="<?= $cliente['dni']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_nombre" class="bmd-label-floating">Nombre</label>
                                                <input type="text" name="cliente_nombre" id="cliente_nombre" class="validar"
                                                    value="<?= $cliente['nombre']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_apellidop" class="bmd-label-floating">Apellido Paterno</label>
                                                <input type="text" name="cliente_apellidop" id="cliente_apellidop" class="validar"
                                                    value="<?= $cliente['apellidoPaterno']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_apellidom" class="bmd-label-floating">Apellido Materno</label>
                                                <input type="text" name="cliente_apellidom" id="cliente_apellidom" class="validar"
                                                    value="<?= $cliente['apellidoMaterno']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_telefono" class="bmd-label-floating">Teléfono</label>
                                                <input type="text" name="cliente_telefono" id="cliente_telefono" class="validar" value="<?= $cliente['telefono']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="cliente_email" class="bmd-label-floating">Email</label>
                                                <input type="email" name="cliente_email" id="cliente_email"
                                                    value="<?= $cliente['email']?>">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            


                            <fieldset>
                                <p style="margin:10px 0px" class="text-center">Para poder guardar los cambios en esta
                                    cuenta debe de ingresar su nombre de usuario y contraseña</p>
                                <div class="container-fluid">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_usuario" class="bmd-label-floating">Nombre de
                                                    usuario</label>
                                                <input type="text" class="form-control validar" name="admin_usuario" id="admin_usuario">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="admin_clave" class="bmd-label-floating">Contraseña</label>
                                                <input type="password" class="form-control validar"
                                                    name="admin_clave" id="admin_clave">
                                                <p class="d-none text-danger validacion"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="d-none alert alert-danger validacion" id="datosAdmin"role="alert">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <div class="w-100 d-flex justify-content-end">
                                   <button type="submit" class="btn-guardar"id="act_cliente">
                                      Guardar
                                    </button>                                    
                                </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <?php include "include/script.php"?>
    <script src="<?= base_url('js/clientes/editarCliente.js') ?>"></script>
</body>
</html>
