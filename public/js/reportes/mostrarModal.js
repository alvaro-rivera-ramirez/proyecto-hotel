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