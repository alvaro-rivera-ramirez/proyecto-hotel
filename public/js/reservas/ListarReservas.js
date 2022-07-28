const listarR = () =>{
    fetch( 'listar_reserva', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        }
    }).then(response => response.json()).then( datosR=> {
        console.log(datosR.length)
        let lista='';
        for(let i=0;i<datosR.length;i++){
            lista+='<tr class="text-center"> <td>'+datosR[i].idReserva+'</td> <td>'+datosR[i].dni+'</td> <td>'+datosR[i].nombreC+'</td> <td>'+datosR[i].nombreU+'</td> <td>'+datosR[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+datosR[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+datosR[i].precioT+'</td> <td>Pagado</td> <td> <a class="btn btn-success" onclick="editarReserva('+datosR[i].dni+')"role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'       
        }
        resultado.innerHTML=lista;
    })
}

const listarDetalle =(id) =>{
    fetch('listar_detalle', {
        method: 'POST',
        body: id
    }).then(response => response.text()).then( datos=> {
        let detalles = new bootstrap.Modal(document.getElementById('detalle_reserva'),{keyboard:false, backdrop:false});
        let detalle_r=document.getElementById('detalle');
        detalle_r.innerHTML=datos;
        detalles.show();
        document.getElementById('detalle_reserva').addEventListener('hidden.bs.modal', e => {
            detalle_r.innerHTML='';    
        })
    })
}

listarR();
let id_cliente='';
const editarReserva =(dni) =>{
    let editar_r = new bootstrap.Modal(document.getElementById('editar_reserva'),{keyboard:false, backdrop:false});
    /*let detalle_r=document.getElementById('detalle');
    detalle_r.innerHTML=datos; */
    fetch('buscar_dni', {
        method: 'POST',
        mode: 'no-cors',
        body: dni
    }).then(datos => datos.json()).then(datos => {
        //id_cliente = datos.idCliente;
            document.getElementById('cli_nombre').setAttribute('value', datos.cliente.nombre);
            document.getElementById('cli_apellido').setAttribute('value', datos.cliente.apellidoPaterno +
                " " + ((datos.cliente.apellidoMaterno) ? datos.cliente.apellidoMaterno : ''));
            document.getElementById('cli_telefono').setAttribute('value', datos.cliente.telefono);
            document.getElementById('cli_email').setAttribute('value', ((datos.cliente.email) ? datos.cliente.email : ''));
            document.getElementById('cli_nombre').setAttribute('disabled', '');
            document.getElementById('cli_apellido').setAttribute('disabled', '');
            document.getElementById('cli_telefono').setAttribute('disabled', '');
            document.getElementById('cli_email').setAttribute('disabled', '');
            console.log(datos);
        
        
    });
    editar_r.show();
    

    document.getElementById('editar_reserva').addEventListener('hidden.bs.modal', e => {
        document.getElementById('cli_dni').setAttribute('value', '');
        document.getElementById('cli_nombre').setAttribute('value', '');
        document.getElementById('cli_apellido').setAttribute('value', '');
        document.getElementById('cli_telefono').setAttribute('value', '');
        document.getElementById('cli_email').setAttribute('value', '');
    })
}

