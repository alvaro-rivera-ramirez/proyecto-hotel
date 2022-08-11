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
                                    <div class="box-nav"> <a href="<?= base_url('nuevo_cliente')?>"><i class="fas fa-plus fa-fw"></i> AGREGAR CLIENTE</a></div>
                                    <div class="box-nav"> <a class="active" href="#"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE CLIENTES</a> </div>
                                    <div class="box-nav"> <a href="http://localhost:8080/demo-pdf"><i class="fa-solid fa-print"></i> IMPRIMIR</a></div>
                                    <div class="box-nav">
                                        <form class="d-flex" id="form" method="POST" action="<?= base_url('lista-clientes')?>">
                                        <input class="input-buscar me-2" type="text" id="query" name="query" placeholder="Buscar" aria-label="text">
                                        <button class="btn-buscar btn btn-dark" type="submit"><i class="fas fa-search"></i></button>
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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Editar</th>
                                        <th>Eliminar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                
                            

                                <?php foreach($cliente as $clientes):?>

                                    <tr class="text-center">
                                            <td><?= $clientes['idCliente'] ?></td>
                                            <td><?= $clientes['dni'] ?></td>
                                            <td><?= $clientes['nombre'] ?></td>
                                            <td><?= $clientes['apellidoPaterno'] ?></td>
                                            <td><?= $clientes['apellidoMaterno'] ?></td>
                                            <td><?= $clientes['telefono'] ?></td>
                                            <td><?= $clientes['email'] ?></td>
                                            <td>
                                                <a class="btn btn-success"
                                                    href="<?= base_url('editar_cliente/'.$clientes['idCliente'])?>"
                                                    role="button">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger"
                                                    onclick="Eliminar(<?= $clientes['idCliente']?>)"><i
                                                        class="fa-solid fa-trash-can"></i></button>
                                            </td>
                                        </tr>
                                <?php endforeach;?>  


                                    
                                </tbody>
                            </table>
                        </div>
                            <p class="text-end">Mostrando Empleados 1 al 10 de un total de 27</p>
                            
                            <?php include "../app/Views/pagination/view_pag.php"?>
                            
                            
                        </section>  
                  </div>
                      
                      <!----->
                </div>
                  
            </div>
        </div>
   </div>

   <?php include "include/script.php"?>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function Eliminar(idCliente) {

            console.log(idCliente);
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
                    fetch('http://localhost/proyecto-hotel/public/eliminar_cliente/' + idCliente  , {
                            method: 'POST',
                            mode: 'no-cors',
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: idCliente

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