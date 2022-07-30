<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?php include "include/link.php" ?>
    <style>
        .centrar {
            text-align: center;
            font-family: 'IBM Plex Sans';
            font-style: normal;
            font-weight: 600;
            font-size: 20px;
            color: #000000;

            margin: 20px;
            height: 75px;
            border: 2px;
            border-radius: 8px;
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
            box-sizing: border-box;
            
            width: 467px;
            height: 278px;
            border: 2px solid #C83D3D;
            border-radius: 8px;

            text-align: center;
            float:right;
            margin: 80px 50px;
            background: #FF4A4A;
            color: white;
            font-size: 21px;
        }
        .bolded{
            font-weight: bold;
        }
        .textoad{
            position: relative;
            width: 321px;
            height: 190px;
            font-family: 'IBM Plex Sans';
            font-style: normal;
            font-weight: 600;
            font-size: 34px;
            line-height: 31px;
            display: flex;
            align-items: center;
            text-align: center;

            color: #FFFFFF;
        }
        .btn-res{
            border: solid 1px #B38741;
            background: #B38741;
        }
        .btn-cas{
            border: solid 1px #940D05;
            background: #940D05;
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
                            <label for="exampleFormControlInput1" class="form-label"><span class="bolded"><font color="black">Contraseña  Actual</font></span></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="bolded"><font color="black">Nueva  Contraseña</font></span></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div> 
                        
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label"><span class="bolded"><font color="black">Repetir  Contraseña</font></span></label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                        </div>
                    </div>
            
                    
                        <div class="izquierda">
                            <span class="bolded"><br>IMPORTANTE<br></span>
                            <textoad>Se recomienda tener en<br>
                            cuenta usar una contraseña<br>
                            facil de recordar y dificil de<br>
                            descifrar para evitar posibles<br>
                            inconvenientes y/o posibles ataques<br>
                            maliciosos.</textoad>
                        </div> 
       
                       <div class="d">
                            <button class="btn btn-res" type="button" style="color:white;"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
                            <button class="btn btn-cas" type="button" style="color:white;"><i class="fa-solid fa-ban"></i>Cancelar</button>
                        </div>
            </div>

        </div>
   </div>

   <?php include "include/script.php"?>
</body>
</html>
