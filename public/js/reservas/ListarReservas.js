/* listar reserva
    el argumento dato puede ser vacio o tener un valor
    si dato = '' entonces muestra todas las reservas
    caso contrario muestra las reservas que coinciden con el dato
*/
const listarR = (dato) =>{
    fetch( 'listar_reserva', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: dato
    }).then(response => response.json()).then( datosR=> {
        pag(datosR,"ListarReservas");
    })
}

//buscar reserva por dni, nombre y apellidos del cliente
document.getElementById('buscar_r').addEventListener('click', e=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    console.log(dato)
    listarR(dato);
    resetpag();
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

listarR();
