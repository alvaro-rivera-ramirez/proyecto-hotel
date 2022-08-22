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

                <div class="content p-5" style="background: white;">
                    <div>
                        <!--<h3 class="pb-4">Registro / Habitaciones</h3> -->
                        <section>
                            <div class="full-box page-header">
                                <h3 class="pb-2 text-start">
                                    Registro / Habitaciones
                                </h3>
                            </div>

                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="<?= base_url('nueva_habitacion')?>"><i
                                                class="fas fa-plus fa-fw"></i> AGREGAR HABITACION</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i
                                                class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a>
                                    </div>
                                    <div class="box-nav"> <a href="<?= base_url('imprimir_hab')?>" target="_blank"><i class="fa-solid fa-print"></i> IMPRIMIR</a>
                                    </div>
                                    <div class="box-nav">
                                        <form class="d-flex">
                                            <input class="input-buscar me-2" type="search" placeholder="Buscar"
                                                aria-label="Search" id="datoBuscar">
                                            <button class="btn-buscar btn btn-dark" type="submit" id="buscar_h"><i
                                                    class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </div>


                            <!-- TABLA RESPONSIVE -->

                            <div class="table-responsive mt-2" id="TablaHabitaciones">
                                <table class="table table-striped" >
                                    <thead class="bg-dark text-light" >
                                        <tr class="text-center">
                                            <th>N°</th>
                                            <th>Numero</th>
                                            <th>Tipo</th>
                                            <th>Precio</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">

                                    </tbody>
                                </table>
                            </div>


                            <p class="text-end">Mostrando Habitaciones 1 al 10 de un total de 15</p>


                            <!---- navegacion de pag ------>

                            <?php include "../app/Views/pagination/view_pag.php"?>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="js/habitaciones/listarHabitaciones.js"></script>
    <script src="js/habitaciones/eliminarHabitacion.js"></script>
</body>

</html>