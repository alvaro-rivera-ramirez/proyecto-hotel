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
                  <div class="container-fluid" >
                      <h3 class="pb-4">Registro / Habitaciones</h3>
                        <section>
                            <div class="container-fluid">
                                <ul class="full-box list-unstyled page-nav-tabs">
                                    <li>
                                        <a href="#"><i class="fas fa-plus fa-fw"></i>AGREGAR HABITACIONES</a>
                                    </li>
                                    <li>
                                        <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i>LISTA DE HABITACIONES</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR HABITACIONES</a>
                                    </li>
                                </ul>	
                            </div> 

                            <div class="table-responsive">
                            <table class="table bg-white">
                                <thead class="bg-dark text-light">
                                    <tr>
                                        <th>N°</th>
                                        <th>Numero</th>
                                        <th>Precio</th>
                                        <th>Caracteristicas</th>
                                        <th>Estado</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>100</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>101</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>102</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>103</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>104</td>
                                        <td>S/. 50</td>
                                        <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                        <td>Libre</td>
                                        <td>
                                            <div class="d-grid gap-2 d-md-block">
                                            <button class="btn btn-warning" type="button">Editar</button>
                                            <button class="btn btn-danger" type="button">Eliminar</button> </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
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