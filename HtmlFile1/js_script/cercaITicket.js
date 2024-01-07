const ricerca = document.getElementById('ricerca').toString();
const risposta = document.getElementById('risposta').toString();
const codiceID = document.getElementById('id').toString();
const form = document.getElementById('form');
let errorElement = document.getElementById('error');
const autore = document.getElementById('autore').toString();
form.addEventListener('submit', (e) => {
    let message=[]
    
    if(ricerca.length > 100){
        message.push('Non sono ammessi più di 100 caratteri per la ricerca');
    }
    if(autore.length > 50){
       message.push('L\' indirizzo di posta elettronica dell\' autore non può essere più lungo di 50 caratteri');
    }
    if(risposta.localeCompare('') || risposta.length===0){
        message.push('La risposta è vuota');
    }
    if(risposta.length > 150){
        message.push('Non sono ammessi più di 150 caratteri per la risposta');
    }
    if(codiceID.localeCompare('')){
        message.push('Il codice ID del ticket deve essere un numero');
    }
    if(message.length > 0){
        errorElement.innerText = message.join(', ');
        e.preventDefault();
    }
})