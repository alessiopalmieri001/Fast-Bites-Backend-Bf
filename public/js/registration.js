// register-validation.js

document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault();
    if (validateForm()) {
        document.getElementById('registerForm').submit();
    }
});

function validateForm() {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var password_confirmation = document.getElementById('password_confirmation').value;

    document.getElementById('nameError').innerText = '';
    document.getElementById('emailError').innerText = '';
    document.getElementById('passwordError').innerText = '';
    document.getElementById('passwordConfirmationError').innerText = '';

    var isValid = true;

    if (!name) {
        document.getElementById('nameError').innerText = 'Il campo Nome e Cognome è obbligatorio.';
        isValid = false;
    }

    if (!email) {
        document.getElementById('emailError').innerText = 'Il campo Email è obbligatorio.';
        isValid = false;
    } else if (!isValidEmail(email)) {
        document.getElementById('emailError').innerText = 'Inserisci un indirizzo email valido.';
        isValid = false;
    }

    if (!password) {
        document.getElementById('passwordError').innerText = 'Il campo Password è obbligatorio.';
        isValid = false;
    } else if (password.length < 8) {
        document.getElementById('passwordError').innerText = 'La password deve essere lunga almeno 8 caratteri.';
        isValid = false;
    }

    if (!password_confirmation) {
        document.getElementById('passwordConfirmationError').innerText = 'Il campo Conferma Password è obbligatorio.';
        isValid = false;
    } else if (password_confirmation !== password) {
        document.getElementById('passwordConfirmationError').innerText = 'Le password non corrispondono.';
        isValid = false;
    }

    return isValid;
}

function isValidEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
