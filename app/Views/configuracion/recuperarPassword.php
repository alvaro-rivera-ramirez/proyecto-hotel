<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA.Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Recuperar contraseña</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anoymous"></script>
    <link rel="stylesheet" href="css/styleRecPass.css">
  </head>
  
  <body>
    <h1>RECUPERAR CONTRASEÑA</h1>

    <div class="container">
      <h2>Ingrese su nueva contraseña</h2>
      <form action="" class="form" id="form_pass">
        <div class="form__correo">
          <input type="password" name="pass1" id="pass1" placeholder="Ingrese contraseña" class="correo">
        </div>
        <div class="form__correo">
          <input type="password" name="pass2" id="pass2" placeholder="Vuelva a ingresar la contraseña" class="correo">
        </div>
        <div class="form__button">
          <a class="salir" href="">Iniciar Sesion</a>
          <button class="enviar" id="modificar">Modificar</button>
        </div>
      </form>
    </div>
</body>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let boton_modificar = document.getElementById('modificar');
    let val1 = document.getElementById('pass1');
    let val2 = document.getElementById('pass2');

    boton_modificar.addEventListener('click', e => {
        e.preventDefault();
        if (val1.value === '' || val1.value === null || val2.value === '' ||
          val2.value === null) {
          let timerInterval
          Swal.fire({
            icon: 'warning',
            title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS POR FAVOR',
            timer: 1500,
          })
        } else 
        {
            if(val1.value != val2.value)
            {
              Swal.fire
              ({
                icon: 'warning',
                title: 'LAS CONTRASEÑAS NO COINCIDEN',
                timer: 1500,
              })
            }
            else{
                console.log("Valida y fuciona");
                let form = document.getElementById('form_pass');
                let data = new FormData(form);

                fetch('login', {
                    method: 'POST',
                    mode: 'no-cors',
                    headers: {
                      "Content-Type": "application/json",
                      "X-Requested-With": "XMLHttpRequest"
                    },
                    body: data

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

    })
  </script>
</html>