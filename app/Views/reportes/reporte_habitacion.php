<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="css/styleReporte.css" />
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
                  
                    <div class="container-fluid" >
                        <section>
                            <img src="Imagenes/cuadro.png" class="graf">  
                            <h3 class="pb-3">Reportes / Habitaciones</h3>
                            <div class="largecontent2"> 
                                <h7 class="texto" id="tit">Reporte del mes</h7>
                                <h7 class="texto" id="pr">Año</h7>
                                <h8 class="texto" id="pr">2002</h8>
                                <h7 class="texto" id="se">Mes</h7>
                                <h8 class="texto" id="se">Febrero</h8>
                                <h7 class="texto" id="tr">Fecha</h7>
                                <h8 class="texto" id="tr">25/02/2022</h8>
                                <h7 class="texto" id="qr">Tipo Hab.</h7>
                                <h8 class="texto" id="qr">Variado</h8>
                                <h7 class="texto" id="qt">Total</h7>
                                <h8 class="texto" id="qt">S/.3800</h8>
                            </div>
                        <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> Buscar</a></div>
                                    <div class="box-nav"> <a href="#"><i class="fas fa-calendar fa-fw"></i></i> Fecha</a></div>
                                    <div class="box-nav"> <a href="#"><i class="fas fa-filter fa-fw"></i></i> Filtro</a></div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> Imprimir</a></div>
                                </div>
                                
                            </div>
                            
                        <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center">
                                        <th>N°</th>
                                        <th>Habitación</th>
                                        <th>Ubicación</th>
                                        <th>Tipo</th>
                                        <th>Recaudación</th>
                                        <th>N° Solicitud</th>
                                        <th>Operacion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                        <td>1</td>
                                        <td>101</td>
                                        <td>Primer Piso</td>
                                        <td>Simple</td>
                                        <td>S/. 480</td>
                                        <td>4</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-chart-simple"></i></button>
                                            <button type="button" class="btn btn-success"><span class="fa-solid fa-note"></span></button>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>102</td>
                                        <td>Primer Piso</td>
                                        <td>Simple</td>
                                        <td>S/. 480</td>
                                        <td>5</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-chart-simple"></i></button>
                                            <button type="button" class="btn btn-success"><span class="fa-solid fa-note"></span></button>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>3</td>
                                        <td>103</td>
                                        <td>Segundo Piso</td>
                                        <td>Simple</td>
                                        <td>S/. 480</td>
                                        <td>2</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-chart-simple"></i></button>
                                            <button type="button" class="btn btn-success"><span class="fa-solid fa-note"></span></button>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>4</td>
                                        <td>104</td>
                                        <td>Segundo Piso</td>
                                        <td>Simple</td>
                                        <td>S/. 480</td>
                                        <td>3</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-chart-simple"></i></button>
                                            <button type="button" class="btn btn-success"><span class="fa-solid fa-note"></span></button>
                                        </td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>5</td>
                                        <td>105</td>
                                        <td>Tercer Piso</td>
                                        <td>Simple</td>
                                        <td>S/. 480</td>
                                        <td>1</td>
                                        <td>
                                            <button type="button" class="btn btn-warning"><i class="fa-solid fa-chart-simple"></i></button>
                                            <button type="button" class="btn btn-success"><span class="fa-solid fa-note"></span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            <p class="text-end">Mostrando Empleados 1 al 10 de un total de 27</p>
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
            </div>
        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>