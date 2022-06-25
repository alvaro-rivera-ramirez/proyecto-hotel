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
                            <h3 class="pb-3">Reportes / Mes</h3>
                            <div class="largecontent2"> 
                                <h7 class="texto" id="tit">Reporte de Mes</h7>
                                <h7 class="texto" id="pr">Año</h7>
                                <h8 class="texto" id="pr">2022</h8>
                                <h7 class="texto" id="se">Mes</h7>
                                <h8 class="texto" id="se">Febrero</h8>
                                <h7 class="texto" id="tr">Fecha</h7>
                                <h8 class="texto" id="tr">25/02/2022</h8>
                                <h7 class="texto" id="qr">Total</h7>
                                <h8 class="texto" id="qr">S/.480</h8>
                            </div>
                        <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> Buscar</a></div>
                                    <div class="box-nav"> <a href="#"><i class="fas fa-filter fa-fw"></i></i> Filtro</a></div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> Imprimir</a></div>
                                </div> 
                            </div>
                            
                        <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center">
                                        <th>Nro</th>
                                        <th>Habitacion</th>
                                        <th>Tipo</th>
                                        <th>Cliente</th>
                                        <th>Monto</th>
                                        <th>Fecha / Hora Ingreso</th>
                                        <th>Fecha / Hora Salida</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                        <td>1</td>
                                        <td>101</td>
                                        <td>Simple</td>
                                        <td>Yvan Mamani</td>
                                        <td>S/.80</td>
                                        <td>04/02/2022  10:40:05</td>
                                        <td>05/02/2022  14:40:15</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>102</td>
                                        <td>Doble</td>
                                        <td>Diego Gomez</td>
                                        <td>S/.100</td>
                                        <td>04/02/2022  10:40:05</td>
                                        <td>05/02/2022  14:40:15</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>3</td>
                                        <td>104</td>
                                        <td>Simple</td>
                                        <td>Alvaro Gutierrez</td>
                                        <td>S/.80</td>
                                        <td>04/02/2022  10:40:05</td>
                                        <td>05/02/2022  14:40:15</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>4</td>
                                        <td>106</td>
                                        <td>Simple</td>
                                        <td>Richard Smit</td>
                                        <td>S/.80</td>
                                        <td>04/02/2022  10:40:05</td>
                                        <td>05/02/2022  14:40:15</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>5</td>
                                        <td>110</td>
                                        <td>Doble</td>
                                        <td>Carlos Yufra</td>
                                        <td>S/.100</td>
                                        <td>04/02/2022  10:40:05</td>
                                        <td>05/02/2022  14:40:15</td>
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
            </div>
        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>