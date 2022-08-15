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

            <!-- Contenido -->
            <div class="ps-2 pt-3 content-body">

                <!-- Contenedor de Registros -->

                <div class="content p-4" style="background: white;">
                    <!-- Contenedor de Registros -->

                    <div>
                        <section>
                            <h3 class="pb-3">Reportes / Diario</h3>
                            <div class="row">

                                <div class="col">
                                    <div class="card text-white bg-dark mt-3" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-subtitle mb-2">Fecha</h5>
                                            <p class="card-text" id="fecha">25/02/2022</p>
                                            <h5 class="card-subtitle mb-2 mt-2">Total</h5>
                                            <p class="card-text" id="gTotal">S/.480</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <canvas id="myChart" width="500" height="250"></canvas>

                                </div>
                            </div>
                            <!-- MENU DE OPCIONES-->
                            <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="nh input-group ">
                                            <input type="text" class="form-control" placeholder="Buscar" id="dato_buscar">
                                            <button class="btn-buscar btn btn-dark" id="buscar_reserva"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <input type="date" id="fechaR" class="form-control" name="fechaR">
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <a href="<?= base_url('demo-pdf') ?>" target="_blank"><i
                                                class="fa-solid fa-print"></i> IMPRIMIR</a>
                                    </div>
                                </div>
                            </div>


                            <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive mt-3">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-light">
                                        <tr class="text-wrap">
                                            <th>ID</th>
                                            <th>DNI</th>
                                            <th>Cliente</th>
                                            <th>Fecha</th>
                                            <th>Detalle</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody id="resultado">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-end">Mostrando 1 al 10 de un total de 27</p>
                            <?php include "../app/Views/pagination/view_pag.php"?>
                        </section>
                    </div>
                    <!----->
                </div>

            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
    <!-- <script src="js/reportes/paginacion.js"></script> -->
    <script src="js/reportes/reporteDia.js"></script>

</body>

</html>