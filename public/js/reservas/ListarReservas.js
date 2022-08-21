/* listar reserva
    el argumento dato puede ser vacio o tener un valor
    si dato = '' entonces muestra todas las reservas
    caso contrario muestra las reservas que coinciden con el dato
*/
const listarR = async(dato) =>{
    await fetch('listar_reserva', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: dato
    }).then(response => response.json()).then( datosR=> {
        console.log(datosR)
        let filas='';
        for(let i=0;i<datosR.length;i++){
            filas+='<tr class="text-center"> <td>'+datosR[i].idReserva+'</td> <td>'+datosR[i].dni+'</td> <td>'+datosR[i].nombreC+'</td> <td>'+datosR[i].nombreU+'</td> <td>'+datosR[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+datosR[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+datosR[i].precioT+'</td> <td>'+datosR[i].estadoReserva+'</td><td>'+datosR[i].estadoPago+'</td> <td> <a type="button" class="btn btn-warning gpdf" href="#"><i class="fa-solid fa-file-pdf gpdf"></i></a></td><td> <a class="btn btn-success" onclick="editarReserva('+datosR[i].dni+','+datosR[i].idReserva+','+datosR[i].idEstadoR+','+datosR[i].idEstadoP+')" role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'       
        }
        lista.innerHTML=filas;
    })
}

//buscar reserva por dni, nombre y apellidos del cliente
document.getElementById('buscar_r').addEventListener('click', async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    console.log(dato)
    await listarR(dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
buttonGenerator();
})


const listarDetalle =(id) =>{
    
    fetch('listar_detalle', {
        method: 'POST',
        body: JSON.stringify({ id:id, action: 'listar'})
    }).then(response => response.text()).then( datos=> {
        let detalles = new bootstrap.Modal(document.getElementById('detalle_reserva'),{keyboard:false, backdrop:false});
        //console.log(datos)
        let detalle_r=document.getElementById('detalle');
        detalle_r.innerHTML=datos;
        detalles.show();
        document.getElementById('detalle_reserva').addEventListener('hidden.bs.modal', e => {
            detalle_r.innerHTML='';    
        })
    })
}

const listaReserva = async() =>{
    await listarR('');
    paginacion();
    buttonGenerator();
}

listaReserva();
