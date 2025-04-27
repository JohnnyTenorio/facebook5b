<?php
include('db.php');

// Verificar si se pasa un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener las credenciales actuales
    $query = "SELECT username, password FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_username = $_POST['username'];
        $new_password = $_POST['password'];

        // Actualizar las credenciales
        $update_query = "UPDATE usuarios SET username = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($update_query);
        $stmt->bind_param("ssi", $new_username, $new_password, $id);
        $stmt->execute();

        echo "<script>alert('Credenciales actualizadas con éxito.');window.location.href='ver_credenciales.php';</script>";
    }
} else {
    echo "<script>alert('ID no válido.');window.location.href='ver_credenciales.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Credenciales - Panel Admin</title>
    <link rel="stylesheet" href="editar_credenciales.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Editar Credenciales de Usuario</h1>

        <!-- Aquí puedes agregar los datos de la persona y los campos de edición de usuario y contraseña -->
        <form action="editar_credenciales.php?id=<?php echo $id; ?>" method="POST">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required>

            <!-- Checkbox para mostrar/ocultar la contraseña -->
            <label>
                <input type="checkbox" id="show-password"> Mostrar Contraseña
            </label>

            <button type="submit">Actualizar Credenciales</button>
        </form>

        <!-- Botón para regresar al Panel -->
        <a href="ver_credenciales.php?id=<?php echo $id; ?>" class="btn regresar">Regresar al Panel</a>
        </div>

    <!-- Script para manejar la visualización de la contraseña -->
    <script src="editar_credenciales.js"></script>
</body>
</html>
