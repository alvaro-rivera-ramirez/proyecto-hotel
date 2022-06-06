<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    <style>


    </style>
</head>
<body>
   <div class="d-flex">
        <?php include "include/navLateral.php"?>     
       
        <div class="w-100" style="background-color: #F1F3F5">
            <?php include "include/navBar.php"?>

            <div class="ps-2 pt-3 content-body">
                
                <!-- Contenido -->
                <div class="container overflow-hidden">
  <div class="row gy-5">
    <div class="col-6">
      <div class="p-3 border bg-info"><h3>Recuperacion de Contraseña</h3></div>
    </div>
                <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                 <label for="floatingInput">correo Electronico</label>
                </div>
                <div class="form-floating">
                <input type="telefono" class="form-control" id="floatingTelefono" placeholder="Password">
                <label for="floatingTelefono">numero de Telefono</label>
                </div>
                <button type="button" class="btn btn-primary">enviar codigo de verificacion</button>
                
</div>
                
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>