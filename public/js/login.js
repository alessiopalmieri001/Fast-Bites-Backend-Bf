// login-errors.js

// Funzione per gestire gli errori nel login
function handleLoginErrors() {
    // Seleziona tutti gli elementi con classe 'text-danger' e nascondili
    var errorElements = document.querySelectorAll('.text-danger');
    errorElements.forEach(function(errorElement) {
        errorElement.innerText = ''; // Resetta il contenuto del messaggio di errore
    });

    // Mostra gli errori per campo
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');

    // Ottieni gli errori dal backend
    var backendEmailError = document.getElementById('backendEmailError');
    var backendPasswordError = document.getElementById('backendPasswordError');

    // Se ci sono errori dal backend, mostrali
    if (backendEmailError) {
        emailError.innerText = backendEmailError.innerText;
    }

    if (backendPasswordError) {
        passwordError.innerText = backendPasswordError.innerText;
    }
}

// Esegui la funzione quando il documento è pronto
document.addEventListener('DOMContentLoaded', function() {
    handleLoginErrors();
});
