<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="Imagenes/hotel.png" type="image/x-icon">
  <link href="css/botsstrap/bootstrap.min.css" rel="stylesheet">
  <link href="css/login.css" rel="stylesheet">
</head>

<body>
  <?php echo session("mensaje") ?>
  <div class="login-body">
    <div class="container">
      <div class="row d-flex justify-content-center">
        <div class="login-content col-12 col-sm-12 col-md-7 col-lg-7">
          <div class="login-form card">
            <div class="card-header">
              <h4>Login</h4>
            </div>
            <div class="card-body">
              <div class="d-flex justify-content-center mb-1">
                <div class="card-logo mb-1">
                  <img src="Imagenes/logoHotel.png" width="100%">
                </div>
              </div>
              <!-- action="" -->
              <!-- php echo base_url('login')  -->
              <form id="formLoginG" method="POST" action="<?= base_url('login') ?>">
                <div class="form-input">
                  <label for="exampleInputEmail1" class="form-label">Usuario</label>
                  <input type="text" id="exampleInputEmail1" class="invalidos" name="usuario">
                </div>
                <div class="form-input ">
                  <div class="d-flex justify-content-between ">
                    <label for="exampleInputPassword1" class="form-label">Contraseña</label>
                      <a href="#" class="login-recu" onclick="Forget()">Olvidate tu
                      contraseña? </a>

                  </div>

                  <input type="password" id="exampleInputPassword1" name="password">
                </div>

                <div class="login-button d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary">Ingresar</button>
                </div>
              </form>
              <div id="caja"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <h5 class="modal-title mb-4" id="exampleModalLabel">Recuperar tu cuenta</h5>
          <p> Ingresa tu correo electrónico para buscar tu cuenta.</p>
          <form action="" method="">
            <input class="modal-email" type="email" placeholder="Correo electronico">
            <div class="modal-button d-flex justify-content-end">
              <button type="submit" class="btn-res">Restablecer</button>
              <button type="button" class="btn-cas" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
    let mensaje = '<?= session("mensaje")?>';
    if (mensaje == '0') {
      let timerInterval
      Swal.fire({
        icon: 'error',
        title: 'Ocurrió un fallo, el usuario o contraseña ingresada no es válida',
        timer: 1000,
      })
    }
    if (mensaje == '1') {
      let timerInterval
      Swal.fire({
        icon: 'warning',
        title: 'COMPLETE TODOS LOS CAMPOS POR FAVOR',
        timer: 1000,
      })
    }
  </script>
  <script src="js/Login.js"></script> 
  <!-- <script src="js\Loginquery.js"></script> -->

  
</body>

</html>