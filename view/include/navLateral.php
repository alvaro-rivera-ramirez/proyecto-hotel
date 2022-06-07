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
                <a href="home.php" class="d-block" ><i class="icon-home me-3"></i>Inicio</a>
                <a href="reserva_hab.php" class="d-block"><i class="icon-calendar me-3"></i>Reservar</a>
                <a href="registrar_cliente.php" class="d-block" ><i class="icon-user-add me-3"></i>Registrar Cliente</a>
                
                <div class="accordion accordion-flush" id="accordionFlushExample">
                      <div class="accordion-item">
                          <button class="" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            <i class="icon-clipboard me-3"></i>
                            Registros
                            <i class="icon-down-open-big despliegue"></i>
                          </button>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                          <div class="sub-menu">
                            <a href="registro_reservas.php" class="d-block">
                              <i class="fa-solid fa-bell-concierge"></i>
                              Reservas</a>
                              <a href="registro_cliente.php" class="d-block">
                              <i class="fa-solid fa-users"></i>
                              Clientes</a>
                              <a href="registro_emp.php" class="d-block">
                              <i class="fa-solid fa-users-gear"></i>
                              Empleados</a>
                              <a href="registro_hab.php" class="d-block">
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

     </div>