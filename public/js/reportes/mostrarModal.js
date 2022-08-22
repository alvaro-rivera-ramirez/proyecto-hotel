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

const listarReservas =(id,fecha) =>{
    fetch('obtener_reservas', {
        method: 'POST',
        body: JSON.stringify({ id:id, fecha:fecha})
    }).then(response => response.json()).then( datos=> {
        console.log(id,fecha)
        let detalles = new bootstrap.Modal(document.getElementById('detalle_reserva'),{keyboard:false, backdrop:false});
        //console.log(datos)
        let detalle_r=document.getElementById('detalle');
        let lista='';
        for(let i=0;i<datos.length;i++){
            lista+=`<tr class="text-center"> <td>${datos[i].idReserva}</td><td>${datos[i].nombreU}</td><td>${datos[i].fecha}</td> <td>${datos[i].precioT}</td></tr>`
        }
        detalle_r.innerHTML=lista;
        detalles.show();
        document.getElementById('detalle_reserva').addEventListener('hidden.bs.modal', e => {
            detalle_r.innerHTML='';    
        })
    })
}
const listarReservasHab =(id,fecha) =>{
    fetch('obtener_reservas_hab', {
        method: 'POST',
        body: JSON.stringify({ id:id, fecha:fecha})
    }).then(response => response.json()).then( datos=> {
        let detalles = new bootstrap.Modal(document.getElementById('detalle_reserva'),{keyboard:false, backdrop:false});
        //console.log(datos)
        let detalle_r=document.getElementById('detalle');
        let lista='';
        for(let i=0;i<datos.length;i++){
            lista+=`<tr class="text-center"> <td>${datos[i].idReserva}</td><td>${datos[i].numero}</td><td>${datos[i].fecha}</td><td>${datos[i].fechaIni}</td><td>${datos[i].fechaFin}</td> <td>${datos[i].dias}</td><td>${datos[i].precio}</td></tr>`
        }
        detalle_r.innerHTML=lista;
        detalles.show();
        document.getElementById('detalle_reserva').addEventListener('hidden.bs.modal', e => {
            detalle_r.innerHTML='';    
        })
    })
}