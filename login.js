document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.querySelector('form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const errorMessage = document.createElement('div');
    errorMessage.style.color = 'red';
    errorMessage.style.fontSize = '14px';
    errorMessage.style.marginTop = '10px';
    errorMessage.style.display = 'none'; // Inicialmente oculto
    loginForm.appendChild(errorMessage);
    
    loginForm.addEventListener('submit', function(event) {
        let valid = true;
        errorMessage.textContent = ''; // Limpiar cualquier mensaje anterior
        
        // Validación del campo de nombre de usuario
        if (usernameInput.value.trim() === '') {
            valid = false;
            errorMessage.textContent = 'El nombre de usuario es obligatorio.';
        }

        // Validación del campo de contraseña
        if (passwordInput.value.trim() === '') {
            valid = false;
            errorMessage.textContent += ' La contraseña es obligatoria.';
        }

        // Si no es válido, evitar el envío del formulario
        if (!valid) {
            event.preventDefault(); // Evitar el envío del formulario
            errorMessage.style.display = 'block'; // Mostrar el mensaje de error
        }
    });
});
