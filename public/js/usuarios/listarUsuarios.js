
const listarU = async(dato)=>{
    await fetch('listar_usuarios', {
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
            filas+=`<tr class="text-center"> <td>${datos[i].id}</td> <td>${datos[i].dni}</td> <td>${datos[i].nombreC}</td> <td>${datos[i].telefono}</td> <td>${datos[i].email}</td> <td>${datos[i].username}</td><td> <a class="btn btn-success" href="http://localhost/proyecto-hotel/public/editar_usuario/${datos[i].id}"> <i class="fa-solid fa-pen-to-square"></i> </a></td> <td> <button class="btn btn-danger" onclick="Eliminar(${datos[i].id})"><i class="fa-solid fa-trash-can"></i></button></td></tr>`      
        }
        lista.innerHTML=filas;
    })
}

//buscar usuarios por dni, nombre Completo
document.getElementById('buscar_u').addEventListener('click', async (e)=>{
    e.preventDefault();
    let dato=document.getElementById('datoBuscar').value;
    console.log(dato)
    await listarU(dato);
    arrayTr=[];
    generarPaginas();
    paginacion();
    buttonGenerator();
})

const listarUsuarios= async() =>{
    await listarU('');
    paginacion();
    buttonGenerator();
}

listarUsuarios();