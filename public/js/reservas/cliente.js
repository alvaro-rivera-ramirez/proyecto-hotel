
const buscarDNI =(id)=>{
    let form = document.getElementById('form_cliente');
    let dataCliente = new FormData(form);
        fetch('buscar_dni', {
            method: 'POST',
            mode: 'no-cors',
            headers: {
                "Content-Type": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            },
            body: dataCliente
        }).then(datos => datos.json()).then(datosForm => {
            if(datosForm.resp){
                if(datosForm.cliente === null){
                    document.getElementById('alerta-dni').innerHTML='No existe un cliente registrado con el dni';
                }else{
                    id.idC= datosForm.cliente.idCliente;
                    document.getElementById('cli_nombre').value=datosForm.cliente.nombre;
                    document.getElementById('cli_apellido').value=datosForm.cliente.apellidoPaterno +
                        " " + ((datosForm.cliente.apellidoMaterno) ? datosForm.cliente.apellidoMaterno : '');
                    document.getElementById('cli_telefono').value=datosForm.cliente.telefono;
                    document.getElementById('cli_email').value=(datosForm.cliente.email) ? datosForm.cliente.email : '';
                    document.getElementById('cli_nombre').setAttribute('disabled', '');
                    document.getElementById('cli_apellido').setAttribute('disabled', '');
                    document.getElementById('cli_telefono').setAttribute('disabled', '');
                    document.getElementById('cli_email').setAttribute('disabled', '');
                }   
            }else{
                console.log(datosForm.errors)
                document.getElementById('alerta-dni').innerHTML=datosForm.errors.cli_dni;
            }
    
    })
}