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
                                    <div class="box-nav"> <a href="<?= base_url('demo-pdf') ?>" target="_blank"><i
                                                class="fa-solid fa-print"></i> IMPRIMIR</a></div>
                                    <div class="box-nav">
                                        <form class="d-flex" id="form_busca_reserva">
                                            <input class="input-buscar me-2" type="search" placeholder="Buscar"
                                                aria-label="text" id="dato_buscar">
                                            <button class="btn-buscar btn btn-dark" type="submit" id="buscar_r"><i
                                                    class="fas fa-search"></i></button>
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
                                            <th>Registrado por</th>
                                            <th>Fecha</th>
                                            <th>Detalles</th>
                                            <th>Monto Total</th>
                                            <th>Estado de Reserva</th>
                                            <th>Estado</th>
                                            <th>Ver</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">


                                    </tbody>
                                </table>
                            </div>
                            <p class="text-end">Mostrando Empleados 1 al 10 de un total de 27</p>

                            <?php include "../app/Views/pagination/view_pag.php"?>
                            
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
                                            <div class="row g-2">
                                                <h4 class="pt-4"><i class="far fa-address-card"></i> Datos de
                                                    Alojamiento</h4>
                                                <div class="col-md-12">
                                                    <label for="cant-hab">Número Habitaciones</label>
                                                    <div class="input-group">
                                                        <input type="text" id="cant-hab" class="form-control" value="0"
                                                            name="cant-hab" disabled>
                                                        <button class="btn-buscar btn btn-dark" id="agregarH"
                                                            disabled><i class="fa-solid fa-plus"></i></button>
                                                    </div>
                                                </div>
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        <label for="estadoR">Estado de Reserva</label>
                                                        <select id="estadoR" class="form-select" name="estadoR">
                                                            <!-- <option selected disabled> Seleccione una opción </option> -->
                                                            <option value="1"> En espera </option>
                                                            <option value="2"> En reserva </option>
                                                            <option value="3"> Finalizado </option>
                                                            <option value="4"> Cancelado </option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="estadoP">Estado de Pago</label>
                                                        <select id="estadoP" class="form-select" name="estadoP">
                                                            <!-- <option selected> Seleccione una opción </option> -->
                                                            <option value="1"> Pendiente </option>
                                                            <option value="2"> Pagado </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <form id="form_reserva" class="row g-2" method='POST'>
                                                <div class="row g-2" id="detalleH">

                                                </div>
                                            </form>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary"
                                                id="actualizar_reserva">Actualizar</button>
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
    <script src="js/reservas/pdfReserva.js"></script>
    <script src="js/reservas/eliminarReserva.js"></script>
    <script src="js/reservas/ListarReservas.js"></script>
    <script src="js/reservas/filtroHab.js"></script>
    <script src="js/reservas/cliente.js"></script>
    <script src="js/reservas/editarReserva.js"></script>

</body>

</html>