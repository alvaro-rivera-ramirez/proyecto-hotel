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

                <div class="content p-5" style="background: white;">
                    <!---->
                    <!-- Contenedor de Registros -->

                    <div>
                        <section>
                            <h3 class="pb-2">Registro / Clientes</h3>

                            <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="<?= base_url('nuevo_cliente')?>"><i
                                                class="fas fa-plus fa-fw"></i> AGREGAR CLIENTE</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i
                                                class="fas fa-clipboard-list fa-fw"></i> LISTA DE CLIENTES</a> </div>
                                    <div class="box-nav"> <a href="<?= base_url('imprimir_clientes')?>" target="_blank"><i class="fa-solid fa-print"></i> IMPRIMIR</a></div>
                                    <div class="box-nav">
                                        <form class="d-flex">
                                            <input class="input-buscar me-2" type="search" id="datoBuscar" placeholder="Buscar" aria-label="text">
                                            <button class="btn-buscar btn btn-dark" type="submit"><i
                                                    class="fas fa-search" id="buscar_c"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </div>

                            <!-- TABLE RESPONSIVE-->
                            <div class="table-responsive mt-2">
                                <table class="table table-striped">
                                    <thead class="bg-dark text-light">
                                        <tr class="text-center">
                                            <th>N°</th>
                                            <th>DNI</th>
                                            <th>Nombre Completo</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">

                                    </tbody>
                                </table>
                            </div>

                            <?php include "../app/Views/pagination/view_pag.php"?>


                        </section>
                    </div>

                    <!----->
                </div>

            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="js/clientes/listarClientes.js"></script>
    <script src="js/clientes/eliminar.js"></script>

</body>

</html>