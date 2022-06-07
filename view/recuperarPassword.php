<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/styleLogin.css" />
    <title>Hotel</title>
    <link rel="shortcut icon" href="Imagenes/hotel.png" type="image/x-icon">
  </head>
  
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <!-- inicio -->
          <form action="registro.php" method="post" class="sign-in-form">
            <h2 class="title">RECUPERAR CONTRASEÑA</h2>            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="usuario" type="text" placeholder="Usuario" />
            </div>
            <div class="input-field">
              <i class="fas fa-at"></i>
              <input name="Correo electronico" type="text" placeholder="Correo electronico" />
            </div>
            <input type="submit" value="Enviar" class="btn solid"/>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Estimado Usuario</h3>
              <p>
              Recuerde que debe verificar la pertenencia de su cuenta, digitando su nombre de usuario y correo electronico. Posteriormente se le enviara un correo donde podra recuperar su contraseña.
              </p>
            </div>
            <img src="img/log.svg" class="image" alt="" />
          </div>
        </div>
    </div>
        
        <script
          src="https://kit.fontawesome.com/64d58efce2.js"
          crossorigin="anonymous"
        ></script>
</body>
</html>