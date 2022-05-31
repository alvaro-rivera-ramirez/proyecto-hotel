<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="css/botsstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/icon/fontello.css" rel="stylesheet">
    <link href="css/fontawesome/css/all.min.css" rel="stylesheet">
</head>
<body>
   <div class="d-flex">
       <div id="sidebar-container">
            
            <!---- ofcanvas--->
        <div class="offcanvas offcanvas-start canvas-menu" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
         <div class="logo align-items-center bg-primary">
               <img src="Imagenes/usuario.png">
                <p class="text-center text-light font-weight-bold">Administrador</p>
            </div>
            <div class="menu">
               <div class="modulos">
                   <h4>Módulos</h4>
               </div>
                <!--------------navegación-------->
                <a href="#" class="d-block" ><i class="icon-home me-3"></i>Inicio</a>
                <a href="#" class="d-block"><i class="icon-calendar me-3"></i>Reservar</a>
                <a href="#" class="d-block" ><i class="icon-user-add me-3"></i>Registrar Cliente</a>
                
                <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                          <button class="" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="icon-clipboard me-3"></i>
                            Registros
                            <i class="icon-down-open-big despliegue"></i>
                          </button>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="sub-menu">
                            <a href="#" class="d-block">
                              <i class="fa-solid fa-bell-concierge"></i>
                              Reservas</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-users"></i>
                              Clientes</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-users-gear"></i>
                              Empleados</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-bed"></i>
                              Habitaciones</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-tag"></i>
                              Tipo de Habitacion</a>
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                          <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                           <i class="icon-chart-bar me-3"></i> Reportes
                           <i class="icon-down-open-big despliegue"></i>
                          </button>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                          <div class="sub-menu">
                            
                             <a href="#" class="d-block">
                              <i class="fa-solid fa-calendar-day"></i>
                                Dia</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-calendar-days"></i>
                              Mes</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-users"></i>
                              Clientes</a>
                              <a href="#" class="d-block">
                              <i class="fa-solid fa-hotel"></i>
                              Habitaciones</a>
                            </div>
                        </div>
                      </div>
                      <div class="accordion-item">
                          <button class="" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            <i class=" icon-tools me-3"></i>Configuración
                            <i class="icon-down-open-big despliegue"></i>
                          </button>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                          <div class="sub-menu">
                              
                              <a href="#" class="d-block">
                              <i class="icon-user"></i>
                                Perfil</a>
                              <a href="#" class="d-block">
                              <i class="icon-key"></i>
                               Contraseña</a>
                          </div>
                        </div>
                      </div>
                    </div>
                <a href="#" class="d-block"><i class="icon-logout me-3"></i>Salir</a>
            </div>
        </div>

        <!----------------->
        </div>
        
       
        <div class="w-100" style="background-color: #F1F3F5">
           <!---- navbar ----->
            <nav class="navbar navbar-dark bg-dark navbar-expand-lg bg-primary pe-2">
              <div class="container-fluid">
               <!--- canvas trigger --->
               <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" >
                  
                  <span class="navbar-toggler-icon"></span>
                </button>

               <!------------------------>
                <a class=" text-light navbar-brand" href="#">Hotel Montereal</a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    
                    <li class="nav-item dropdown">
                      <a class="  text-light nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                       <img src="Imagenes/usuario.png" width="30px" class="me-2">
                        Dario Gomez
                      </a>
                      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configuración</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
            <!---->
            <!----->
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
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>