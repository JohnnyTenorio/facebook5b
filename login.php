<?php
// Incluir archivo de conexión a la base de datos
include('db.php'); 

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Buscar el usuario en la base de datos
        $query = "SELECT * FROM usuarios WHERE username = '$username'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            
            // Verificar la contraseña (comparación directa, sin encriptación)
            if ($password == $user['password']) {
                // Verificar si es AdminLeo
                if ($username == 'AdminLeo' && $password == 'AdminLeo') {
                    header("Location: admin_formulario.html"); // Panel especial para el admin
                    exit();
                } else {
                    header("Location: Formulario.html"); // Formulario para usuarios normales
                    exit();
                }
            } else {
                echo "<script>alert('Contraseña incorrecta.'); window.location.href='index.html';</script>";
            }
        } else {
            echo "<script>alert('Usuario no encontrado.');window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Por favor, complete todos los campos.');</script>";
    }
}
?>
