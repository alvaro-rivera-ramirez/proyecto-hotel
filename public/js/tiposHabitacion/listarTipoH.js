const listarThab = async(dato)=>{
    await fetch('listar_tipohab', {
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
            filas+=`<tr class="text-center"> <td>${datos[i].idTipo}</td> <td>${datos[i].tipo}</td> <td>${datos[i].precio}</td> <td> <a class="btn btn-success" href="http://localhost/proyecto-hotel/public/editar_tipohab/${datos[i].idTipo}"> <i class="fa-solid fa-pen-to-square"></i> </a></td> <td><button class="btn btn-danger" onclick="Eliminar(${datos[i].idTipo})"><i class="fa-solid fa-trash-can"></i></button> </td></tr>`      
        }
        lista.innerHTML=filas;
    })
}

//buscar tipo habitacion por nombre
document.getElementById('buscar_th').addEventListener('click', async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('datoBuscar').value;
    console.log(dato)
    await listarThab(dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
})

const listarTiposHab= async() =>{
    await listarThab('');
    paginacion();
    buttonGenerator();
}

listarTiposHab();