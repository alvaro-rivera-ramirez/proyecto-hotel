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
                        <div class="row g-3 mt-2">
                            <div class="col-md-4">
                                
                                
                                <div class="col-md-12">
                                    <label for="per_nombre" class="bmd-label-floating">Nombres</label>
                                    <input type="text" id="per_nombre">
                                </div>

                                <div class="col-md-12">
                                    <label for="per_apellidop" class="bmd-label-floating">Apellido Paterno</label>
                                    <input type="text" id="per_apellidop">
                                </div>

                                <div class="col-md-12">
                                    <label for="per_apellidom" class="bmd-label-floating">Apellido Materno</label>
                                    <input type="text" id="per_apellidom">
                                </div>

                            </div>

                            <div class="col-md-4">

                                
                                <div class="col-md-12">
                                    <label for="per_email" class="bmd-label-floating">Email</label>
                                    <input type="text" id="per_email">
                                </div>

                                <div class="col-md-12">
                                    <label for="per_telefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" id="per_telefono">
                                </div>

                                <div class="col-md-12">
                                    <label for="per_username" class="bmd-label-floating">Username</label>
                                    <input type="text" id="per_username">
                                </div>

                            </div>


                            <!------botones----------->
                            <div class="col-12 pt-100">
                                        <button type="button" class="btn-guardar btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Guardar
                                        </button>
                                        <!--- modal de confirmación----->
                                        <div class="m-confirmacion modal fade" tabindex="-1" id="exampleModal"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5 class="modal-title mb-2">Confirmación</h5>
                                                        <p class="mb-3"> ¿Estas seguro de guardar?</p>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn-guardar me-1">Guardar</button>
                                                            <button type="button" class="btn-cancelar"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>

                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <?php include "include/script.php"?>
</body>

</html>