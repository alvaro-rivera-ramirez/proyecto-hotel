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

            <!--------------CONTENIDO-------------->
            <div class="ps-2 pt-3 content-body">
                  <div class="content p-5 pt-1" >
                       <h3 class="pb-2">Reservar Habitación</h3>
                        <section>
                        <form class="row g-3">
                              <div class="col-md-4">
                                <label for="inputDNI" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="inputDNI">
                              </div>
                              <div class="col-md-8">
                                <label for="inputNombre" class="form-label">Nombre Completo</label>
                                <input type="text" class="form-control" id="inputNombre">
                                </div>
                               <div class="col-md-2">
                                <label for="inputNum" class="form-label">N° Noches</label>
                                <input type="text" class="form-control" id="inputNum">
                                </div>
                                 
                              <div class="col-md-5">
                                <label for="inputApellido" class="form-label">Fecha Ingreso</label>
                                <input type="date" class="form-control" id="inputApellido">
                              </div>
                              <div class="col-md-5">
                                <label for="inputAddress" class="form-label">Fecha Salida</label>
                                <input type="date" class="form-control" id="inputAddress" placeholder="Calle/avenida">
                              </div>
                              <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail">
                              </div>
                              <div class="col-md-3">
                                <label for="inputTelefono" class="form-label">Telefono/Celular</label>
                                <input type="text" class="form-control" id="inputTelefono">
                              </div>
                              
                              <div class="col-md-3">
                                <label for="inputState" class="form-label">Sexo</label>
                                <select id="inputState" class="form-select">
                                  <option selected>Hombre</option>
                                  <option >Mujer</option>
                                </select>
                              </div>
                              <!-----habitación---->
                              <div class="col-md-3 w-100">
                                <label for="inputNh" class="form-label">Número Habitaciones</label>
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="1" aria-label="Recipient's username" aria-describedby="button-addon2" id="inputNh">
                                  <button class="btn btn-outline-secondary" type="button" id="button-addon2">Agregar</button>
                                </div>
                              </div>
                              
                              <div class="col-md-6">
                                <label for="inputTipo" class="form-label">Tipo habitación</label>
                                <select id="inputTipo" class="form-select">
                                  <option selected>...</option>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <label for="inputHab" class="form-label">Habitación</label>
                                <select id="inputHab" class="form-select">
                                  <option selected>...</option>
                                </select>
                              </div>
                              
                              <div class="col-md-2 ">
                                <label for="inputCosto" class="form-label">Costo (S/.)</label>
                                <input placeholder="00,00" type="text" class="form-control" id="inputCosto" disabled readonly>
                              </div>
                              <!-----habitación---->
                              <div class="col-12">
                                  <div class="w-100 d-flex justify-content-end">
                                      <div class="row">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
                                        <div class="col-md">
                                            <input placeholder="S/. 00,00" type="text" class="form-control" id="inputCosto" disabled readonly>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-12 pt-4">
                               <div class="d-flex">
                                <div class="w-100 d-flex justify-content-end">
                                   <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Guardar
                                    </button>
                                    <!--- modal ----->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                            ¿Esta seguro de guardar?
                                          </div>
                                          <div class="modal-footer">
                                            <button type="submit" class="btn btn-success">Guardar</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <!--- modal ----->
                                    <button type="button" class="btn btn-danger ms-3">Cancelar</button>
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
</body>
</html>