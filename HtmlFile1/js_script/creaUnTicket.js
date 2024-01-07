const form = document.getElementById('form');
const oggetto = document.getElementById('oggetto').toString();
const descrizione = document.getElementById('descrizione').toString();
const dispositivo = document.getElementById('dispositivo').toString();
const natura = document.getElementById('natura').toString();
let errorElement = document.getElementById('error');
form.addEventListener('submit',e=>{
    let message=[];
    if(oggetto.valueOf.length ===0){
        message.push('L\' oggetto non può essere vuoto');
    }
    if(oggetto.lenght > 100){
        message.push('L\' oggetto non può essere più lungo di 100 caratteri');
    }
    if(dispositivo.valueOf.length===0){
        message.push('Seleziona il dispositivo');
    }
    if(descrizione.lenght > 1500){
        message.push('La descrizione è troppo lunga');
    }
    if(natura.lenght === 0){
        message.push('Seleziona la natura');
    }
    if(message.length >0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }
})