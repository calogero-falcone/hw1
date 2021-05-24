
function onResponse(response){
    return response.json();
}

function onJson(json){
    console.log(json);
    if(json.totalHits===0){
    const view=document.querySelector('#view');
    view.innerHTML='';
    view.classList.remove('hidden');
    const infoN=document.createElement('span');
    infoN.textContent="Nessun risultato trovato.";
    view.appendChild(infoN);
            }
    
    else{
    const view=document.querySelector('#view');
    view.innerHTML='';
    let infoP="";
    let infoE="";
    view.classList.remove('hidden');
    for(food of json.foods){
        for(nutrient of food.foodNutrients){
            if(nutrient.nutrientName==="Protein"){
            infoP=food.description + ' => ' + nutrient.value + ' ' + nutrient.unitName.toLowerCase()
             + ' di proteine';
            }
            if(nutrient.nutrientName==="Energy"){
             infoE=' e ' + nutrient.value + ' ' + nutrient.unitName
             + ' per porzione';
            }
    }
    const infoCompl=document.createElement("span");
    infoCompl.textContent=infoP+infoE;
    view.appendChild(infoCompl);
    }
}
}

function onSubmit(event){
    event.preventDefault();
    const ricerca=document.querySelector("#cerca");
    content=ricerca.value;
    if(content){
    const query=encodeURIComponent(content);
    const formData=new FormData();
    formData.append('query',query);
    fetch("http://localhost/hw1/fooddata_api_curl.php",{
        method:"post",
          body:formData
    }).then(onResponse).then(onJson);

    }
}




let query="";
const submit=document.querySelector('#cerca_contenuto')
submit.addEventListener('submit',onSubmit)