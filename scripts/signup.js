const check_pw=/[\_\*\-\+\!\?\,\:\;\.]/;
let presente=false;

function controlloPw(event){
    
    const p1=document.querySelector("#car_min");
    const p2=document.querySelector("#car_spec");
    const p3=document.querySelector("#conf_pw");
    const p4=document.querySelector("#compila");
    const p5=document.querySelector("#invalid");
    const p6=document.querySelector("#presente");
    
    p1.classList.add('hidden');
    p2.classList.add('hidden');
    p3.classList.add('hidden');
    p4.classList.add('hidden');
    p5.classList.add('hidden');
    p6.classList.add('hidden');

    
    
    if(form.username.value==="" || form.password.value==="" || form.conferma_password.value===""){

        p4.classList.remove('hidden');
        event.preventDefault();
        } else{
    if(form.password.value.length<8){
        p1.classList.remove('hidden');
        event.preventDefault();
    }

    if(!check_pw.test(form.password.value)){
        p2.classList.remove('hidden');
        event.preventDefault();
    }

    if(form.conferma_password.value!==form.password.value){
        p3.classList.remove('hidden');
        event.preventDefault();
    }

    if(presente){
        p6.classList.remove('hidden');
        event.preventDefault();
    }

    fetch("http://localhost/hw1/controllousr.php").then(onResponse).then(controlloUsr);
        }
}

function onResponse(response){
    return response.json();
}

  function controlloUsr(json){
    const nomi=json;
    presente=false;

    for(let nome of nomi){
    if(form.username.value===nome.username){
        presente=true;
    }
    }
}

function fetchDB(){
fetch("http://localhost/hw1/controllousr.php").then(onResponse).then(controlloUsr);
}

const form=document.querySelector('form')
form.addEventListener('submit', controlloPw)
form.addEventListener('keyup', fetchDB)

