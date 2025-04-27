function mostrarSeccion(seccion) {
    document.getElementById('usuarios').style.display = 'none';
    document.getElementById('datos').style.display = 'none';

    document.getElementById(seccion).style.display = 'block';
}

// Función para mostrar la tabla de usuarios
function cargarUsuarios() {
    fetch('mostrar_usuarios.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('tablaUsuarios').innerHTML = data;
        });
}

// Función para mostrar la tabla de datos de personas
function cargarDatosPersonas() {
    fetch('mostrar_datos_persona.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('tablaDatos').innerHTML = data;
        });
}

// Mostrar la sección seleccionada
function mostrarSeccion(seccion) {
    document.getElementById('usuarios').style.display = 'none';
    document.getElementById('datos').style.display = 'none';

    document.getElementById(seccion).style.display = 'block';

    // Cargar los datos correspondientes dependiendo de la sección
    if (seccion === 'usuarios') {
        cargarUsuarios();
    } else if (seccion === 'datos') {
        cargarDatosPersonas();
    }
}
