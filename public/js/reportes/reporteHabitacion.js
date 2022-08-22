const reservasMesHabitacion = async(mes,anio) =>{
    const peticion=await fetch('cantidad_mes_habitacion',{
        method:'POST',
        mode:'no-cors',
        headers:{
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
        body: JSON.stringify({"mes":mes})
    })
    const datos=await peticion.json();
    return datos;
}
const agregarMes = (mesR) =>{
    let fecha = new Date();
    let mes = fecha.getMonth()+1;
    let anio = fecha.getFullYear();

    if(mes<10)
        mes='0'+mes;

    mesR.value=anio+'-'+mes;
}

const actualizarCardMes = (mesValor) =>{
    let fecha = new Date();
    let mes = fecha.getMonth()+1;
    let dia = fecha.getDate();
    let anio = fecha.getFullYear();
    
    if(dia<10)
        dia='0'+dia;
    if(mes<10)
        mes='0'+mes;

    let mesCard=document.getElementById('mesCard');
    mesAux=mesValor.substring(mesValor.length-1, mesValor.length);
    if(mesAux[0]=='0'){
        mesAux=mesAux[mesAux.length-1];
    }


    let fechaCard=document.getElementById('fechaCard');
    const meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    let numeroMes = parseInt(mesAux);
    if(!isNaN(numeroMes) && numeroMes >= 1  && numeroMes <= 12 ) {
        mesCard.innerHTML = meses[numeroMes - 1];
    }else{
        if(mes>= 1  && mes <= 12 ) {
            mesCard.innerHTML = meses[mes - 1];
        }
    }

    fechaCard.innerHTML=anio+"-"+mes+"-"+dia;

}

const actualizarCardHabitacion = async()=>{
    const peticion=await fetch('resumen-habitacion',{
        method:'GET',
        mode:'no-cors',
        headers:{
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
    })
    const datos=await peticion.json();
    tClientes.innerHTML=datos[0].cantidad;
    nClientes.innerHTML=datos[1].cantidad;
}
const listarReporte = (mes,dato) =>{
    fetch('habitaciones_reservas', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({"mes":mes,"dato":dato})
    }).then(response => response.json()).then( datos=> {
        console.log(datos)
        let lista='';
        for(let i=0;i<datos.length;i++){
            lista+=`<tr class="text-wrap"> <td>${datos[i].idHab}</td> <td>${datos[i].numero}</td> <td>${datos[i].tipo}</td> <td>${datos[i].fecha}</td><td> <button type="button" class="btn detalleR"><i class="fa-solid fa-circle-info"></i></button> </td> <td>${datos[i].racaudacionT}</td><td>${datos[i].cantidad}</td></tr>`      
        }
        resultado.innerHTML=lista;
    })
}

document.getElementById('buscar_reserva').addEventListener('click', e=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    listarReporte(mesR.value,dato);
})

const actualizarChart = async (myChart,mes,totalCard) =>{
    let reportes={};
    await reservasMes(mes).then((dato) =>{
        reportes=dato;
    });

    let dates=reportes.map(function(obj) {
        return obj.mes;
    });
    let cantidad=reportes.map(function(obj){
        return obj.cantidad;
    });

    //La data ingresada sera solo de 1 mes
    myChart.config.data.labels=dates;
    myChart.config.data.datasets[0].data=cantidad;

    //Aqui deberia visualizar solo 1 mes
    myChart.update();
    actualizarCardMes(mes)
    totalCard.innerHTML=reportes[0].cantidad;
    listarReporte(mes,'');
}
const reporteHabitacion = async() =>{
    let mesReporte=document.querySelector('#mesR');

    let totalCard=document.getElementById('reservasCard');
    let reportes={};
    agregarMes(mesReporte);
    actualizarCardMes(mesReporte.value);

    await reservasMes(mesR.value).then((dato) =>{
        reportes=dato;
    });
    
    totalCard.innerHTML=reportes[0].cantidad;
    let dates=reportes.map(function(obj) {
        return obj.mes;
    });
    let cantidad=reportes.map(function(obj){
        return obj.cantidad;
    });
    const data={
        labels: dates,
        datasets: [{
            data: cantidad,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }],

        labels: [
            'Red',
            'Yellow',
            'Blue',
            'Orange',
            'Purple',
            'Green'
        ]
    };
    
    const config={
        type: 'doughnut',
        data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Cantidad de Ganancia por Mes'
                }
            },
            
        }
    }
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx,
        config
        );
    listarReporte(mesR.value,'');
    mesReporte.addEventListener('change', e => {
        actualizarChart(myChart,e.target.value,totalCard)
    });
    
}
reporteHabitacion();

actualizarCardHabitacion();