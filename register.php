<?php
include('db.php'); 

// Recibir los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar si el nombre de usuario ya existe
    $query = "SELECT * FROM usuarios WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario ya existe
        echo "El nombre de usuario ya está registrado.";
    } else {
        // Insertar el nuevo usuario en la base de datos sin encriptar la contraseña
        $insert_query = "INSERT INTO usuarios (username, password) VALUES (?, ?)";
        $stmt_insert = $conn->prepare($insert_query);
        $stmt_insert->bind_param("ss", $username, $password); // Usamos directamente la contraseña sin encriptar

        if ($stmt_insert->execute()) {
            echo "Registro exitoso. <a href='index.html'>Iniciar sesión</a>";
        } else {
            echo "Error al registrar el usuario: " . $stmt_insert->error;
        }
    }

    // Cerrar la conexión de las consultas
    $stmt->close();
    if (isset($stmt_insert)) {
        $stmt_insert->close(); // Solo cerramos si fue inicializado
    }
    $conn->close();
}
?>

