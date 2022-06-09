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
  border: 2px solid black;
  margin: 20px;
  background: lightblue;
}
.cuadro{
    text-align: left;
    float:left;
    width: 450px;
    margin: 40px;
}
.d{
    text-align: center;
    clear: both;
}
.mb-3{
    margin: 40px;
}
.izquierda{
    text-align: center;
    width: 400px;
    float:right;
    border: 2px solid black;
    margin: 50px;
    background: violet;
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
                    </div>
                   
                    <div class="cuadro">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">contraseña Actual</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nueva contraseña</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div> 
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Repetir contraseña</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
            
                    
                        <div class="izquierda">
                            <h3>Se recomienda tener en cuenta usar una 
                             contraseña facil de recordar
                                 y dificil de descifrar 
                             para evitar posibles inconvenientes 
                             y/o posibles ataques maliciosos.</h3>
                        </div> 
       
                       <div class="d">
                            <button type="button" class="btn btn-info">Limpiar</button>
                            <button class="btn btn-success me-md-2" type="button">Guardar</button>
                            <button class="btn btn-danger" type="button">Cancelar</button>
                        </div>
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>
