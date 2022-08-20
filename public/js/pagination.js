let tbody =document.querySelector('tbody');
let tr = tbody.getElementsByTagName('tr');
let ul = document.querySelector('.pagination');


let arrayTr = [];
for(let i=0;i<tr.length;i++){
    arrayTr.push(tr[i]);
}
let limit=6;

tbody.innerHTML='';
for(let i=0; i<limit; i++){
    if(i<arrayTr.length){
    tbody.appendChild(arrayTr[i]);
    }
}

buttonGenerator(limit);


function buttonGenerator(limit){
    const nofTr=arrayTr.length;
    let z=0;
    if(nofTr <=limit){
        ul.style.display='none';
    }else{
        ul.style.display='flex';
        const nofPage =Math.ceil(nofTr/limit);
        

        for(i=1; i<=nofPage;i++){
            let li=document.createElement('li');
            li.className = 'page-item page-a';
            let a=document.createElement('a');
            a.className = 'page-link';
            a.href = '#';
            a.setAttribute('data-page',i);
            li.appendChild(a);
            a.innerText =i;
            ul.insertBefore(li, ul.querySelector('.next'));
            a.onclick = e=>{
                let x = e.target.getAttribute('data-page');
                tbody.innerHTML = '';
                x--;
                let start = limit * x;
                let end = start + limit;
                let page = arrayTr.slice(start, end);
                z=start;
                
                for(let i=0; i<page.length; i++){
                    let item = page[i];
                    tbody.appendChild(item);
                }
            }
        }
    }
   
    
    function nextElement(){
        if(this.id =='next'){
            if(!(z >= arrayTr.length - limit)){ 
                z+=limit;    
            };//console.log(z);
        }
        if(this.id=='prev'){
            z == 0 ? arrayTr.length - limit : (z-=limit);
        }
        if(this.id=='first'){z=0;}
        if(this.id=='last'){
            resto = arrayTr.length  % limit;
            resto==0? z= arrayTr.length-limit:z=arrayTr.length-(resto);
        }
        tbody.innerHTML = '';
        for(let c=z; c<z+limit; c++){
            if(c<arrayTr.length && c>=0){
            tbody.appendChild(arrayTr[c]);
            }
        }

    }
    document.getElementById('next').onclick = nextElement;
    document.getElementById('prev').onclick = nextElement;
    document.getElementById('first').onclick = nextElement;
    document.getElementById('last').onclick = nextElement;
}


