<?php
// Incluir el archivo de conexión a la base de datos
include 'AdminD.php';

// Obtener los usuarios y mostrar en la tabla
if ($result_usuarios->num_rows > 0) {
    while($row = $result_usuarios->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["username"]. "</td>
                <td>" . $row["password"]. "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='2'>No hay usuarios registrados</td></tr>";
}
?>
