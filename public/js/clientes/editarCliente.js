const editarCliente = () =>{
    console.log(9)
    let boton_enviar = document.getElementById('act_cliente');
    boton_enviar.addEventListener('click', e => {
        e.preventDefault();
        let mensajes=document.querySelectorAll('.validacion');
        mensajes.forEach(function(item) {
            if(!item.classList.contains('d-none')){
                item.innerHTML='';
                item.classList.add('d-none');
            }
        });
        let inputs=document.querySelectorAll('.validar')
        let vacio=false
        inputs.forEach(function(item) {
            let div=item.parentNode;
            let msg=div.children[(div.children.length)-1]
            if(!item.value){
                console.log(item.value)
                msg.innerHTML='Complete este campo';
                msg.classList.remove('d-none');
                vacio=true;
            }
        });
        
        if(vacio){
            Swal.fire({
                icon: 'warning',
                title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS'
            })
        }else {
            Swal.fire({
                title: '¿Estás seguro que desea actualizar este usuario?',
                text: "Está a punto de actualizar este usuario",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if(result.isConfirmed){
                    let form_upd = document.getElementById('upd_form');
                    let update = new FormData(form_upd);

                    fetch('http://localhost/proyecto-hotel/public/actualizar_cliente', {
                        method: 'POST',
                        mode: 'no-cors',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: update   
                    }).then(res => res.json()).then(res => {
                        console.log(res);
                        console.log("prueb")
                        if (res['respuesta']) {
                            Swal.fire(
                            'Cliente actualizado!',
                            '',
                            'success'
                            ).then((value) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Revisa que los campos sean correctos!',
                            })
                            let errores=res['errors'];
                            console.log(errores)
                            console.log(Object.keys(errores).length)
                            console.log(document.querySelectorAll('.validacion'))
                            Object.keys(errores).forEach(key => {
                                let input=document.getElementById(key);
                                let div=input.parentNode;
                                let msg=div.children[(div.children.length)-1]
                                msg.innerHTML=errores[key];
                                msg.classList.remove('d-none');
                                //console.log(errores[key])
                            });
                        }
                    })
                }
            })
        }
    })  
}

editarCliente();
