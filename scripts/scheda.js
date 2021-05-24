function onJson(json){
    let i=0;
    for(contenuto of json){
        
        titoli[i].textContent=contenuto.nome;
        paragrafi[i].textContent=contenuto.descrizione;
        immagini_piu[i]="./images/più.png"
        
        i++;
    }
    
}

function onJson2(text){
    console.log(text);
}

function onJson3(json){
    const immagini_add=document.querySelectorAll('article.main section div img');
    for(contenuto of json){
        cont++;
    for(i=0;i<9;i++){
        if(immagini_add[i].parentNode.textContent===contenuto.esercizio){
            immagini_add[i].src='./images/verde.png';
            immagini_add[i].classList.remove('cliccabile');
            immagini_add[i].removeEventListener('click', aggiungiAScheda);
            immagini_add[i].removeEventListener('click', insertDB);
            
            const section_scheda=document.querySelector('article.scheda section');
            const scritta_scheda=document.createElement('div');

            section_scheda.appendChild(scritta_scheda);
            
            
            scritta_scheda.textContent=immagini_add[i].parentNode.textContent;

            const article_preferiti=document.querySelector('article.scheda');
            article_preferiti.classList.remove('hidden');
            scritta_scheda.addEventListener('click',removeDB);
            scritta_scheda.classList.add('cliccabile');
        }
    }
}
console.log(json);
}

function removeDB(event){
    cont--;
    if(cont===0){
        const article_preferiti=document.querySelector('article.scheda');
        article_preferiti.classList.add('hidden');
    }
    event.target.classList.add('hidden');
    const nome=event.target.textContent;
    const formData=new FormData();
    formData.append('nome',nome);
    fetch("http://localhost/hw1/rimuovi_scheda.php",{
    method:"post",
  body:formData
  });
    for(i=0;i<9;i++){
        if(event.target.textContent===immagini_piu[i].parentNode.textContent)
        {
            immagini_piu[i].src='./images/più.png';
            immagini_piu[i].addEventListener('click', insertDB);
            immagini_piu[i].addEventListener('click', aggiungiAScheda);
            immagini_piu[i].classList.add('cliccabile');
        }
    }
    
}

function onResponse2(response){
    return response.text();
}

function onResponse(response){
    return response.json();
}

function aggiungiAScheda(event){
    cont++;
    for(i=0;i<9;i++){
        if(immagini_piu[i]===event.target){
            immagini_piu[i].src='./images/verde.png';
            immagini_piu[i].classList.remove('cliccabile');
            immagini_piu[i].removeEventListener('click', aggiungiAScheda);
            
            const section_scheda=document.querySelector('article.scheda section');
            const scritta_scheda=document.createElement('div');

            section_scheda.appendChild(scritta_scheda);
            
            
            scritta_scheda.textContent=immagini_piu[i].parentNode.textContent;

            const article_preferiti=document.querySelector('article.scheda');
            article_preferiti.classList.remove('hidden');
            scritta_scheda.addEventListener('click',removeDB);
            scritta_scheda.classList.add('cliccabile');
            
        }
    }
}

function insertDB(event){
    for(let i=0;i<9;i++){
        if(immagini_piu[i]===event.target){
            const esercizio=event.target.parentNode.textContent;
            const formData=new FormData();
            formData.append('esercizio',esercizio);
            fetch("http://localhost/hw1/inserisci_scheda.php",{
            method:"post",
          body:formData
    }).then(onResponse2).then(onJson2);
    
    immagini_piu[i].removeEventListener('click', insertDB);
      }
      
    }
}

let cont=0;

for(let i=0;i<9;i++){

    const article=document.querySelector('article.main');
    const section=document.createElement('section');
    const box_titolo=document.createElement('div');
    const title=document.createElement('h1');
    const img=document.createElement('img');
    const descr=document.createElement('p');


    article.appendChild(section);
    section.appendChild(box_titolo);
    box_titolo.appendChild(title);
    box_titolo.appendChild(img);
    section.appendChild(descr);

    img.classList.add('cliccabile');
}


fetch("http://localhost/hw1/contenuti_scheda.php").then(onResponse).then(onJson);


const titoli=document.querySelectorAll('article.main section div h1');
const immagini_piu=document.querySelectorAll('article.main section div img');
const paragrafi=document.querySelectorAll('article.main section p');

for(i=0;i<9;i++){
    immagini_piu[i].src='./images/più.png';
}

for(i=0;i<9;i++){
    immagini_piu[i].addEventListener('click', aggiungiAScheda);
    immagini_piu[i].addEventListener('click', insertDB);
}


fetch("http://localhost/hw1/controllo_scheda.php").then(onResponse).then(onJson3);