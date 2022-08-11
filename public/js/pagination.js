//paginacion
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
            console.log('ala');
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