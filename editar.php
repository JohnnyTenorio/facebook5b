<?php
include('db.php');

// Verificar si se ha enviado una búsqueda
$nombre_busqueda = '';
if (isset($_POST['buscar']) && !empty($_POST['nombre'])) {
    $nombre_busqueda = $_POST['nombre'];
}

// Consulta para obtener los usuarios, incluyendo su dirección y teléfono
$query = "SELECT p.id, p.nombre, s.descripcion AS sexo, ec.descripcion AS estado_civil, 
                 d.calle, d.ciudad, d.pais, t.numero_telefono 
          FROM persona p
          LEFT JOIN sexo s ON p.sexo_id = s.id
          LEFT JOIN estadocivil ec ON p.estadocivil_id = ec.id
          LEFT JOIN direccion d ON p.id = d.persona_id
          LEFT JOIN telefono t ON p.id = t.persona_id";

// Si se ha realizado una búsqueda, agregar la condición para filtrar por nombre
if (!empty($nombre_busqueda)) {
    $query .= " WHERE p.nombre LIKE '%" . $nombre_busqueda . "%'";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Generar la tabla con los datos
    echo "<table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Sexo</th>
                    <th>Estado Civil</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['nombre'] . "</td>
                <td>" . $row['sexo'] . "</td>
                <td>" . $row['estado_civil'] . "</td>
                <td>" . $row['calle'] . ", " . $row['ciudad'] . ", " . $row['pais'] . "</td>
                <td>" . $row['numero_telefono'] . "</td>
                <td>
                    <a href='editar_formulario.php?id=" . $row['id'] . "'>Editar</a> |
                     <a href='#' onclick=\"confirmarEliminacion(" . $row['id'] . ")\">Eliminar</a>
                </td>
              </tr>";
    }

    echo "</tbody></table>";
} else {
    echo "<div class='no-usuarios'>No se encontraron resultados.</div>";
}
?>

