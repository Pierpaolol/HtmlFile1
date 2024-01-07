const form = document.getElementById('form');
let nome = document.getElementById('nome').toString();
let cognome = document.getElementById('cognome').toString();
const email = document.getElementById('email').toString();
const password = document.getElementById('password').toString();
let errorElement = document.getElementById('error');

form.addEventListener('submit', (e) => {
    let message=[];
    if(nome.length > 20){
        message.push('Non sono ammessi più di 20 caratteri per il nome');
    }else if(nome.localeCompare('') || nome.length===0){
        message.push('Inserisci il nome');
    }else{
        nome=nome.charAt(0).toUpperCase() + nome.slice(1,nome.indexOf('')).toLowerCase() + nome.slice(nome.indexOf('')+1,nome.indexOf()+2).toUpperCase() + nome.slice(nome.indexOf('')+2,end).toLowerCase();
    } 

    if(cognome.length > 20){
       message.push('Non sono ammessi più di 20 caratteri per il cognome');
    }else if(cognome.localeCompare('') || cognome.length===0){
        message.push('Inserisci il cognome');
    }else{
        cognome=cognome.charAt(0).toUpperCase() +cognome.slice(1,cognome.indexOf('')).toLowerCase()  + nome.slice(nome.indexOf('')+1,nome.indexOf()+2).toUpperCase() + nome.slice(nome.indexOf('')+2,end).toLowerCase();
    }
    
    if(risposta.localeCompare('') || risposta.length===0){
        message.push('La risposta è vuota');
    }
   
    if(email.length > 50 || email.length === 0 || email.localeCompare('')){
        message.push('Indirizzo email non valido');
    }
    
    if(password.length > 20|| password.length === 0 || password.localeCompare('')){
        message.push('Password non valida');
    }
    
    if(message.length >0){
        e.preventDefault();
        errorElement.innerText = message.join(', ');
    }
})




