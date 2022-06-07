<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    <style>
       .centrar {
  text-align: center;
}


    </style>
</head>
<body>
   <div class="d-flex">
        <?php include "include/navLateral.php"?>     
       
        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-4 pt-3 content-body">
                
                <!-- Contenido -->
           
                    <div class="centrar">
                    <!-- titulo h1 -->
                    <h1>CAMBIAR CONTRASEÑA</h1>
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Importante!</h4>
                        <p>Se recomienda tener en cuenta usar una 
                        contraseña facil de recordar
                         y dificil de descifrar 
                        para evitar posibles inconvenientes 
                        y/o posibles ataques maliciosos..</p>
                         <hr>
                         <p class="mb-0">Asegurece de no comparttir con nadie su informacion personal.</p>
                    </div>
                   
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">contraseña actual</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                        
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Nueva contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div> 
                        
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Repetir contraseña</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                       <div class="izquierda">
                        <button type="button" class="btn btn-info">Limpiar</button>
                       </div>         
                       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-success me-md-2" type="button">Guardar</button>
                            <button class="btn btn-danger" type="button">Cancelar</button>
                        </div>

   
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>