//--------------
let lista='';
function estructuraReserva(datosR,i){
    lista+='<tr class="text-center"> <td>'+datosR[i].idReserva+'</td> <td>'+datosR[i].dni+'</td> <td>'+datosR[i].nombreC+'</td> <td>'+datosR[i].nombreU+'</td> <td>'+datosR[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+datosR[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+datosR[i].precioT+'</td> <td>'+datosR[i].estadoReserva+'</td><td>'+datosR[i].estadoPago+'</td> <td> <a class="btn btn-success" onclick="editarReserva('+datosR[i].dni+','+datosR[i].idReserva+','+datosR[i].idEstadoR+','+datosR[i].idEstadoP+')" role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'
    //lista+='<tr class="text-center"> <td>'+datosR[i].idReserva+'</td> <td>'+datosR[i].dni+'</td> <td>'+datosR[i].nombreC+'</td> <td>'+datosR[i].nombreU+'</td> <td>'+datosR[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+datosR[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+datosR[i].precioT+'</td> <td>'+datosR[i].estadoReserva+'</td><td>'+datosR[i].estadoPago+'</td> <td> <a type="button" class="btn btn-warning gpdf" href="http://localhost/proyecto-hotel/public/imprimir_boleta/'+datosR[i].idReserva+'"><i class="fa-solid fa-file-pdf gpdf"></i></a></td><td> <a class="btn btn-success" onclick="editarReserva('+datosR[i].dni+','+datosR[i].idReserva+','+datosR[i].idEstadoR+','+datosR[i].idEstadoP+')" role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'
}
function estructuraReporteMes(datos,i){
    lista+=`<tr class="text-wrap"> <td>${datos[i].idReserva}</td> <td>${datos[i].dni}</td> <td>${datos[i].nombreC}</td> <td>${datos[i].fechas}</td><td> <button type="button" class="btn detalleR"><i class="fa-solid fa-circle-info"></i></button> </td> <td>${datos[i].precioT}</td></tr>`      
}
const pag =(datosR,tipo) =>{
    
    let tbody =document.querySelector('#resultado');
    
    let limit=6;

    tbody.innerHTML='';
    lista='';
    for(let i=0; i<limit; i++){
        if(i<datosR.length){
            switch(tipo){
                case "ListarReservas":
                estructuraReserva(datosR,i);
                break;
                case "reporteMes":
                    estructuraReporteMes(datosR,i);
                break;
            }
            resultado.innerHTML=lista;
        }
    }
    buttonGenerator(limit);

    function buttonGenerator(limit){
        const nofTr=datosR.length;
        let z=0;
        if(nofTr <=limit){
            ul.style.display='none';
        }else{
            ul.style.display='flex';
            const nofPage =Math.ceil(nofTr/limit);
            
            for(i=1; i<=nofPage;i++){
                let li=document.createElement('li');
                li.className = 'page-item page-a etiqueta';
                let a=document.createElement('a');
                a.className = 'page-link';
                a.href = '#';
                a.setAttribute('data-page',i);
                li.appendChild(a);
                a.innerText =i;
                ul.insertBefore(li, ul.querySelector('.next'));
                a.onclick = e=>{
                    let x = e.target.getAttribute('data-page');
                    resultado.innerHTML = '';
                    x--;
                    let start = limit * x;
                    let end = start + limit;
                    let page = datosR.slice(start, end);
                    
                    if(lista){lista=''};
                    z=start;
                    for(let i=0; i<page.length; i++){
                        switch(tipo){
                            case "ListarReservas":
                                estructuraReserva(page,i);
                            break;
                            case "reporteMes":
                                estructuraReporteMes(page,i);
                            break;
                        }
                        //item+='<tr class="text-center"> <td>'+page[i].idReserva+'</td> <td>'+page[i].dni+'</td> <td>'+page[i].nombreC+'</td> <td>'+page[i].nombreU+'</td> <td>'+page[i].fecha+'</td><td> <button type="button" class="btn detalleR" onclick="listarDetalle('+page[i].idReserva+')"><i class="fa-solid fa-circle-info"></i></button> </td> <td>'+page[i].precioT+'</td> <td>'+page[i].estadoReserva+'</td><td>'+page[i].estadoPago+'</td> <td> <a class="btn btn-success" onclick="editarReserva('+page[i].dni+','+page[i].idReserva+','+page[i].idEstadoR+','+page[i].idEstadoP+')" role="button"> <i class="fa-solid fa-pen-to-square"></i> </a> </td> <td> <a class="btn btn-danger" type="button"><i class="fa-solid fa-trash-can"></i> </a> </td> </tr>'       
                        resultado.innerHTML=lista;
                    }
                }
            }
        }
       
        
        function nextElement(){
            if(this.id =='next'){
                if(!(z >= datosR.length - limit)){ 
                    z+=limit;    
                };//console.log(z);
            }
            if(this.id=='prev'){
                z == 0 ? datosR.length - limit : (z-=limit);
            }
            if(this.id=='first'){z=0;}
            if(this.id=='last'){
                resto = datosR.length  % limit;
                resto==0? z= datosR.length-limit:z=datosR.length-(resto);
            }
            resultado.innerHTML = '';
            lista='';
            for(let c=z; c<z+limit; c++){
                if(c<datosR.length && c>=0){
                    switch(tipo){
                        case "ListarReservas":
                            estructuraReserva(datosR,c);
                        break;
                        case "reporteMes":
                            estructuraReporteMes(datosR,c);
                        break;
                    }
                    resultado.innerHTML=lista;
                }
            }
    
        }
        document.getElementById('next').onclick = nextElement;
        document.getElementById('prev').onclick = nextElement;
        document.getElementById('first').onclick = nextElement;
        document.getElementById('last').onclick = nextElement;
    }
}
function resetpag(){
    let lim=ul.querySelectorAll('.etiqueta');
    let count = 0;
    for (item of lim){
        if(count >= 0){
            item.remove();
        }
        count += 1;
    }
}