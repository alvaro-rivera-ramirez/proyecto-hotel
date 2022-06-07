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
                            <h3 class="pb-3">Reportes / Clientes</h3>
                            <div class="content"> 
                                <h4 class="texto">Total de clientes</h4>
                                <h4 class="texto">50</h4>
                            </div>
                            <div class="content"> 
                                <h4 class="texto">Nuevos clientes</h4>
                                <h4 class="texto">05</h4>
                            </div>
                            <div class="largecontent"> 
                                <h5 class="texto" id="tit">Reporte del mes</h5>
                                <h5 class="texto" id="pr">Mes</h5>
                                <h6 class="texto" id="pr">Febrero</h6>
                                <h5 class="texto" id="se">Fecha</h5>
                                <h6 class="texto" id="se">25/02/2022</h6>
                                <h5 class="texto" id="tr">Nro. visitas</h5>
                                <h6 class="texto" id="tr">120</h6>
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
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Ciudad</th>
                                        <th>Correo</th>
                                        <th>Nro. Visitas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                        <td>1</td>
                                        <td>72371390</td>
                                        <td>Yvan</td>
                                        <td>Mamani</td>
                                        <td>958132757</td>
                                        <td>Tacna</td>
                                        <td>yolmh@gmail.com</td>
                                        <td>10</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>2</td>
                                        <td>72371390</td>
                                        <td>Yvan</td>
                                        <td>Mamani</td>
                                        <td>958132757</td>
                                        <td>Tacna</td>
                                        <td>yolmh@gmail.com</td>
                                        <td>9</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>3</td>
                                        <td>72371390</td>
                                        <td>Yvan</td>
                                        <td>Mamani</td>
                                        <td>958132757</td>
                                        <td>Tacna</td>
                                        <td>yolmh@gmail.com</td>
                                        <td>8</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>4</td>
                                        <td>72371390</td>
                                        <td>Yvan</td>
                                        <td>Mamani</td>
                                        <td>958132757</td>
                                        <td>Tacna</td>
                                        <td>yolmh@gmail.com</td>
                                        <td>7</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>5</td>
                                        <td>72371390</td>
                                        <td>Yvan</td>
                                        <td>Mamani</td>
                                        <td>958132757</td>
                                        <td>Tacna</td>
                                        <td>yolmh@gmail.com</td>
                                        <td>6</td>
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