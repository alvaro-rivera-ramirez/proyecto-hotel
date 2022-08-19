document.addEventListener('click', e=>{
    if(e.target.classList.contains('gpdf')){
        let enlace=e.target;
        // let fila=e.target.parentNode.parentNode;
        // let id;
        // if(!(e.target.tagName=="A")){
        //     fila=fila.parentNode;
        // }
        // id=fila.children[0].innerHTML;
        if(!(e.target.tagName=="A")){
            enlace=e.target.parentNode;
        }
        //enlace.setAttribute('href', "http://localhost/proyecto-hotel/public/imprimir_boleta/28");
        enlace.setAttribute("target", "_blank")
    }
})
