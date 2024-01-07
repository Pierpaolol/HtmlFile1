const form = document.getElementById('form');
let errorElement = document.getElementById('error');
const codiceID = document.getElementById('id').toString();
const risposta =  document.getElementById('risposta').toString();

form.addEventListener('submit', e => {
    let message = [];
    if(risposta.localeCompare('')){
        message.push('La risposta è vuota');
    }
    if(risposta.length > 150){
        message.push('Non sono ammessi più di 150 caratteri per la risposta');
    }
    if( codiceID.localeCompare('')){
        message.push('Il codice ID del ticket deve essere un numero');
    }
    if(message.length>0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }     
})