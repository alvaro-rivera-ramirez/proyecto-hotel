<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <style>
    .nh input:focus {
        box-shadow: none;
    }

    label {
        margin-top: 7px;
    }

    .puntero {
        cursor: pointer;
    }

    .ocultar {
        display: none;
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

                <div class="content p-5" style="background: white;">
                    <!-- Contenedor de Registros -->

                    <div>
                        <section>
                            <h3 class="pb-2">Registro / Reservas</h3>

                            <!-- MENU DE OPCIONES-->
                            <div class="container-fluid">
                                <div class="container-nav">
                                    <div class="box-nav"> <a href="<?= base_url('reservar')?>"><i
                                                class="fas fa-plus fa-fw"></i> AGREGAR
                                            RESERVA</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i
                                                class="fas fa-clipboard-list fa-fw"></i> LISTA DE REGISTROS</a> </div>
                                    <div class="box-nav"> <a href="#"><i class="fa-solid fa-print"></i> IMPRIMIR</a>
                                    </div>
                                    <div class="box-nav">
                                        <form class="d-flex">
                                            <input class="input-buscar me-2" type="search" placeholder="Buscar"
                                                aria-label="text">
                                            <button class="btn-buscar btn btn-dark" type="submit"><i
                                                    class="fas fa-search"></i></button>
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
                                            <th>Nombre Completo</th>
                                            <th>Registrado por</th>
                                            <th>Fecha</th>
                                            <th>Detalles</th>
                                            <th>Monto Total</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="resultado">


                                    </tbody>
                                </table>
                            </div>
                            <p class="text-end">Mostrando Empleados 1 al 10 de un total de 27</p>
                            <!---- navegacion de pag ------>
                            <div class="modal fade" id="detalle_reserva" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Detalle de Reserva</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive mt-2">
                                                <table class="table bg-white">
                                                    <thead class="bg-dark text-light">
                                                        <tr class="text-center">
                                                            <th>N°</th>
                                                            <th>Tipo de Habitacion</th>
                                                            <th>Número</th>
                                                            <th>Fecha Inicio</th>
                                                            <th>Fecha Fin</th>
                                                            <th>Dias</th>
                                                            <th>Precio/D</th>
                                                            <th>Precio</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="detalle">

                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editar_reserva" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Reserva</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-2" id="datosCliente">
                                                <h4 class="pt-4"><i class="far fa-address-card"></i> Información Cliente
                                                </h4>
                                                <div class="" role="alert" id="alerta_dni"> </div>
                                                <form class="col-md-4" id="form_cliente">
                                                    <label for="cli_dni" class="bmd-label-floating">DNI</label>
                                                    <div class="nh input-group ">
                                                        <input type="text" class="form-control"
                                                            placeholder="Ej. 74891596" id="cli_dni" name="cli_dni">
                                                        <button class="btn-buscar btn btn-dark" type="submit"
                                                            id="buscar"><i class="fas fa-search"></i></button>
                                                    </div>
                                                    <span class="text-danger" id="alerta-dni"></span>
                                                </form>
                                                <div class="col-md-4">
                                                    <label for="cli_nombre" class="bmd-label-floating">Nombre</label>
                                                    <input type="text" id="cli_nombre" class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="cli_apellido"
                                                        class="bmd-label-floating">Apellidos</label>
                                                    <input type="text" name="cli_apellido" id="cli_apellido"
                                                        class="form-control">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="cli_telefono"
                                                        class="bmd-label-floating">Teléfono</label>
                                                    <input type="text" name="cli_telefono_reg" id="cli_telefono"
                                                        class="form-control">

                                                </div>

                                                <div class="col-md-4">
                                                    <label for="cli_email" class="bmd-label-floating">Email</label>
                                                    <input type="email" name="cli_email" id="cli_email"
                                                        class="form-control">
                                                </div>
                                            </div>

                                            <form id="form_reserva" method='POST'>
                                                <div class="row g-2" id="detalleH">
                                                    <h4 class="pt-4"><i class="far fa-address-card"></i> Datos de
                                                        Alojamiento</h4>
                                                    <div class="col-md-12">
                                                        <label for="cant-hab">Número Habitaciones</label>
                                                        <div class="input-group">
                                                            <input type="text" id="cant-hab" class="form-control"
                                                                value="1" name="cant-hab" disabled>
                                                            <button class="btn-buscar btn btn-dark" id="agregarH"><i
                                                                    class="fa-solid fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col-md-4">
                                                            <label for="TipoHab1">Tipo habitación</label>
                                                            <select id="TipoHab1" class="form-select tipo-filtro" name="tipo[]">
                                                            </select>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="Hab1">Habitación</label>
                                                            <select id="Hab1" class="form-select" name="hab[]">
                                                                <option selected> Seleccione una opción </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="Num1">Noches</label>
                                                            <input type="text" id="Num1" class="form-control" disabled
                                                                readonly>
                                                        </div>
                                                        <div
                                                            class="col-md-1 d-flex align-items-end justify-content-center">
                                                            <button class="btn btn-dark puntero ocultar" type="button"
                                                                onclick="eliminar(this)"><i
                                                                    class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fechaI1">Fecha Ingreso</label>
                                                            <input type="date" id="fechaI1" class="form-control"
                                                                name="fechaI[]">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="fechaF1">Fecha Salida</label>
                                                            <input type="date" id="fechaF1" class="form-control"
                                                                name="fechaF[]">
                                                        </div>
                                                        <div class="col-md-3 input-costo">
                                                            <label for="costo1">Costo (S/.)</label>
                                                            <input placeholder="00,00" type="text" class="form-control"
                                                                id="costo1" disabled readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "include/script.php"?>
    <script src="js/reservas/reservar.js"></script>
    <script src="js/reservas/ListarReservas.js"></script>

</body>

</html>