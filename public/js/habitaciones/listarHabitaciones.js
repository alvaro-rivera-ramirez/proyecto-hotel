const listarH = async(dato)=>{
    await fetch('listar_habitaciones', {
        method: 'POST',
        mode: 'no-cors',
        headers: {
            "Content-Type": "application/json",
            "X-Requested-With": "XMLHttpRequest"
        },
        body: dato
    }).then(response => response.json()).then( datos=> {
        console.log(datos)
        let filas='';
        for(let i=0;i<datos.length;i++){
            filas+=`<tr class="text-center"> <td>${datos[i].idHab}</td> <td>${datos[i].numero}</td> <td>${datos[i].tipo}</td> <td>${datos[i].precio}</td> <td>${datos[i].estado}</td> <td> <a class="btn btn-success" href="http://localhost/proyecto-hotel/public/editar_habitacion/${datos[i].idHab}"> <i class="fa-solid fa-pen-to-square"></i> </a></td> <td> <button class="btn btn-danger" onclick="Eliminar(${datos[i].idHab})"><i class="fa-solid fa-trash-can"></i></button></td></tr>`      
        }
        lista.innerHTML=filas;
    })
}

//buscar habitaciones por numero y tipo
document.getElementById('buscar_h').addEventListener('click', async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('datoBuscar').value;
    console.log(dato)
    await listarH(dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
})

const listarHabitaciones= async() =>{
    await listarH('');
    paginacion();
    buttonGenerator();
}

listarHabitaciones();