document.addEventListener('DOMContentLoaded', function () {
    const registerForm = document.getElementById('registerForm');
    const errorMessageDiv = document.getElementById('error-message');
    
    registerForm.addEventListener('submit', function (event) {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;

        if (password !== confirmPassword) {
            event.preventDefault();  // Evitar el envío del formulario
            errorMessageDiv.textContent = 'Las contraseñas no coinciden.';
        } else {
            errorMessageDiv.textContent = ''; // Limpiar el mensaje de error
        }
    });
});
