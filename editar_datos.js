// Función para editar datos (abrir el formulario con los datos actuales)
function editarUsuario(id) {
    // Redirigir a un formulario con los datos para edición
    window.location.href = `editar_formulario.php?id=${id}`;
}

// Función para eliminar usuario
function confirmarEliminacion(id) {
    // Mostrar una ventana de confirmación
    var confirmacion = confirm("¿Estás seguro de que deseas eliminar este usuario?");
    if (confirmacion) {
        // Si el usuario confirma, redirigir a la página de eliminación con el ID
        window.location.href = "eliminar_usuario.php?id=" + id;
    }
}

