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
                  
                    <div >
                        <section>
                            <h3 class="pb-2">Registro / Usuarios</h3>

                        <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="<?= base_url('nuevo_usuario')?>"><i class="fas fa-plus fa-fw"></i> AGREGAR USUARIO</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE USUARIOS</a> </div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> IMPRIMIR</a></div>
                                    <div class="box-nav">
                                        <form class="d-flex">
                                            <input class="input-buscar me-2"  type="search" placeholder="Buscar" aria-label="Search">
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
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Username</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($usuario as $usuarios) :?>
                                    <tr class="text-center">
                                        <td><?= $usuarios['id']?></td>
                                        <td><?= $usuarios['dni']?></td>
                                        <td><?= $usuarios['nombre']?></td>
                                        <td><?= $usuarios['apellidoPaterno']." ".$usuarios['apellidoMaterno']?></td>
                                        <td><?= $usuarios['telefono']?></td>
                                        <td><?= $usuarios['correo']?></td>
                                        <td><?= $usuarios['username']?></td>
                                        <td>
                                            <a class="btn btn-success" href="<?= base_url('editar_usuario/'.$usuarios['id'])?>" role="button">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <a class="btn btn-danger" href="<?= base_url('eliminar_usuario/'.$usuarios['id'])?>"><i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>

                                    <!-- <tr class="text-center">
                                        <td>2</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
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
                                    </tr> -->
                                   
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