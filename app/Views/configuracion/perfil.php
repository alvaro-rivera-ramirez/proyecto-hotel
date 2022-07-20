<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <style>
        .marco {
            border: 3px solid #000;
        }

        .titulo {
            font-size: 10px;
            background-color: #4CD7F5;
            border-radius: 10px;
            color: black;
            height: 50px;
            text-align: center;
            font-weight: bold;
            line-height: 44px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        <?php include "include/navLateral.php"?>

        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-2 pt-3 content-body">

                <!-- Contenido -->

                <div class="container " style="height: 80vh;">
                    <div class="row justify-content-center mt-5">
                        <div class="col-12">
                            <div class="row justify-content-center">
                                <div class="col-xs-9 col-sm-9 col-md-9 col-md-5 col-lg-5 col-xl-5 caja">
                                    <h1 class=" text-center marco titulo">ACTUALIZAR PERFIL DE USUARIO</h1>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="row justify-content-center">
                        <div class="col-8 ">
                            <form action="">

                                <div class="row mt-5 mb-4 ">
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Nombres">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Apellidos">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Email">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Teléfono">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Dirección">
                                    </div>
                                    <div class="col-xs-11 col-sm-11 col-md-11 col-md-6 col-lg-6 col-xl-6">
                                        <input class="form-control marco mb-3" type="text" placeholder="Username">
                                    </div>

                                    <div class="col-6 ">
                                        <input class="btn btn-info mt-1" type="button" value=" Limpiar ">
                                    </div>
                                    <div class="col-6 ">
                                        <input class="btn btn-success mt-1" type="button" value="Actualizar">
                                    </div>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- FIN CONTENIDO -->
        </div>

    </div>
    </div>

    <?php include "include/script.php"?>
</body>

</html>