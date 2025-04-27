// Función para validar el formulario antes de enviarlo
function validarFormulario(event) {
    // Obtener todos los campos del formulario
    var nombre = document.getElementById('nombre').value;
    var fechaNacimiento = document.getElementById('fechaNacimiento').value;
    var sexo = document.getElementById('sexo').value;
    var estadoCivil = document.getElementById('estadoCivil').value;
    var calle = document.getElementById('calle').value;
    var ciudad = document.getElementById('ciudad').value;
    var pais = document.getElementById('pais').value;
    var telefono = document.getElementById('telefono').value;

    // Validaciones de campos obligatorios
    if (nombre.trim() === "") {
        alert("El nombre completo es obligatorio.");
        event.preventDefault(); // Evita el envío del formulario
        return false;
    }

    if (fechaNacimiento === "") {
        alert("La fecha de nacimiento es obligatoria.");
        event.preventDefault();
        return false;
    }

    if (sexo === "") {
        alert("Por favor, seleccione el sexo.");
        event.preventDefault();
        return false;
    }

    if (estadoCivil === "") {
        alert("Por favor, seleccione el estado civil.");
        event.preventDefault();
        return false;
    }

    if (calle.trim() === "") {
        alert("La calle es obligatoria.");
        event.preventDefault();
        return false;
    }

    if (ciudad.trim() === "") {
        alert("La ciudad es obligatoria.");
        event.preventDefault();
        return false;
    }

    if (pais.trim() === "") {
        alert("El país es obligatorio.");
        event.preventDefault();
        return false;
    }

    // Validación de teléfono (Debe ser un número válido)
    var telefonoRegex = /^[0-9]{10}$/;
    if (!telefonoRegex.test(telefono)) {
        alert("El número de teléfono debe tener 10 dígitos.");
        event.preventDefault();
        return false;
    }

    return true; // Si pasa todas las validaciones, el formulario se enviará
}

// Asignar el evento de validación al formulario
document.querySelector('form').addEventListener('submit', validarFormulario);
