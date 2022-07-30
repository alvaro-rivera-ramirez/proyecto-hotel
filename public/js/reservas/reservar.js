
document.getElementById('buscar').addEventListener('click', e => {
    e.preventDefault();
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
        //console.log(datosForm)
        if(datosForm.resp){
            if(datosForm.cliente === null){
                document.getElementById('alerta-dni').innerHTML='No existe un cliente registrado con el dni';
            }else{
                id_cliente = datosForm.idCliente;
                document.getElementById('cli_nombre').setAttribute('value', datosForm.cliente.nombre);
                document.getElementById('cli_apellido').setAttribute('value', datosForm.cliente.apellidoPaterno +
                    " " + ((datosForm.cliente.apellidoMaterno) ? datosForm.cliente.apellidoMaterno : ''));
                document.getElementById('cli_telefono').setAttribute('value', datosForm.cliente.telefono);
                document.getElementById('cli_email').setAttribute('value', ((datosForm.cliente.email) ? datosForm.cliente.email : ''));
                document.getElementById('cli_nombre').setAttribute('disabled', '');
                document.getElementById('cli_apellido').setAttribute('disabled', '');
                document.getElementById('cli_telefono').setAttribute('disabled', '');
                document.getElementById('cli_email').setAttribute('disabled', '');
            }   
        }else{
            document.getElementById('alerta-dni').innerHTML=datosForm.errors.cli_dni;
        }
        

    })
})


//let Jhabitacion=new Object();
/*let Jhabitacion = $habitaciones;
let Jtipo = $tipos;
let $tipo = document.getElementById('TipoHab1');
let boton_enviar = document.getElementById('enviar_reserva');
let id_cliente = '';
let cont = 1; */
    
    //Mostrar el select TipoHabitacion y Habitacion
    const mostrarTipoHab = (datosJson, id, atributo, opcion) => {
        let elementos = '<option selected> Seleccione una opción </option>'
        opcion.innerHTML = ''
        let tam = Object.keys(datosJson).length;
        for (let i = 0; i < datosJson.length; i++) {
            elementos += '<option value="' + datosJson[i][id] + '">' + datosJson[i][atributo] + '</option>'
        }
        opcion.innerHTML = elementos
    }
    
    //mostrarTipoHab(Jtipo, 'idTipo', 'tipo', $tipo)
    //Filtramos el selector de habitaciones
    const filtroHab = (e,Jhabitacion) => {
        //console.log(e.target)
        let aux = e.getAttribute("id")
        let $habitacion = document.getElementById('Hab' + aux.charAt(aux.length - 1))
        let valor = e.value
        let habitacionFilter = Jhabitacion.filter(f => f.idTipo == valor)
        mostrarTipoHab(habitacionFilter, 'idHab', 'numero', $habitacion)
    };

    /*boton_enviar.addEventListener('click', e => {
        e.preventDefault();
        if (id_cliente != '') {
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
                    let form_c = document.getElementById('form_cliente');
                    let reserva = new FormData(form_r);
                    reserva.append("idCliente", id_cliente);
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
                                'Good job!',
                                res['mensaje'],
                                'success'
                            ).then((value) => {
                                location.reload();
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                res['mensaje'],
                                'error'
                            );
                        }
                    })
                }
            })
        } else {
            let alerta = document.getElementById('alerta_dni')
            alerta.setAttribute('class', 'alert alert-danger');
            alerta.innerHTML = 'Debe colocar el dni del cliente';
        }
    })*/
let agregar = document.getElementById('agregarH');
let detalleHab = document.getElementById('detalleH');
const cont_hab = document.getElementById('cant-hab');
let cont = 1;
    agregar.addEventListener('click', e => {
        e.preventDefault();
        cont++;
        let hab = document.createElement('div');
        hab.setAttribute('class', 'row g-2')
        hab.innerHTML = `<div class="col-md-4">
                                        <label for="TipoHab${cont}">Tipo habitación</label>
                                        <select id="TipoHab${cont}" class="form-select" name="tipo[]" onchange="filtroHab(this)">
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
        detalleHab.appendChild(hab)
        cont_hab.setAttribute('value', cont);
        mostrarTipoHab(Jtipo, 'idTipo', 'tipo', document.getElementById('TipoHab' + cont))
    });

    //Eliminar una habitacion
const eliminar = (e) => {
    let hab = e.parentNode.parentNode;
    detalleHab.removeChild(hab);
    cont_hab.setAttribute('value', --cont);
};

    