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
        console.log(datosR)
        let lista='';
        for(let i=0;i<datosR.length;i++){
            lista+='<tr class="text-center"> <td>'+datosR[i].idReserva+'</td> <td>'+datosR[i].dni+'</td> <td>'+datosR[i].nombreC+'</td> <td>'+datosR[i].nombreU+'</td> <td>'+datosR[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+datosR[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+datosR[i].precioT+'</td> <td>Pagado</td> <td> <a class="btn btn-success" onclick="editarReserva('+datosR[i].dni+','+datosR[i].idReserva+')"role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'       
        }
        resultado.innerHTML=lista;
    })
}

//buscar reserva por dni, nombre y apellidos del cliente
document.getElementById('buscar_r').addEventListener('click', e=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    console.log(dato)
    listarR(dato);
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
                                    <div class="col-md-1 d-flex align-items-end justify-content-center">
                                        <button class="btn btn-dark puntero" type="button" onclick="eliminar(this)"><i class="fa-solid fa-trash-can"></i>
                                                    </button>
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

const getHabitaciones = async () => {
    const copia = await fetch( 'listar_hab_tipo' ,{
        method: 'POST',
    });
    const datos=await copia.json();

    return datos;
}


const editarReserva =async (dni,id) =>{
    let editar_r = new bootstrap.Modal(document.getElementById('editar_reserva'),{keyboard:false, backdrop:false});
    /*let detalle_r=document.getElementById('detalle');
    detalle_r.innerHTML=datos; */
    let nombre=document.getElementById('cli_nombre');
    let apellido=document.getElementById('cli_apellido');
    let telefono=document.getElementById('cli_telefono');
    let email=document.getElementById('cli_email');
    let Jhabitacion;
    let Jtipos;
    
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
        nombre.setAttribute('value', datos.cliente.nombre);
        apellido.setAttribute('value', datos.cliente.apellidoPaterno +
        " " + ((datos.cliente.apellidoMaterno) ? datos.cliente.apellidoMaterno : ''));
        telefono.setAttribute('value', datos.cliente.telefono);
        email.setAttribute('value', ((datos.cliente.email) ? datos.cliente.email : ''));
        nombre.setAttribute('disabled', '');
        apellido.setAttribute('disabled', '');
        telefono.setAttribute('disabled', '');
        email.setAttribute('disabled', '');
        
    });
    
    await fetch('listar_detalle', {
        method: 'POST',
        body: JSON.stringify({ id:id, action: 'editar'})
    }).then(response => response.json()).then( datos=> {
        console.log(datos)
        document.getElementById('cant-hab').setAttribute('value', datos.length);
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
            if(i>1){
                nuevoDetalle(document.getElementById('detalleH'),i,Jtipos);
            }else{
                mostrarTipoHab(Jtipos, 'idTipo', 'tipo', document.getElementById('TipoHab1'))
                //console.log(document.getElementById('TipoHab1'))
            }
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
    let selectHab=document.querySelectorAll('select.tipo-filtro');

    selectHab.forEach((select) => {
        select.addEventListener('change', e =>{
            filtroHab(select,Jhabitacion)
        })
    })
    console.log(selectHab)
    document.getElementById('editar_reserva').addEventListener('hidden.bs.modal', e => {
        document.getElementById('cli_dni').setAttribute('value', '');
        nombre.setAttribute('value', '');
        apellido.setAttribute('value', '');
        telefono.setAttribute('value', '');
        email.setAttribute('value', '');
    })
}

