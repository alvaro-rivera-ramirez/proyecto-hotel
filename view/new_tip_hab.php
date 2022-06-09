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
                <div class="full-box page-header">
                    <h3 class="text-start">
                        <i class="fas fa-plus fa-fw"></i> &nbsp; AGREGAR TIPO DE HABITACION
                    </h3>
                </div>
            
                <div class="container-fluid">
                    <div class="container-nav">
                        <div class="box-nav"> <a class="active" href="#"><i class="fas fa-plus fa-fw"></i> AGREGAR TIPO DE HABITACION</a></div>
                        <div class="box-nav"> <a href="#"><i class="fas fa-clipboard-list fa-fw"></i> LISTA DE HABITACIONES</a> </div>
                        <div class="box-nav"> <a href="#"><i class="fas fa-search fa-fw"></i> BUSCAR HABITACION</a> </div>
                    </div>
                                
                </div>

                <div class="container-fluid">
                    <form action="" class="row g-3" autocomplete="off">
                        <fieldset>
                            <legend><i class="far fa-plus-square"></i> Información</legend>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="num_hab" class="bmd-label-floating">Numero</label>
                                            <input type="text" pattern="[0-9-]{1,27}" class="form-control" name="num_hab" id="num_hab" maxlength="4">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="precio_hab" class="bmd-label-floating">Precio</label>
                                            <input type="text" disabled="" class="form-control" name="precio_hab" id="precio_hab">
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <div class="form-group">
                                            <label for="tipo_hab" class="bmd-label-floating">Tipo Habitación</label>
                                            <select class="form-control" name="tipo_hab" id="tipo_hab">
                                                <option value="" selected="" disabled="">Seleccione una opción</option>
                                                <option value="Simple">Simple</option>
                                                <option value="Doble">Doble</option>
                                                <option value="Triple">Triple</option>
                                                <option value="Suit">Suit</option>
                                                <option value="Familiar">Familiar</option>
                                                <option value="Matrimonial">Matrimonial</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <p class="text-center" style="margin-top: 40px;">
                            <button type="reset" class="btn btn-info"><i class="fa-solid fa-brush"></i> LIMPIAR</button>
                            <button type="submit" class="btn btn-success">
                            <i class="fa-regular fa-floppy-disk"></i> GUARDAR</button>
                        </p>
                    </form>
                </div>
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>