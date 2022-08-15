
const nuevoDetalle = (detalleHab,cont,Jtipo) =>{
    let hab = document.createElement('div');
        hab.setAttribute('class', 'row g-2')
        hab.innerHTML = `<div class="col-md-4">
                                        
                                        <label for="TipoHab${cont}">Tipo habitación</label>
                                        <select id="TipoHab${cont}" class="form-select tipo-filtro" name="tipo[]">
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Hab${cont}">Habitación</label>
                                        <select id="Hab${cont}" class="form-select" name="hab[]">
                                        <option selected> Seleccione una opción </option>  
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Num${cont}">Noches</label>
                                        <input type="text" id="Num${cont}" class="form-control" disabled readonly>
                                    </div>      
                                    <div class="col-md-4">
                                        <label for="fechaI${cont}">Fecha Ingreso</label>
                                        <input type="date" id="fechaI${cont}" class="form-control" name="fechaI[]">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechaF${cont}">Fecha Salida</label>
                                        <input type="date" id="fechaF${cont}" class="form-control" name="fechaF[]">
                                    </div>
                                    <div class="col-md-3 input-costo">
                                        <label for="costo${cont}">Costo (S/.)</label>
                                        <input placeholder="00,00" type="text" class="form-control" id="costo${cont}" disabled
                                        readonly>
                                    </div>`
    
    detalleHab.appendChild(hab);
    //cont_hab.setAttribute('value', cont);
    mostrarTipoHab(Jtipo, 'idTipo', 'tipo', document.getElementById('TipoHab' + cont))
}

