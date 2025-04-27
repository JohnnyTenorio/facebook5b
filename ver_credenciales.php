<?php
include('db.php');

// Consulta para obtener los usuarios y sus credenciales
$query = "SELECT p.id, u.username, u.password
          FROM usuarios p
          INNER JOIN usuarios u ON p.id = u.id"; // Asumiendo que tienes una tabla 'usuarios' para las credenciales
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Credenciales - Panel Admin</title>
    <link rel="stylesheet" href="editar_datos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Ver y Gestionar Credenciales</h1>

        <!-- Tabla de credenciales -->
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['username'] . "</td>
                                <td>" . $row['password'] . "</td>
                                <td>
                                    <a href='editar_credenciales.php?id=" . $row['id'] . "'>Editar</a> |
                                    <a href='#' onclick=\"confirmarEliminacionCredencial(" . $row['id'] . ")\">Eliminar</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No hay credenciales registradas.</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Botón para regresar -->
        <a href="editar_datos.php" class="btn regresar">Regresar</a>
    </div>

    <script>
        function confirmarEliminacionCredencial(id) {
            if (confirm("¿Estás seguro de que deseas eliminar esta credencial?")) {
                window.location.href = 'eliminar_credencial.php?id=' + id;
            }
        }
    </script>
</body>
</html>
