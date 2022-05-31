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
                        <li>
                        <a class="dropdown-item" href="#">
                        <i class="icon-user"></i>
                        Perfil</a>
                        </li>
                        
                        <li>
                        <a class="dropdown-item" href="#">
                        <i class="icon-key"></i>
                        Contraseña</a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                        <a class="dropdown-item" href="#">
                        <i class="icon-logout"></i>
                        Salir</a>
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
                
              </div>
            </nav>
            <!---->
            <!----->
             <!--------------CONTENIDO-------------->
            <div class="ps-2 pt-3 content-body">
                  <div class=" w-100 row row-cols-3-col row-cols-lg-5  g-2">
                   
                    <div class="col">
                      <div class="p-3 border bg-light">
                      <p class="text-center">Libres</p>
                      <p class="text-center">5</p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-light">
                      <p class="text-center">Reservado</p>
                      <p class="text-center">5</p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-light">
                      <p class="text-center">Ocupado</p>
                      <p class="text-center">4</p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-light">
                      <p class="text-center">Limpieza</p>
                      <p class="text-center">2</p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-light">
                      <p class="text-center">Deshabilitado</p>
                      <p class="text-center">1</p></div>
                    </div>
                  </div>
                   
                  <div class="content sec-hab" >
                        <section>
                        <div class="container">
                          <div class="row">
                              <div  class="hab row row-cols-2 row-cols-md-3 row-cols-lg-5 g-2 g-lg-3 col-lg-12">
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <div class="col">
                                      <div class="border bg-light d-block">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </div>
                                  </div>
                                  <!----->
                              </div>
                          </div>
                            
                        </div>
                      </section>  
                  </div>
                </div>
        </div>
   </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
</body>
</html>