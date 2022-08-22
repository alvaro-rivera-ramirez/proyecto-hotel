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

            <!--------------CONTENIDO-------------->
            <div class="ps-2 pt-3 content-body">

                <div class="content p-5" style="background: white;">
                    <h3 class="pb-2">Reservar Habitación</h3>
                    <section>
                        <div class="row g-2" id="datosCliente">
                            <h4 class="pt-4"><i class="far fa-address-card"></i> Información Cliente</h4>
                            <form class="col-md-4" id="form_cliente" method='POST'>
                                <label for="cli_dni" class="bmd-label-floating">DNI</label>
                                <div class="nh input-group ">
                                    <input type="text" class="form-control" placeholder="Ej. 74891596" id="cli_dni"
                                        name="cli_dni">
                                    <button class="btn-buscar btn btn-dark" type="submit" id="buscar"><i
                                            class="fas fa-search"></i></button>
                                </div>
                                <span class="text-danger" id="alerta-dni"></span>
                            </form>
                            <div class="col-md-4">
                                <label for="cli_nombre" class="bmd-label-floating">Nombre</label>
                                <input type="text" id="cli_nombre" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="cli_apellido" class="bmd-label-floating">Apellidos</label>
                                <input type="text" name="cli_apellido" id="cli_apellido" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="cli_telefono" class="bmd-label-floating">Teléfono</label>
                                <input type="text" name="cli_telefono_reg" id="cli_telefono" class="form-control">

                            </div>

                            <div class="col-md-4">
                                <label for="cli_email" class="bmd-label-floating">Email</label>
                                <input type="email" name="cli_email" id="cli_email" class="form-control">
                            </div>
                        </div>

                        <form id="form_reserva" method='POST'>
                            <div class="row g-2">
                                <h4 class="pt-4"><i class="far fa-address-card"></i> Datos de Alojamiento</h4>
                                <div class="col-md-4">
                                    <label for="cant-hab">Número Habitaciones</label>
                                    <div class="input-group">
                                        <input type="text" id="cant-hab" class="form-control" value="1" name="cant-hab"
                                            disabled>
                                        <button class="btn-buscar btn btn-dark" id="agregar"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="estadoR">Estado de Reserva</label>
                                    <select id="estadoR" class="form-select" name="estadoR">
                                        <option selected disabled> Seleccione una opción </option>
                                        <option value="1"> En espera </option>
                                        <option value="2"> En reserva </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="estadoP">Estado de Pago</label>
                                    <select id="estadoP" class="form-select" name="estadoP">
                                        <option selected disabled> Seleccione una opción </option>
                                        <option value="1"> Pendiente </option>
                                        <option value="2"> Pagado </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row g-2" id="detalleH">
                                <div class="row g-2">
                                    <div class="col-md-4">
                                        <label for="TipoHab1">Tipo habitación</label>
                                        <select id="TipoHab1" class="form-select tipo-filtro" name="tipo[]">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Hab1">Habitación</label>
                                        <select id="Hab1" class="form-select" name="hab[]">
                                            
                                            <option selected> Seleccione una opción  </option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Num1">Noches</label>
                                        <input type="text" id="Num1" class="form-control" disabled readonly>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end justify-content-center">
                                        <button class="btn btn-dark ocultar eliminar_hab" type="button"><i
                                                class="fa-solid fa-trash-can"></i>
                                        </button>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechaI1">Fecha Ingreso</label>
                                        <input type="date" id="fechaI1" class="form-control" name="fechaI[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechaF1">Fecha Salida</label>
                                        <input type="date" id="fechaF1" class="form-control" name="fechaF[]">
                                    </div>
                                    <div class="col-md-3 input-costo">
                                        <label for="costo1">Costo (S/.)</label>
                                        <input placeholder="00,00" type="text" class="form-control" id="costo1" disabled
                                            readonly>
                                    </div>
                                </div>
                            </div>




                            <!------botones----------->
                            <div class="col-12 pt-4">
                                <div class="w-100 d-flex justify-content-end">
                                    <button type="button" class="btn-guardar btn btn-success" id="enviar_reserva">
                                        Guardar
                                    </button>
                                </div>
                            </div>

                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <?php include "include/script.php"?>
    <script src="<?= base_url('js/reservas/cliente.js') ?>"></script>
    <script src="<?= base_url('js/reservas/filtroHab.js') ?>"></script>
    <script src="<?= base_url('js/reservas/reservar.js') ?>"></script>

    <!-- <script src="js/reservas/cliente.js"></script>
    <script src="js/reservas/filtroHab.js"></script>
    <script src="js/reservas/reservar.js"></script> -->
    <!-- <script>

    let $tipo = document.getElementById('TipoHab1');
    let boton_enviar = document.getElementById('enviar_reserva');
    let id_cliente = '';
    let cont = 1;

    //Mostrar el select TipoHabitacion y Habitacion
    const mostrarTipoHab = (datosJson, id, atributo, opcion) => {
        let elementos = '<option selected> Seleccione una opción </option>'
        opcion.innerHTML = ''
        let tam = Object.keys(datosJson).length;
        for (let i = 0; i < datosJson.length; i++) {
            elementos += '<option value="' + datosJson[i][id] + '">' + datosJson[i][atributo] + '</option>'
        }
        opcion.innerHTML = elementos
    }

    mostrarTipoHab(Jtipo, 'idTipo', 'tipo', $tipo)

    //Filtramos el selector de habitaciones
    const filtroHab = (e) => {
        console.log(e)
        let aux = e.getAttribute("id")
        let $habitacion = document.getElementById('Hab' + aux.charAt(aux.length - 1))
        let valor = e.value
        let habitacionFilter = Jhabitacion.filter(f => f.idTipo == valor)
        mostrarTipoHab(habitacionFilter, 'idHab', 'numero', $habitacion)
    };

    boton_enviar.addEventListener('click', e => {
        e.preventDefault();
        if (id_cliente != '') {
            Swal.fire({
                title: '¿Estas seguro de registrar la reserva?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form_r = document.getElementById('form_reserva');
                    let form_c = document.getElementById('form_cliente');
                    let reserva = new FormData(form_r);
                    reserva.append("idCliente", id_cliente);
                    reserva.append("cant", cont);
                    for (const value of reserva.values()) {
                        console.log(value);
                    }
                    fetch('guardar_reserva', {
                        method: 'POST',
                        mode: 'no-cors',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: reserva
                    }).then(res => res.json()).then(res => {
                        if (res['respuesta']) {
                            Swal.fire(
                                'Good job!',
                                res['mensaje'],
                                'success'
                            ).then((value) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                res['mensaje'],
                                'error'
                            );
                        }
                    })
                }
            })
        } else {
            let alerta = document.getElementById('alerta_dni')
            alerta.setAttribute('class', 'alert alert-danger');
            alerta.innerHTML = 'Debe colocar el dni del cliente';
        }
    })
    </script>
    <script>
    let agregar = document.getElementById('agregar');
    let detalleHab = document.getElementById('detalle');
    const cont_hab = document.getElementById('cant-hab');
    //let cont = 1;
    agregar.addEventListener('click', e => {
        e.preventDefault();
        cont++;
        let hab = document.createElement('div');
        hab.setAttribute('class', 'row g-2')
        hab.innerHTML = `<div class="col-md-4">
                                        <label for="TipoHab${cont}">Tipo habitación</label>
                                        <select id="TipoHab${cont}" class="form-select" name="tipo[]" onchange="filtroHab(this)">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Hab${cont}">Habitación</label>
                                        <select id="Hab${cont}" class="form-select" name="hab[]">
                                        <option selected> Seleccione una opción </option>  
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Num${cont}">Noches</label>
                                        <input type="text" id="Num${cont}" class="form-control" disabled readonly>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end justify-content-center">
                                        <button class="btn btn-dark puntero" type="button" onclick="eliminar(this)"><i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                    </div>           
                                    <div class="col-md-4">
                                        <label for="fechaI${cont}">Fecha Ingreso</label>
                                        <input type="date" id="fechaI${cont}" class="form-control" name="fechaI[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechaF${cont}">Fecha Salida</label>
                                        <input type="date" id="fechaF${cont}" class="form-control" name="fechaF[]">
                                    </div>
                                    <div class="col-md-3 input-costo">
                                        <label for="costo${cont}">Costo (S/.)</label>
                                        <input placeholder="00,00" type="text" class="form-control" id="costo${cont}" disabled
                                        readonly>
                                    </div>`
        detalleHab.appendChild(hab)
        cont_hab.setAttribute('value', cont);
        mostrarTipoHab(Jtipo, 'idTipo', 'tipo', document.getElementById('TipoHab' + cont))
    });

    //Eliminar una habitacion
    const eliminar = (e) => {
        let hab = e.parentNode.parentNode;
        detalleHab.removeChild(hab);
        cont_hab.setAttribute('value', --cont);
    };


    document.getElementById('buscar').addEventListener('click', e => {
        e.preventDefault();
        let form = document.getElementById('form_cliente');
        let dataCliente = new FormData(form);
        fetch('buscar_dni', {
            method: 'POST',
            mode: 'no-cors',
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: dataCliente
        }).then(datos => datos.json()).then(datosForm => {
            id_cliente = datosForm.cliente.idCliente;
            document.getElementById('cli_nombre').setAttribute('value', datosForm.cliente.nombre);
            document.getElementById('cli_apellido').setAttribute('value', datosForm.cliente.apellidoPaterno +
                " " + ((datosForm.cliente.apellidoMaterno) ? datosForm.cliente.apellidoMaterno : ''));
            document.getElementById('cli_telefono').setAttribute('value', datosForm.cliente.telefono);
            document.getElementById('cli_email').setAttribute('value', (datosForm.cliente.email) ? datosForm.cliente.email:'');
            document.getElementById('cli_nombre').setAttribute('disabled', '');
            document.getElementById('cli_apellido').setAttribute('disabled', '');
            document.getElementById('cli_telefono').setAttribute('disabled', '');
            document.getElementById('cli_email').setAttribute('disabled', '');
            console.log(datosForm);

        })
    })
    </script> -->
</body>

</html>