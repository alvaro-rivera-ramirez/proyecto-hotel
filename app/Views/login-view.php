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
              <form id="formLoginG" method="POST" action="">
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
                  <button type="submit" class="btn btn-primary" id="ingresar">Ingresar</button>
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
  <script>
    let boton_enviar = document.getElementById('ingresar');
    let admin_clave = document.getElementById('exampleInputEmail1');
    let admin_usuario = document.getElementById('exampleInputPassword1');

    boton_enviar.addEventListener('click', e => {
      e.preventDefault();
      if (admin_clave.value === '' || admin_clave.value === null || admin_usuario.value === '' ||
        admin_usuario.value === null) {
        let timerInterval
        Swal.fire({
          icon: 'warning',
          title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
          timer: 1500,
        })
      } else {

        let form_upd = document.getElementById('formLoginG');
        let update = new FormData(form_upd);

        fetch('login', {
            method: 'POST',
            mode: 'no-cors',
            headers: {
              "Content-Type": "application/json",
              "X-Requested-With": "XMLHttpRequest"
            },
            body: update

          }).then(res => res.json()).then(res => {
          if (res['respuesta']) {            
            location.reload();            
          } else {
            Swal.fire(
              'Error!',
              res['mensaje'],
              'error'
            );
          }
        })
      }

    }
    )
  </script>
  <script src="js/Login.js"></script>

</body>

</html>