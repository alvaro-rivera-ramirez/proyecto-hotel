const agregarTipoH=()=>{

    let boton_enviar = document.getElementById('new_tipohab');
    
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
            console.log(2)
            Swal.fire({
                icon: 'warning',
                title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS'
            })
        }else{
            Swal.fire({
                title: 'ESTA SEGURO DE REGISTRAR UNA NUEVO TIPO DE HABITACION?',
                text: "Está a punto de registrar un nuevo tipo de habitacion",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    let form_upd = document.getElementById('form_tipohab');
                    let data = new FormData(form_upd);
                    // let mensajes=document.querySelectorAll('.validacion');
                    // mensajes.forEach(function(item) {
                    //     if(!item.classList.contains('d-none')){
                    //         item.innerHTML='';
                    //         item.classList.add('d-none');
                    //     }
                    // });
                    fetch('guardar_tipohab', {
                        method: 'POST',
                        mode: 'no-cors',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: data
    
                    }).then(res => res.json()).then(res => {
                        if (res['respuesta']) {
                            Swal.fire(
                                'HABITACION REGISTRADA EXITOSAMENTE',
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

agregarTipoH();