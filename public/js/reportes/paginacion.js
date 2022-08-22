//paginacion de listas

let arrayTr = [];

function paginacion(){
    let tbody =document.querySelector('#lista');
    let tr = tbody.getElementsByTagName('tr');

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
}

//genera botones de paginacion
function generarPaginas(){
    let pag=document.getElementById('pagina');
    pag.innerHTML='<ul  class="pagination justify-content-center"> <li class="page-item"> <a class="page-link" href="#" id="first"> <span aria-hidden="true"><i class="fa-solid fa-backward-step"></i></span> </a> </li> <li class="page-item prev" > <a class="page-link" href="#" id="prev"> <span aria-hidden="true"><i class="fa-solid fa-caret-left"></i></span> </a> </li> <li class="page-item next"> <a class="page-link" href="#" id="next"> <span aria-hidden="true"><i class="fa-solid fa-caret-right"></i></span> </a> </li> <li class="page-item"> <a class="page-link" href="#" id="last"> <span aria-hidden="true"><i class="fa-solid fa-forward-step"></i></span></a></li></ul>'
}


function buttonGenerator(){
    let tbody =document.querySelector('#lista');
    // let tr = tbody.getElementsByTagName('tr');
    let ul = document.querySelector('.pagination');
    let limit=6;
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
                e.preventDefault();
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
   
    
    // document.getElementById('next').onclick = nextElement;
    // document.getElementById('prev').onclick = nextElement;
    // document.getElementById('first').onclick = nextElement;
    // document.getElementById('last').onclick = nextElement;
    function nextElement(id){
        if(id =='next'){
            if(!(z >= arrayTr.length - limit)){ 
                z+=limit;    
            };//console.log(z);
        }
        if(id=='prev'){
            z == 0 ? arrayTr.length - limit : (z-=limit);
        }
        if(id=='first'){z=0;}
        if(id=='last'){
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
    pagina.addEventListener('click',e=>{
        e.preventDefault();
        switch(e.target.id){
            case 'next': 
            case 'prev':
            case 'first':
            case 'last':
            nextElement(e.target.id);
            break;
        }
    })
}


//--------------