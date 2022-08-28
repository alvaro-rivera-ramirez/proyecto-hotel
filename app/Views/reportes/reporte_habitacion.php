<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <!--<link rel="stylesheet" href="css/styleReporte.css" />-->
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
                
                <!-- Contenedor de Registros -->
                <div class="content p-4" style="background: white;">
                    <div>
                        <section>  
                            <h3 class="pb-3">Reportes / Habitaciones</h3>
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card text-dark bg-light mt-3">
                                                <div class="card-body">
                                                    <h5 class="card-title">Reporte del Mes</h5>
                                                    <p class="card-subtitle mb-2 mt-2">Fecha Emisión</p>
                                                    <p class="card-text" id="fechaCard">20-02-2022</p>
                                                    <p class="card-subtitle m b-2 mt-2">Mes</p>
                                                    <p class="card-text" id="mesCard">Febrero</p>
                                                    <p class="card-subtitle mb-2 mt-2">Total</p>
                                                    <p class="card-text" id="totalCard"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-7">
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
                                                <button class="btn-buscar btn btn-dark" id="buscar_hab"><i
                                                class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    <div class="col-3">
                                        <input type="month" name="" id="mesR" class="form-control">
                                    </div>
                                    <div class="col-3 align-self-center">
                                        <a href="#" target="_blank" onclick="imprimir(this)" role="button"><i
                                            class="fa-solid fa-print"></i> IMPRIMIR</a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive mt-3">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-light">
                                        <tr class="text-center">
                                            <th>N°</th>
                                            <th>Habitación</th>
                                            <th>Tipo</th>
                                            <th>Fecha</th>
                                            <th>Detalle</th>
                                            <th>Recaudación Total</th>
                                            <th>Cantidad de Reservas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">
                                
                                    </tbody>
                                </table>
                            </div>
                            <?php include "../app/Views/pagination/view_pag.php"?>

                            <div class="modal fade" id="detalle_reserva" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalle de Reserva</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive mt-2">
                                                <table class="table table-striped">
                                                    <thead class="bg-dark text-light">
                                                        <tr class="text-center">
                                                            <<th>Id. Reserva</th>
                                                            <th>Numero Hab.</th>
                                                            <th>Fecha Reserva</th>
                                                            <th>Fecha Entrada</th>
                                                            <th>Fecha Salida</th>
                                                            <th>Noches</th>
                                                            <th>Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="detalle">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>  
                    </div>

                </div>
            </div>
        </div>
   </div>

   <?php include "include/script.php"?>
   <script src="js/reportes/mostrarModal.js"></script>
   <script src="js/reportes/reporteHabitacion.js"></script>
</body>
</html>