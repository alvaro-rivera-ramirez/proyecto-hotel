document.addEventListener('click', e=>{
    if(e.target.classList.contains('gpdf')){
        let enlace=e.target;
        let fila=e.target.parentNode.parentNode;
        let id;
        if(!(e.target.tagName=="A")){
            enlace=e.target.parentNode;
            fila=fila.parentNode;
        }
        id=fila.children[0].innerHTML;
        enlace.setAttribute('href', "http://localhost/proyecto-hotel/public/imprimir_boleta/"+id);
        enlace.setAttribute("target", "_blank")
    }
})
