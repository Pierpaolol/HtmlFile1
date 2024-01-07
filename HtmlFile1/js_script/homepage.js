const codiceID = document.getElementById('id');
const form = document.getElementById('form');
let errorElement = document.getElementById('error');

form.addEventListener('submit', e => {
    let message = [];
    if( codiceID.value===NaN){
        message.push('Il codice ID del ticket deve essere un numero');
    }
    if(message.length>0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }     
})