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
        justify-content:space-around;
    }

    .detail div {
        padding: 0px 4px;
    }

    .nh input:focus {
        box-shadow: none;
    }

    .input-costo input {
        padding: 4px 12px !important;
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

    .puntero{
        cursor:pointer;
    }

    .ocultar{
        display:none;
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
                        <form class="row g-3 mt-2">
                            <div class="col-md-4">
                                <legend><i class="far fa-address-card"></i> Información Cliente</legend>
                                <!-----------DNI --------------->
                                <div class="col-md-12 w-100">
                                   
                                    <label for="cli_dni">DNI</label>
                                    <div class="nh input-group ">
                                        <input type="text" class="form-control" placeholder="74891596" id="cli_dni">
                                        <button class="btn-buscar btn btn-dark" type="submit"><i
                                                class="fas fa-search"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="cli_nombre" class="bmd-label-floating">Nombre</label>
                                    <input type="text" id="cli_nombre">
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cli_apellidom_reg" class="bmd-label-floating">Apellidos</label>
                                        <input type="text" name="cli_apellidom_reg" id="cli_apellidom_reg"
                                            maxlength="40">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="cli_telefono" class="bmd-label-floating">Teléfono</label>
                                        <input type="text" name="cli_telefono_reg" id="cli_telefono" maxlength="15">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <div class="d-flex cli-form-input">
                                        <input type="email" id="inputEmail">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <legend><i class="far fa-address-card"></i> Datos de Alojamiento</legend>
                                <div class="row g-2">
                                    <div class="col-md-2">
                                        <label for="inputNum">Noches</label>
                                        <input type="text" id="inputNum">
                                    </div>

                                    <div class="col-md-5">
                                        <label for="inputApellido">Fecha Ingreso</label>
                                        <input type="date" id="inputApellido">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputAddress">Fecha Salida</label>
                                        <input type="date" id="inputAddress" placeholder="Calle/avenida">
                                    </div>

                                    <!-----habitación---->
                                    <div class="col-md-12 w-100">
                                        <label for="inputNh">Número Habitaciones</label>
                                        <div class="nh input-group">
                                            <input type="text" class="form-control" placeholder="1" id="inputNh">
                                            <button class="btn-buscar btn btn-dark" id="agregar"><i
                                                    class="fa-solid fa-plus"></i></button>
                                        </div>
                                    </div>

                                    <!---------detalle de habitación------->
                                    <div class="detail row" id="detalle">
                                        <div class="row clonar">   
                                            <div class="col-md-4">
                                                <label for="inputTipo">Tipo habitación</label>
                                                <select id="inputTipo">
                                                    <option selected>...</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="inputHab">Habitación</label>
                                                <select id="inputHab">
                                                    <option selected>...</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-3 input-costo">
                                                <label for="inputCosto">Costo (S/.)</label>
                                                <input placeholder="00,00" type="text" class="form-control" id="inputCosto"
                                                disabled readonly>
                                            </div>
                                            <div class="col-md-1 d-flex align-items-end justify-content-center">
                                                <button class="btn-res btn btn-outline-secondary puntero ocultar" type="button"
                                                    id="borrar">-</button>
                                            </div>
                                        </div>
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
    <script>
        let agregar=document.getElementById('agregar');
        let detalleHab=document.getElementById('detalle');

        agregar.addEventListener('click', e=>{
            e.preventDefault();

            let clonado=document.querySelector('.clonar');
            let clon=clonado.cloneNode(true);

            detalleHab.appendChild(clon).classList.remove('clonar');

            /*let remover=detalleHab.lastChild.childNodes[0].querySelectorAll('button');
            remover[1].classList.remove('ocultar');*/

            let remover=detalleHab.lastChild.childNodes[7].querySelectorAll('button');
            remover[0].classList.remove('ocultar');
            console.log(remover);
        });
    </script>
    <?php include "include/script.php"?>
</body>

</html>