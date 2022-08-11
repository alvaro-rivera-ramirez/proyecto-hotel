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
                    <!---->
                    <!-- Contenedor de Registros -->

                    <div>
                        <section>
                            <h3 class="pb-3">Reportes / Diario</h3>
                            <div class="row">

                                <div class="col">
                                    <div class="card text-white bg-dark mt-3" style="width: 18rem;">
                                        <div class="card-body">
                                            <h5 class="card-title" id="tit">Reporte diario</h5>
                                            <h5 class="card-subtitle mb-2" id="se">Fecha</h5>
                                            <p class="card-text" id="se">25/02/2022</p>
                                            <h5 class="card-subtitle mb-2" id="tr">Total</h5>
                                            <p class="card-text" id="tr">S/.480</p>
                                        </div>
                                    </div>
    
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-dark mt-3" style="width: 18rem;">
                                        <div class="card-body">
                                        <img src="..." class="card-img-top" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MENU DE OPCIONES-->
                            <div class="container-fluid mt-4">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> Buscar</a>
                                    </div>
                                    <div class="box-nav"> <a href="#"><i class="fas fa-filter fa-fw"></i></i> Fecha</a>
                                    </div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> Imprimir</a>
                                    </div>
                                </div>
                            </div>

                            <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive mt-1">
                                <table class="table bg-white">
                                    <thead class="bg-dark text-light">
                                        <tr class="text-wrap">
                                            <th>Nro</th>
                                            <th>Habitacion</th>
                                            <th>Tipo</th>
                                            <th>Cliente</th>
                                            <th>Monto</th>
                                            <th>Hora Ingreso</th>
                                            <th>Hora Salida</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-wrap">
                                            <td>1</td>
                                            <td>101</td>
                                            <td>Simple</td>
                                            <td>Yvan Mamani</td>
                                            <td>S/.80</td>
                                            <td>10:40:05</td>
                                            <td>14:40:15</td>
                                        </tr>
                                        <tr class="text-wrap">
                                            <td>2</td>
                                            <td>102</td>
                                            <td>Doble</td>
                                            <td>Diego Gomez</td>
                                            <td>S/.100</td>
                                            <td>10:40:05</td>
                                            <td>14:40:15</td>
                                        </tr>
                                        <tr class="text-wrap">
                                            <td>3</td>
                                            <td>104</td>
                                            <td>Simple</td>
                                            <td>Alvaro Gutierrez</td>
                                            <td>S/.80</td>
                                            <td>10:40:05</td>
                                            <td>14:40:15</td>
                                        </tr>
                                        <tr class="text-wrap">
                                            <td>5</td>
                                            <td>110</td>
                                            <td>Doble</td>
                                            <td>Carlos Yufra</td>
                                            <td>S/.100</td>
                                            <td>10:40:05</td>
                                            <td>14:40:15</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p class="text-end">Mostrando 1 al 10 de un total de 27</p>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </section>
                    </div>
                    <!----->
                </div>

            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
</body>

</html>