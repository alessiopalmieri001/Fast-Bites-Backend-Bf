// Funzione per mostrare il messaggio di conferma personalizzato
function showConfirmationMessage(foodId) {
    // Costruisci l'ID del messaggio di conferma usando l'ID del cibo
    var confirmationMessageId = 'confirmationMessage_' + foodId;
    document.getElementById(confirmationMessageId).style.display = 'block';
}

// Funzione per nascondere il messaggio di conferma personalizzato
function hideConfirmationMessage(foodId) {
    // Costruisci l'ID del messaggio di conferma usando l'ID del cibo
    var confirmationMessageId = 'confirmationMessage_' + foodId;
    document.getElementById(confirmationMessageId).style.display = 'none';
}

// Funzione per inviare il modulo di eliminazione
function confirmDelete(foodId) {
    // Costruisci l'ID del modulo di eliminazione usando l'ID del cibo
    var deleteFormId = 'deleteForm_' + foodId;
    document.getElementById(deleteFormId).submit();
}
