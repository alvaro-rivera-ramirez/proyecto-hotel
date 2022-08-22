const gananciaDia = async(fecha) =>{
    const peticion=await fetch('ganancia_diario',{
        method:'POST',
        mode:'no-cors',
        headers:{
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest",
        },
        body: fecha
    })
    const datos=await peticion.json();

    return datos;
}
const agregarFecha = (fechaR) =>{
    let fecha = new Date();
    let mes = fecha.getMonth()+1;
    let dia = fecha.getDate();
    let anio = fecha.getFullYear();
    if(dia<10)
        dia='0'+dia;
    if(mes<10)
    mes='0'+mes
    fechaR.value=anio+"-"+mes+"-"+dia;
}

const listarReporte = async(fecha,dato) =>{
    await fetch('reservas_dia', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: JSON.stringify({"fecha":fecha,"dato":dato})
    }).then(response => response.json()).then( datos=> {
        let filas='';
        for(let i=0;i<datos.length;i++){
            filas+=`<tr class="text-wrap"> <td>${datos[i].idReserva}</td> <td>${datos[i].dni}</td> <td>${datos[i].nombreC}</td> <td>${datos[i].fecha}</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle(${datos[i].idReserva})"><i class="fa-solid fa-circle-info"></i></button> </td> <td>${datos[i].precioT}</td></tr>`      
        }
        lista.innerHTML=filas;
    })
}

document.getElementById('buscar_reserva').addEventListener('click', async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('dato_buscar').value;
    await listarReporte(fechaR.value,dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
})

const actualizarChart = async (myChart,fecha,fechaCard,totalCard) =>{
    let reportes={};
    await gananciaDia(fecha).then((dato) =>{
        reportes=dato;
    });

    let dates=reportes.map(function(obj) {
        return obj.fecha;
    });
    let ganancias=reportes.map(function(obj){
        return obj.ganancia;
    });

    myChart.config.data.labels=dates;
    myChart.config.data.datasets[0].data=ganancias;

    myChart.update();
    fechaCard.innerHTML=fecha;
    totalCard.innerHTML=reportes[4].ganancia;
    await listarReporte(fecha,'');
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
}
const reporteDiario = async() =>{
    let fechaReporte=document.getElementById('fechaR');
    let fechaCard=document.getElementById('fecha');
    let totalCard=document.getElementById('gTotal');
    let reportes={};
    agregarFecha(fechaReporte);
    fechaCard.innerHTML=fechaReporte.value;
    await gananciaDia(fechaReporte.value).then((dato) =>{
        reportes=dato;
    });
    
    totalCard.innerHTML=reportes[4].ganancia;
    let dates=reportes.map(function(obj) {
        return obj.fecha;
    });
    let ganancias=reportes.map(function(obj){
        return obj.ganancia;
    });
    const data={
        labels: dates,
        datasets: [{
            label: 'S/. Ganancias',
            data: ganancias,
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
                    text: '(S/.) Ganancias por Día'
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
    await listarReporte(fechaReporte.value,'');
    paginacion();
    buttonGenerator();
    fechaReporte.addEventListener('change', e => {
        actualizarChart(myChart,e.target.value,fechaCard,totalCard)
    });
    
}
reporteDiario();
