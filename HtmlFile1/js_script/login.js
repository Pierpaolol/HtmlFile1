const email = document.getElementById('email').toString().toLocaleLowerCase();
const password = document.getElementById('password').toString();
const form = document.getElementById('form');
let errorElement = document.getElementById('error');
form.addEventListener('submit', e => {
    let message = [];
    if(email.valueOf.length ===0 || password.valueOf.length === null){
    message.push('Credenziali richieste');
    }
    if(email.value.length > 50){
       message.push('L\' indirizzo di posta elettronica non può essere più lungo di 50 caratteri');
    }
    if(password.valueOf.length > 20){
        message.push('La password non può essere più lunga di 20 caratteri');
    }
    if(message.length>0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }     
})