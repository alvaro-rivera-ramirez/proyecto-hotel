<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
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
                
                <div class="content p-5" style="background: white;"> 
                <!-- Contenedor de Registros -->
                    
                    <div>
                        <section>
                            <h3 class="pb-2">Registro / Reservas</h3>

                        <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR REGISTRO</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE REGISTROS</a> </div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> IMPRIMIR</a></div>
                                    <div class="box-nav">
                                        <form class="d-flex">
                                        <input class="input-buscar me-2" type="search" placeholder="Buscar" aria-label="Search">
                                        <button class="btn-buscar btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>
                                
                            </div>
                            
                        <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive mt-2">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr class="text-center">
                                        <th>N°</th>
                                        <th>Id. Cliente</th>
                                        <th>Nombre</th>
                                        <th>Id. Emp.</th>
                                        <th>Num. Hab.</th>
                                        <th>Fecha Inicio</th>
                                        <th>Fecha Fin</th>
                                        <th>Monto Total</th>
                                        <th>Estado</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach($reserva as $reservaciones) :?>
                                <tr class="text-center">
                                        <td><?= $reservaciones['idReserva']?></td>
                                        <td><?= $reservaciones['dni']?></td>
                                        <td><?= $reservaciones['nombre']?></td>
                                        <td>1000</td>
                                        <td>101</td>
                                        <td>14/05/22</td>
                                        <td>16/05/22</td>
                                        <td>100.00</td>
                                        <td>Pagado</td>
                                        <td>
                                            <a class="btn btn-success" href="#" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="">
                                                <button class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                            <p class="text-end">Mostrando Empleados 1 al 10 de un total de 27</p>
                             <!---- navegacion de pag ------>
                             <?= $pager->links('group1','botts_pagination'); ?>


                        </section>  
                  </div>
                </div>
            </div>
        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>