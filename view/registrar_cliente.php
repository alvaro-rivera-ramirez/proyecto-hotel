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
                  <div class="content p-5" >
                       <h3 class="pb-4">Registrar Cliente</h3>
                        <section>
                        <form class="row g-3">
                              <div class="col-md-3">
                                <label for="inputDNI" class="form-label">DNI</label>
                                <input type="text" class="form-control" id="inputDNI">
                              </div>
                              <div class="col-md-4">
                                <label for="inputNombre" class="form-label">Nombre</label>
                                <input type="text" class="form-control" id="inputNombre">
                              </div>
                              <div class="col-md-5">
                                <label for="inputApellido" class="form-label">Apellido</label>
                                <input type="text" class="form-control" id="inputApellido">
                              </div>
                              <div class="col-12">
                                <label for="inputAddress" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="inputAddress" placeholder="Calle/avenida">
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
                                  <option selected>Mujer</option>
                                </select>
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