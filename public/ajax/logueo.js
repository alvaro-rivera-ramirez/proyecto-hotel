window.addEventListener('load',()=>{
    let button = document.getElementById('formLoginG');
    let usuario = document.getElementById('exampleInputEmail1');
    let password = document.getElementById('exampleInputPassword1');
    let alert = document.getElementById('alerta');

    function data(){ 
        let datos = new FormData();
        datos.append("usuario", usuario.value);
        datos.append("password", password.value);
        fetch('login',{
            method: 'POST',
            body: datos
        }).then(Response => Response.json())
        .then(({ success }) => {
            //console.log(success);
            if(success === 1){
                location.href = 'http://localhost/proyecto-hotel/public/inicio';    
                // console.log("verdad");
            }else{
                alerta();
                // console.log("falso");
            }
        });
    }

    function alerta(){
        alert.innerHTML = `contraseña incorrecta`;
    }

    button.addEventListener('submit',(e) =>{
        e.preventDefault();
        // vacio();
        data();
    });

});