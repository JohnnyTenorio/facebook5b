<?php
// Incluir el archivo de conexión a la base de datos
include 'AdminD.php';

// Obtener los datos de las personas y mostrarlos en la tabla
if ($result_personas->num_rows > 0) {
    while($row = $result_personas->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["nombre"]. "</td>
                <td>" . $row["fecha_nacimiento"]. "</td>
                <td>" . $row["sexo"]. "</td>
                <td>" . $row["estadocivil"]. "</td>
                <td>" . $row["calle"] . ", " . $row["ciudad"] . ", " . $row["pais"] . "</td>
                <td>" . $row["numero_telefono"]. "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='6'>No hay datos registrados</td></tr>";
}
?>
