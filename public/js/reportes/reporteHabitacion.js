const imprimir =(e)=>{
    let enlace=e;
    enlace.setAttribute('href','http://localhost/proyecto-hotel/public/imprimirpdfHab?dato='+dato_buscar.value+'&fecha='+mesR.value);
}

const gananciaTiposHab = async(mes) =>{
    const peticion=await fetch('ganancia_tipohab',{
        method:'POST',
        mode:'no-cors',
        headers:{
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
        body: mes
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
    mesAux=mesValor.substring(mesValor.length-2, mesValor.length);
    console.log(mes)
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

const listarReporte = async(mes,dato) =>{
    await fetch('habitaciones_reservas', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({"mes":mes,"dato":dato})
    }).then(response => response.json()).then( datos=> {
        console.log(datos)
        let filas='';
        for(let i=0;i<datos.length;i++){
            filas+=`<tr class="text-center"> <td>${datos[i].idHab}</td> <td>${datos[i].numero}</td> <td>${datos[i].tipo}</td> <td>${datos[i].fecha}</td><td> <button type="button" class="btn detalleR" onclick="listarReservasHab(${datos[i].idHab},'${datos[i].fecha}')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>${datos[i].Total}</td><td>${datos[i].cantidad}</td></tr>`      
        }
        lista.innerHTML=filas;
    })
}

document.getElementById('buscar_hab').addEventListener('click',async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    await listarReporte(mesR.value,dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
})
//Actualizar grafico de barras
const actualizarChart = async (myChart,mes,totalCard) =>{
    let reportes={};

    await gananciaTiposHab(mesR.value).then((dato) =>{
        reportes=dato;
    });
    console.log(reportes)

    let dates=reportes.map(function(obj) {
        return obj.tipo;
    });
    let cantidad=reportes.map(function(obj){
        return obj.ganancia;
    });

    let montoT=0;

    for(let can of cantidad){
        montoT+=parseFloat(can);
    }
   totalCard.innerHTML=montoT;

    myChart.config.data.labels=dates;
    myChart.config.data.datasets[0].data=cantidad;

    myChart.update();
    actualizarCardMes(mes)
    await listarReporte(mes,'');
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
}
const reporteHabitaciones = async() =>{
    let mesReporte=document.querySelector('#mesR');

    let totalCard=document.getElementById('totalCard');
    let reportes={};
    agregarMes(mesReporte);
    actualizarCardMes(mesReporte.value);

    await gananciaTiposHab(mesR.value).then((dato) =>{
        reportes=dato;
    });
    console.log(reportes)
    let dates=reportes.map(function(obj) {
        return obj.tipo;
    });
    let cantidad=reportes.map(function(obj){
        return obj.ganancia;
    });
    console.log(cantidad)
    let montoT=0;

    for(let can of cantidad){
        montoT+=parseFloat(can);
    }
   totalCard.innerHTML=montoT;
    const data={
        labels: dates,
        datasets: [{
            label: 'S/. Ganancia',
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
        }]
    };
    
    const config={
        type: 'bar',
        data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: '(S/.) Ganancias por Tipo de Habitacion'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    }
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx,
        config
        );
    await listarReporte(mesR.value,'');
    paginacion();
    buttonGenerator();
    mesReporte.addEventListener('change', e => {
        actualizarChart(myChart,e.target.value,totalCard)
    });
    
}
reporteHabitaciones();
// actualizarCardCliente();