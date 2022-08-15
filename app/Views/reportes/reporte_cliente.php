<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
</head>

<body>
    <?php 
    $d = new DateTime( '2010-01' );
    $d->modify( 'last month' );
    echo $d->format('Y-m');
    //echo date( "Y-m", strtotime( "2009-01 -1 month" ) ); // PHP:  2009-03-03
    ?>
    <div class="d-flex">
        <?php include "include/navLateral.php"?>

        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <!-- Contenido -->

            <div class="ps-2 pt-3 content-body">

                <!-- Contenedor de Registros -->
                <div class="content p-4" style="background: white;">
                    <div>
                        <section>
                            <h3 class="pb-3">Reportes / Clientes</h3>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card text-white bg-dark mt-3">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">Total de Clientes</h5>
                                                    <p class="card-text" id="tClientes">150</p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card text-white bg-dark mt-3">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">Nuevos Clientes</h5>
                                                    <p class="card-text" id="nClientes">20</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="card text-dark bg-light mt-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">Reporte del Mes</h5>
                                                    <p class="card-subtitle mb-2 mt-2">Fecha Emisión</p>
                                                    <p class="card-text" id="fechaCard">20-02-2022</p>
                                                    <p class="card-subtitle mb-2 mt-2">Mes</p>
                                                    <p class="card-text" id="mesCard">Febrero</p>
                                                    <p class="card-subtitle mb-2 mt-2">Total de visitas</p>
                                                    <p class="card-text" id="reservasCard">100</p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <canvas id="myChart" width="500" height="250"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- MENU DE OPCIONES-->
                            <div class="container-fluid mt-4">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="nh input-group ">
                                            <input type="search" class="form-control" placeholder="Buscar"
                                                id="dato_buscar">
                                            <button class="btn-buscar btn btn-dark" id="buscar_reserva"><i
                                                    class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <select id="mesR" class="form-select">
                                            <option value="1">Enero</option>
                                            <option value="2">Febrero</option>
                                            <option value="3">Marzo</option>
                                            <option value="4">Abril</option>
                                            <option value="5">Mayo</option>
                                            <option value="6">Junio</option>
                                            <option value="7">Julio</option>
                                            <option value="8">Agosto</option>
                                            <option value="9">Setiembre</option>
                                            <option value="10">Octubre</option>
                                            <option value="11">Noviembre</option>
                                            <option value="12">Diciembre</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <select id="anioR" class="form-select">
                                            <option value="2022">2022</option>
                                        </select>
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

                </div>
            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="js/reportes/reporteCliente.js"></script>
</body>

</html>