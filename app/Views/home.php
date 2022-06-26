<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include_once "include/link.php" ?>
</head>
<body>
    
   <div class="d-flex">
        <?php include_once "include/navLateral.php"?>     
       
        <div class="w-100" style="background-color: #F1F3F5" id="contenido">
           <?php include_once "include/navBar.php"?>
             <!--------------CONTENIDO-------------->
            <div class="ps-2 pt-3 content-body">
                  <div class="contend-estados w-100 row row-cols-4-col row-cols-lg-5 row-cols-md-3 row-cols-sm-3 g-2">
                   
                    <div class="col">
                      <div class="p-3 border bg-libre">
                      <p class="text-center"><i class="fa-solid fa-bed me-2"></i>Disponible</p>
                      <p class="text-center"><?= $estado[0]['cantidad']?></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-reserva">
                      <p class="text-center"><i class="fa-solid fa-calendar-check me-2"></i>Reservado</p>
                      <p class="text-center"><?= $estado[1]['cantidad']?></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-ocupado">
                      <p class="text-center"><i class="fa-solid fa-cart-flatbed me-2"></i>Ocupado</p>
                      <p class="text-center"><?= $estado[2]['cantidad']?></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-clean">
                      <p class="text-center"><i class="fa-solid fa-bath me-2"></i>Limpieza</p>
                      <p class="text-center"><?= $estado[3]['cantidad']?></p>
                      </div>
                    </div>
                    <div class="col">
                      <div class="p-3 border bg-disabled">
                      <p class="text-center"><i class="fa-solid fa-bell-slash me-2"></i>Deshabilitado</p>
                      <p class="text-center"><?= $estado[4]['cantidad']?></p>
                      </div>
                    </div>
                  </div>
                   
                  <div class="content sec-hab" >
                        <section>
                        <div class="container">
                          <div class="row">
                              <div  class="hab row row-cols-2 row-cols-md-3 row-cols-lg-5 g-2 g-lg-3 col-lg-12">
                                <?php foreach($habitacion as $habitaciones):?>
                                    <div class="col">
                                    
                                    <?php switch($habitaciones['idEstado']):
                                         case 1:  ?>
                                            <div class="border bg-light d-block bg-libre">
                                        <?php break; ?>
                                        <?php case 2: ?>
                                            <div class="border bg-light d-block bg-reserva">
                                        <?php break;?>
                                        <?php case 3: ?>
                                            <div class="border bg-light d-block bg-ocupado">
                                        <?php break;?>
                                        <?php case 4: ?>
                                            <div class="border bg-light d-block bg-clean">
                                        <?php break;?>
                                        <?php case 5: ?>
                                            <div class="border bg-light d-block bg-disabled">
                                        <?php break;?>
                                    <?php endswitch;?>
                                            <a href="#">
                                            <mark><?= $habitaciones['numero'];?></mark>
                                            <p><?= $habitaciones['tipo_hab'];?></p>
                                            <img src="Imagenes/cama.png" width="40px">
                                            </a>
                                        </div>
                                    </div>

                                <?php endforeach;?>
                                  <!-- <div class="col">
                                      <div class="border bg-light d-block">
                                     
                                         <a href="#">
                                          <mark>100</mark>
                                          <p>Simple</p>
                                          <img src="Imagenes/cama.png" width="40px">
                                      </a>
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
    <?php include "include/script.php"?>
</body>
</html>