const editarReserva =async (dni,id,idEstadoR,idEstadoP) =>{
    let editar_r = new bootstrap.Modal(document.getElementById('editar_reserva'),{keyboard:false, backdrop:false});
    let idReserva=id;
    let idDetalles=[];
    let idCliente={};
    let detalleHab=document.getElementById('detalleH');
    let nombre=document.getElementById('cli_nombre');
    let apellido=document.getElementById('cli_apellido');
    let telefono=document.getElementById('cli_telefono');
    let email=document.getElementById('cli_email');
    let Jhabitacion;
    let Jtipos;
    idCliente={idC:id};
    await getHabitaciones().then((dato) =>{
        Jhabitacion=dato.hab;
        Jtipos=dato.tipos;
    });

    console.log(Jhabitacion)

    await fetch('buscar_dni', {
        method: 'POST',
        mode: 'no-cors',
        body: dni
    }).then(datos => datos.json()).then(datos => {
        console.log(datos);
        idCliente.idC=datos.cliente.idCliente;
        //nombre.setAttribute('value', datos.cliente.nombre);
        nombre.value=datos.cliente.nombre;
        apellido.value=datos.cliente.apellidoPaterno +
        " " + ((datos.cliente.apellidoMaterno) ? datos.cliente.apellidoMaterno : '');
        telefono.value=datos.cliente.telefono;
        email.value=(datos.cliente.email) ? datos.cliente.email : '';
        nombre.setAttribute('disabled', '');
        apellido.setAttribute('disabled', '');
        telefono.setAttribute('disabled', '');
        email.setAttribute('disabled', '');
        
    });
    
    let estadoR=document.querySelector('#estadoR').querySelector('option[value="'+idEstadoR+'"]');
    let estadoP=document.querySelector('#estadoP').querySelector('option[value="'+idEstadoP+'"]');
    estadoR.setAttribute('selected',true);
    estadoP.setAttribute('selected',true);

    await fetch('listar_detalle', {
        method: 'POST',
        body: JSON.stringify({ id:id, action: 'editar'})
    }).then(response => response.json()).then( datos=> {
        console.log(datos)
        document.getElementById('cant-hab').value=datos.length;
        Object.keys(datos).forEach(key => {
            let itemArray = {};
            itemArray.idHab = datos[key].idHab;
            itemArray.numero = datos[key].numero;
            itemArray.idTipo = datos[key].idTipo;
            Jhabitacion.push(itemArray);
        });
        let Jhabitaciones = Jhabitacion.filter((data, index, j) => 
            index === j.findIndex((t) => (t.idHab === data.idHab))
        )
        console.log(Jhabitaciones)
        for(let i=1;i<=datos.length;i++){
            nuevoDetalle(detalleHab,i,Jtipos);
            idDetalles.push(datos[i-1].idDetalle)
            //document.getElementById('idDetalle'+i).value=datos[i-1].idDetalle;
            let select=document.querySelector('#TipoHab'+i);
            let opcion=select.querySelector('option[value="'+datos[i-1].idTipo+'"]');
            opcion.setAttribute('selected',true);
            filtroHab(document.getElementById('TipoHab'+i),Jhabitaciones)
            select=document.querySelector('#Hab'+i);
            opcion=select.querySelector('option[value="'+datos[i-1].idHab+'"]');
            opcion.setAttribute('selected',true);
            console.log(document.getElementById('Hab'+i))
            //console.log(document.getElementById('TipoHab'+i))
            document.getElementById('fechaI'+i).setAttribute('value',datos[i-1].fechaIni)
            document.getElementById('fechaF'+i).setAttribute('value',datos[i-1].fechaFin)
            document.getElementById('Num'+i).setAttribute('value',datos[i-1].dias)
            document.getElementById('costo'+i).setAttribute('value',datos[i-1].precio)
        }    
        Jhabitacion=Jhabitaciones    
    })
    editar_r.show();

    detalleHab.addEventListener('change', (e) =>{
        if(e.target.classList.contains('tipo-filtro')){
            filtroHab(e.target,Jhabitacion);
        }
    })
    //console.log(selectHab)
    document.getElementById('buscar').addEventListener('click', e=>{
        e.preventDefault()
        buscarDNI(idCliente)
    });
    document.getElementById('editar_reserva').addEventListener('hidden.bs.modal', e => {
        document.getElementById('cli_dni').value='';
        nombre.setAttribute('value', '');
        apellido.setAttribute('value', '');
        telefono.setAttribute('value', '');
        email.setAttribute('value', '');
        document.getElementById('detalleH').innerHTML='';
        document.getElementById('cant-hab').setAttribute('value',0);
    })

    //actualizar reserva
    document.getElementById('actualizar_reserva').addEventListener('click', e => {
        
        estadoR=document.getElementById('estadoR')
        estadoP=document.getElementById('estadoP')
        console.log(estadoR.value,estadoP.value)
        if(estadoR.value==3){
            if(estadoP.value==2){
                Swal.fire({
                    title: '¿Estas seguro de finalizar la reserva?',
                    text: "Ya no podra realizar cambios en esta reserva",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Finalizar',
                    cancelButtonText: 'Cerrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('actualizar_reserva', {
                            method: 'POST',
                            mode: 'no-cors',
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: JSON.stringify({idReserva:id,idEstadoR:estadoR.value})
                        }).then(res => res.json()).then(res => {
                            if(res['resp']){
                                Swal.fire(
                                'Reserva Terminada!',
                                'Haz finalizado la reserva.',
                                'success'
                                ).then((value) =>{
                                    location.reload();
                                    }
                                )
                            }
                                
                        })
                    }
                })
            }else{
                Swal.fire(
                    'Error!',
                    'No puede finalizar la reserva si no a marcado como pagado',
                    'error'
                );
            }
        }else{
            if(estadoR.value==4){
                Swal.fire({
                    title: '¿Estas seguro de cancelar la reserva?',
                    text: "Ya no podra realizar cambios en esta reserva",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, cancelar',
                    cancelButtonText: 'Cerrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('actualizar_reserva', {
                            method: 'POST',
                            mode: 'no-cors',
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: JSON.stringify({idReserva:id,idEstadoR:estadoR.value})
                        }).then(res => res.json()).then(res => {
                            if(res['resp']){
                                Swal.fire(
                                'Cancelado!',
                                'Haz cancelado la reserva.',
                                'success'
                                ).then((value) =>{
                                    location.reload();
                                    }
                                )
                            }
                                
                        })
                    }
                })
            }else{
                Swal.fire({
                    title: '¿Estas seguro de actualizar la reserva?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Actualizar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form_r = document.getElementById('form_reserva');
                        let reserva = new FormData(form_r);
                        reserva.append("idReserva", idReserva);
                        reserva.append("idDetalle[]",idDetalles);
                        reserva.append("idCliente", idCliente.idC);
                        reserva.append("idEstadoR", estadoR.value);
                        reserva.append("idEstadoP", estadoP.value);
                        for (const value of reserva.values()) {
                           console.log(value);
                        }
                        fetch('actualizar_reserva', {
                            method: 'POST',
                            mode: 'no-cors',
                            headers: {
                                "Content-Type": "application/json",
                                "X-Requested-With": "XMLHttpRequest"
                            },
                            body: reserva
                        }).then(res => res.json()).then(res => {
                            if (res['resp']) {
                                Swal.fire(
                                    'Good job!',
                                    'Se actualizo la reserva correctamente',
                                    'success'
                                ).then((value) => {
                                    location.reload();
                                });
                            } else {
                                Swal.fire(
                                'Error!',
                                'Ocurrió un error, verifique que todos los campos sean correctos',
                                'error'
                                );
                                console.log(res.errors)
                            }
                        })
                    }
                })
            }
        }
    })

}    
