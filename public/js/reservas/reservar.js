

const agregarHab = (detalleHab,cont,Jtipo) => {
    let hab = document.createElement('div');
        hab.setAttribute('class', 'row g-2')
        hab.innerHTML = `<div class="col-md-4">
                                        <label for="TipoHab${cont}">Tipo habitación</label>
                                        <select id="TipoHab${cont}" class="form-select tipo-filtro" name="tipo[]" class="validar" require>
                                        </select>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="Hab${cont}">Habitación</label>
                                        <select id="Hab${cont}" class="form-select" name="hab[]" class="validar" require>
                                        <option selected> Seleccione una opción </option>  
                                        </select>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="Num${cont}">Noches</label>
                                        <input type="text" id="Num${cont}" class="form-control" disabled readonly class="validar" require>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>      
                                    <div class="col-md-auto d-flex align-items-end justify-content-center">
                                    <button class="btn btn-dark eliminar_hab" type="button"><i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    </div>  
                                    <div class="col-md-4">
                                        <label for="fechaI${cont}">Fecha Ingreso</label>
                                        <input type="date" id="fechaI${cont}" class="form-control" name="fechaI[]" class="validar" require>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechaF${cont}">Fecha Salida</label>
                                        <input type="date" id="fechaF${cont}" class="form-control" name="fechaF[]" class="validar" require>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>
                                    <div class="col-md-3 input-costo">
                                        <label for="costo${cont}">Costo (S/.)</label>
                                        <input placeholder="00,00" type="text" class="form-control" id="costo${cont}" disabled
                                        readonly class="validar" require>
                                        <p class="d-none text-danger validacion"></p>
                                    </div>`
    
    detalleHab.appendChild(hab);
    //cont_hab.setAttribute('value', cont);
    mostrarTipoHab(Jtipo, 'idTipo', 'tipo', document.getElementById('TipoHab' + cont))
}

const agregarFecha = (fechaI,fechaF) =>{
    let fecha = new Date();
    let mes = fecha.getMonth()+1;
    let dia = fecha.getDate();
    let anio = fecha.getFullYear();
    if(dia<10)
        dia='0'+dia;
    if(mes<10)
    mes='0'+mes
  fechaI.value=anio+"-"+mes+"-"+dia;
  fechaF.value=anio+"-"+mes+"-"+dia;
}
const reservar = async() =>{
    let Jhabitacion;
    let Jtipos;
    let cont=1;
    let idCliente={};
    idCliente.idC='';
    let detalleHab=document.getElementById('detalleH');
    let agregar = document.getElementById('agregar');
    const cont_hab = document.getElementById('cant-hab');
    let boton_enviar = document.getElementById('enviar_reserva')
    await getHabitaciones().then((dato) =>{
        Jhabitacion=dato.hab;
        Jtipos=dato.tipos;
    });
    console.log(Jhabitacion,Jtipos);

    agregarFecha(document.getElementById('fechaI1'),document.getElementById('fechaF1'));
    document.getElementById('buscar').addEventListener('click', e=>{
        e.preventDefault()
        buscarDNI(idCliente)
    });
    mostrarTipoHab(Jtipos, 'idTipo', 'tipo', document.getElementById('TipoHab' + cont))
    //-----------
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
        results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
    
    let idtipo=getParameterByName('idTipo');
    if(idtipo){
        let selecttipo=document.querySelector('#TipoHab1');
        let opcionT=selecttipo.querySelector('option[value="'+idtipo+'"]');
        opcionT.setAttribute('selected', true);

        filtroHab(selecttipo,Jhabitacion);
        let idH=getParameterByName('id');
        let selecthab=document.querySelector('#Hab1');
        let opcion=selecthab.querySelector('option[value="'+idH+'"]');
        opcion.setAttribute('selected',true);
        console.log("idtipo");
    }
    //tipo
    //-----------
    agregar.addEventListener('click',e =>{
        e.preventDefault();
        agregarHab(detalleHab,++cont,Jtipos);
        agregarFecha(document.getElementById('fechaI'+cont),document.getElementById('fechaF'+cont))
        cont_hab.value=cont;
    })

    detalleHab.addEventListener('change', (e) =>{
        if(e.target.classList.contains('tipo-filtro')){
            filtroHab(e.target,Jhabitacion);
        }
    })

    

    detalleHab.addEventListener('click', (e) =>{
        if(e.target.classList.contains('eliminar_hab')){
            console.log(e.target)
            cont=eliminar(e.target,detalleHab);
        }
    })

    

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
        let (idCliente.idC)=false
        inputs.forEach(function(item) {
            let div=item.parentNode;
            let msg=div.children[(div.children.length)-1]
            if(!item.value){
                console.log(item.value)
                msg.innerHTML='Complete este campo';
                msg.classList.remove('d-none');
                (idCliente.idC)=true;
            }
            //else{
            //     msg.innerHTML='';
            //     msg.classList.add('d-none');
            //     vacio=false;
            // }
        });
        if(idCliente.idC){
            console.log(2)
            Swal.fire({
                icon: 'warning',
                title: 'COMPLETE TODOS LOS CAMPOS REQUERIDOS'
            })
        }else{
            Swal.fire({
                title: '¿Estas seguro de registrar la reserva?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form_r = document.getElementById('form_reserva');
                    let reserva = new FormData(form_r);
                    reserva.append("idCliente", idCliente.idC);
                    reserva.append("cant", cont);
                    for (const value of reserva.values()) {
                        console.log(value);
                    }
                    fetch('guardar_reserva', {
                        method: 'POST',
                        mode: 'no-cors',
                        headers: {
                            "Content-Type": "application/json",
                            "X-Requested-With": "XMLHttpRequest"
                        },
                        body: reserva
                    }).then(res => res.json()).then(res => {
                        if (res['respuesta']) {
                            Swal.fire(
                                'RESERVA HECHA EXITOSAMENTE!',
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
        } // else {
        //     let alerta = document.getElementById('alerta-dni')
        //     alerta.innerHTML = 'Debe colocar el dni del cliente';
        // }
    })
}
reservar();
