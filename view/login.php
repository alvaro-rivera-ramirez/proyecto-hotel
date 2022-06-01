<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/styleLogin.css" />
    <link rel="shortcut icon" href="img/hotel.png" type="image/x-icon">
    <title>Hotel</title>
    <link rel="shortcut icon" href="Imagenes/hotel.png" type="image/x-icon">
  </head>

  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
        <!-- INICIO LOGIN -->
          <form action="registro.php" method="post" class="sign-in-form">
            <h2 class="title">HOTEL MONTEREAL</h2>            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input name="usuario" type="text" placeholder="Usuario" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input name="clave" type="password" placeholder="Contraseña" />
            </div>
            <input type="submit" value="Iniciar sesión" class="btn solid" />           
          </form>
        <!-- FIN DE LOGIN -->
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Bienvenido mi estimado</h3>
            <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident animi perferendis neque corrupti amet nulla reiciendis, 
              aspernatur sed delectus autem suscipit. Molestias ipsam aut, dolorum assumenda eaque in adipisci ad!
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Provident animi perferendis neque corrupti amet nulla reiciendis.
            </p>
          </div>
          <img src="img/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!--<script src="script.js"></script>-->
  </body>

</html>