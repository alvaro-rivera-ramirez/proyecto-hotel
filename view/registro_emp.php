<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    <style>
        #nav-registro{
            padding:20px 10px;
        }
        .nav-item:hover{
            border-bottom: 2px solid #000;
        }
    </style>
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
                      <h3 class="pb-3">Registro / Empleados</h3>
                        <section>

                        <!-- MENU DE OPCIONES-->
                        <div class="container-fluid" id="nav-registro">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a href="#"><i class="fas fa-plus fa-fw"></i>AGREGAR EMPLEADO</a>
                                </li>
                                <li class="nav-item">
                                    <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i>LISTA DE EMPLEADOS</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR EMPLEADO</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#"><i class="fa-solid fa-print"></i> IMPRIMIR</a>
                                </li>
                            </ul>	
                        </div> 


                        <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>N°</th>
                                        <th>DNI</th>
                                        <th>Nombre</th>
                                        <th>Apellidos</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Username</th>
                                        <th class="content-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>71651610</td>
                                        <td>Alvaro</td>
                                        <td>Ramirez</td>
                                        <td>954482013</td>
                                        <td>aaa@gmail.com</td>
                                        <td>user11</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="text-right">Mostrando Empleados 1 al 10 de un total de 27</p>
                            </div>
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