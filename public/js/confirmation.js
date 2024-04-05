// confirmation.js

// Funzione per mostrare il messaggio di conferma personalizzato
function showConfirmationMessage() {
    document.getElementById('confirmationMessage').style.display = 'block';
}

// Funzione per nascondere il messaggio di conferma personalizzato
function hideConfirmationMessage() {
    document.getElementById('confirmationMessage').style.display = 'none';
}

// Funzione per inviare il modulo di eliminazione
function confirmDelete() {
    document.getElementById('deleteForm').submit();
}