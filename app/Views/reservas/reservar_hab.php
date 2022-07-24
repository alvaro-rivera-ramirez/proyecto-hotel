<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <style>
    .detail {
        padding: 8px 0px;
        margin: 0;
        justify-content: space-around;
    }

    .detail div {
        padding: 0px 4px;
    }

    .nh input:focus {
        box-shadow: none;
    }


    label {
        margin-top: 7px;
    }

    .btn-res {
        padding: 3px 12px !important;
        border: solid 1px #282727;
        color: #282727;
        width: 80% !important;
        margin-bottom: 2px;
        text-align: center !important;
    }

    .btn-res:hover {
        background: #282727;
        border: solid 1px #fff;
        color: white;
    }

    .btn-res:focus {
        box-shadow: none;
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
                            </form>
                            <div class="col-md-4">
                                <label for="cli_nombre" class="bmd-label-floating">Nombre</label>
                                <input type="text" id="cli_nombre" value="">
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cli_apellido" class="bmd-label-floating">Apellidos</label>
                                    <input type="text" name="cli_apellido" id="cli_apellido" maxlength="40">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cli_telefono" class="bmd-label-floating">Teléfono</label>
                                    <input type="text" name="cli_telefono_reg" id="cli_telefono" maxlength="15">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="cli_email" class="bmd-label-floating">Email</label>
                                    <input type="email" name="cli_email" id="cli_email">
                                </div>
                            </div>
                        </div>
                        
                        <form>
                            <div class="row g-2" id="detalle">
                                <h4 class="pt-4"><i class="far fa-address-card"></i> Datos de Alojamiento</h4>
                                <div class="col-md-12">
                                    <label for="cant-hab">Número Habitaciones</label>
                                    <div class="input-group">
                                        <input type="text" id="cant-hab"class="form-control" value="1">
                                        <button class="btn-buscar btn btn-dark" id="agregar"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="row g-2 clonar">
                                    <div class="col-md-4">
                                        <label for="inputTipo">Tipo habitación</label>
                                        <select id="inputTipo" class="form-select" name="tipo[]">
                                            <option selected>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputHab">Habitación</label>
                                        <select id="inputHab" class="form-select" name="hab[]">
                                            <option selected>...</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputNum">Noches</label>
                                        <input type="text" id="inputNum" class="form-control">
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end justify-content-center">
                                        <button class="btn btn-dark puntero ocultar" type="button" onclick="eliminar(this)"><i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                    </div>           
                                    <div class="col-md-4">
                                        <label for="inputApellido">Fecha Ingreso</label>
                                        <input type="date" id="inputApellido" class="form-control" name="fechaI[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputAddress">Fecha Salida</label>
                                        <input type="date" id="inputAddress" placeholder="Calle/avenida"
                                        class="form-control" name="fechaF[]">
                                    </div>
                                    <div class="col-md-3 input-costo">
                                        <label for="inputCosto">Costo (S/.)</label>
                                        <input placeholder="00,00" type="text" class="form-control" id="inputCosto" disabled
                                        readonly>
                                    </div>
                                </div>
                            </div>

                    


                            <!------botones----------->
                            <div class="col-12 pt-4">
                                <div class="d-flex">
                                    <div class="w-100 d-flex justify-content-end">
                                        <button type="button" class="btn-guardar btn btn-success" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Guardar
                                        </button>
                                        <!--- modal de confirmación----->
                                        <div class="m-confirmacion modal fade" tabindex="-1" id="exampleModal"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <h5 class="modal-title mb-2">Confirmación</h5>
                                                        <p class="mb-3"> ¿Estas seguro de guardar?</p>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="btn-guardar me-1">Guardar</button>
                                                            <button type="button" class="btn-cancelar"
                                                                data-bs-dismiss="modal">Cerrar</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--- modal ----->
                                    </div>
                                </div>
                            </div>

                        </form>
                    </section>
                </div>

            </div>
        </div>
    </div>
    <?php include "include/script.php"?>
    <script>
    let agregar = document.getElementById('agregar');
    let detalleHab = document.getElementById('detalle');
    const cont_hab=document.getElementById('cant-hab');
    let cont=1;
    agregar.addEventListener('click', e => {
        e.preventDefault();
        
        let clonado = document.querySelector('.clonar');
        let clon = clonado.cloneNode(true);
        detalleHab.appendChild(clon).classList.remove('clonar');
        cont_hab.setAttribute('value',++cont);
        
        let remover = detalleHab.lastChild.childNodes[7].querySelectorAll('button');
        remover[0].classList.remove('ocultar');
    });
    
    /*detalleHab.addEventListener('click',e=>{
        e.preventDefault();
        if(e.target.classList.contains('puntero')){
            let habitacion=e.target.parentNode.parentNode;
            detalleHab.removeChild(habitacion);
        }
    }); */
    const eliminar =(e) =>{
        let hab=e.parentNode.parentNode;
        detalleHab.removeChild(hab);
        cont_hab.setAttribute('value',--cont);
    }
    document.getElementById('buscar').addEventListener('click', e => {
        e.preventDefault();
        let form = document.getElementById('form_cliente');
        let dataCliente = new FormData(form);
        fetch('<?= base_url('/buscar_dni') ?>', {
            method: 'POST',
            mode: 'no-cors',
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: dataCliente
        }).then(datos => datos.json()).then(datosForm => {
            document.getElementById('cli_nombre').setAttribute('value', datosForm.nombre);
            document.getElementById('cli_apellido').setAttribute('value', datosForm.apellidoPaterno +
                " " + datosForm.apellidoMaterno);
            document.getElementById('cli_telefono').setAttribute('value', datosForm.telefono);
            document.getElementById('cli_email').setAttribute('value', datosForm.email);
            console.log(datosForm);

        })
    });

    </script>
</body>

</html>