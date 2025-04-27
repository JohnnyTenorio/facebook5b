// Script para manejar la visualización de la contraseña
document.getElementById('show-password').addEventListener('change', function() {
    var passwordField = document.getElementById('password');
    if (this.checked) {
        passwordField.type = 'text'; // Mostrar la contraseña
    } else {
        passwordField.type = 'password'; // Ocultar la contraseña
    }
});

