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
                  <div class="content sec-hab" >
                      <h3 class="pb-4">Registro / Habitaciones</h3>
                        <section>
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
                                    <tr></tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                            </div>
                            
                        </section>  
                  </div>
                </div>
        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>