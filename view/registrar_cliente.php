<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    
    <style>
    /*cliente */
.cli-content{
    margin-top: 35px;
}
.cli-content .cli-img{
    align-items: center;
}
.cli-content img{
    width: 250px;
    height: 250px;
    margin-bottom: 15px;
}
.cli-content form{
    margin-top: 0;
}
.cli-content h5{
    border-left: 3px solid #d3d3d3;
    padding: 7px 7px;
    margin-top: 0;
    margin-bottom: 0;
}
.cli-content form label{
    margin-bottom: 2px;
}
.cli-form-input i{
    border: 1px solid #d3d3d3;
    border-right: 0;
    align-items: center;
    text-align: center;
    padding: 3px;
    font-size: 22px;
    width: 40px;
    justify-content: center;
}
.cli-form-input input{
    border-radius: 0;
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
                       <h3 class="pb-2" style="margin-bottom: 2px;border-bottom: 1px solid #d3d3d3"><i class="icon-user-add me-1"></i>Registrar Cliente</h3>
                        <section class=" row cli-content">
                        <div class="col-md-4 d-flex justify-content-center cli-img">
                            <img class="d-flex" src="Imagenes/usuario-especialista.png">
                        </div>
                        <form class="row g-3 col-md-8">
                             <h5>Datos del cliente</h5>
                              <div class="col-md-6">
                                <label for="inputDNI" class="form-label">DNI</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-id-card"></i>
                                    <input type="text" class="form-control" id="inputDNI">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="inputNombre" class="form-label">Nombre</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-user"></i>
                                    <input type="text" class="form-control" id="inputNombre">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="inputApellidoP" class="form-label">Apellido Paterno</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-user"></i>
                                <input type="text" class="form-control" id="inputApellidoP">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="inputApellidoM" class="form-label">Apellido Materno</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-user"></i>
                                <input type="text" class="form-control" id="inputApellidoM">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="inputEmail" class="form-label">Email</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-envelope"></i>
                                <input type="email" class="form-control" id="inputEmail">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <label for="inputTelefono" class="form-label">Telefono/Celular</label>
                                <div class="d-flex cli-form-input">
                                    <i class="d-flex fa-solid fa-phone"></i>
                                <input type="text" class="form-control" id="inputTelefono">
                                </div>
                              </div>
                              <div class="col-12 pt-4">
                               <div class="d-flex">
                                <div class="w-100 d-flex justify-content-end">
                                   <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                      Guardar
                                    </button>
                                    <!--- modal de confirmación----->
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