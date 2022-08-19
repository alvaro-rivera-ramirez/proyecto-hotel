<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php include "include/link.php" ?>
    <script src="../html2pdf.js-master/dist/html2pdf.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="js/PDF.js"></script>

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
                                                aria-label="Search">
                                            <button class="btn-buscar btn btn-dark" type="submit"><i
                                                    class="fas fa-search"></i></button>
                                        </form>
                                    </div>
                                </div>

                            </div>


                            <!-- TABLA RESPONSIVE -->

                            <?php   ?>
                            <!-- ob_start(); -->

                            <div class="table-responsive mt-2" id="TablaHabitaciones">
                                <table class="table bg-white" >
                                    <thead class="bg-dark text-light" >
                                        <tr class="text-center">
                                            <th>N°</th>
                                            <th>Numero</th>
                                            <th>Tipo</th>
                                            <th>Precio</th>
                                            <th>Caracteristicas</th>
                                            <th>Estado</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach($habitacion as $habitaciones):?>
                                        <tr class="text-center">
                                            <td><?= $habitaciones['idHab'] ?></td>
                                            <td><?= $habitaciones['numero'] ?></td>
                                            <td><?= $habitaciones['tipo'] ?></td>
                                            <td><?= $habitaciones['precio'] ?></td>
                                            <td>TV con Cable, Cama de plaza y media, Baño Privado</td>
                                            <td><?= $habitaciones['estado'] ?></td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href="<?= base_url('editar_habitacion/'.$habitaciones['idHab']) ?>"
                                                    role="button">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <!-- <a id="delete" class="btn btn-danger" href="#"><i class="fa-solid fa-trash-can"></i>
                                            </a>   -->
                                                <button class="btn btn-danger"
                                                    onclick="Eliminar(<?= $habitaciones['idHab'] ?>)"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            </div>

                            <?php   ?> 
                            <!-- $html = ob_get_clean(); -->

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
    
    <script>
        

        
        function Eliminar(id) {

            console.log(id);
            Swal.fire({
                title: '¿Está seguro de eliminar?',
                text: "Está a punto de eliminar este registro",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirmar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('http://localhost/proyecto-hotel/public/eliminar_habitacion/' + id  , {
                            method: 'POST',
                            mode: 'no-cors',
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: id

                        }).then(res => res.json()).then(res => {
                        if (res['respuesta']) {
                            Swal.fire(
                                'ELIMINADO!',
                                'El registro fue eliminado exitosamente',
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
        }
    </script>
</body>

</html>