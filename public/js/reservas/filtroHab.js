//Obtenemos JSON de las habitaciones disponibles
const getHabitaciones = async () => {
    const copia = await fetch( 'listar_hab_tipo' ,{
        method: 'POST',
    });
    const datos=await copia.json();

    return datos;
}

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
    
    //Filtramos el selector de habitaciones
    const filtroHab = (e,Jhabitacion) => {
        //console.log(e.target)
        let aux = e.getAttribute("id")
        let $habitacion = document.getElementById('Hab' + aux.charAt(aux.length - 1))
        let valor = e.value
        let habitacionFilter = Jhabitacion.filter(f => f.idTipo == valor)
        mostrarTipoHab(habitacionFilter, 'idHab', 'numero', $habitacion)
    };

    const eliminar = (e,detalleHab) => {
        let hab = e.parentNode.parentNode;
        console.log(hab)
        const cont_hab = document.getElementById('cant-hab');
        detalleHab.removeChild(hab);
        cont_hab.value-=1;
        return cont_hab.value;
    };