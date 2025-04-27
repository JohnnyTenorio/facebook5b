<?php
include('db.php');

// Obtener los datos del usuario a editar
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT p.id, p.nombre, p.fecha_nacimiento, p.sexo_id, p.estadocivil_id, 
                     d.calle, d.ciudad, d.pais, t.numero_telefono 
              FROM persona p
              LEFT JOIN direccion d ON p.id = d.persona_id
              LEFT JOIN telefono t ON p.id = t.persona_id
              WHERE p.id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Actualizar datos (si se envían desde el formulario)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $sexo = $_POST['sexo'];
    $estadocivil = $_POST['estadoCivil'];
    $calle = $_POST['calle'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];

    // Actualizar los datos en la base de datos
    $update_query = "UPDATE persona SET nombre = ?, sexo_id = ?, estadocivil_id = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("siii", $nombre, $sexo, $estadocivil, $id);
    $stmt->execute();

    $update_query = "UPDATE direccion SET calle = ?, ciudad = ?, pais = ? WHERE persona_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("sssi", $calle, $ciudad, $pais, $id);
    $stmt->execute();

    $update_query = "UPDATE telefono SET numero_telefono = ? WHERE persona_id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $telefono, $id);
    $stmt->execute();

    echo "<script>alert('Datos actualizados con éxito.');window.location.href='editar_datos.php';</script>";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Datos</title>
    <link rel="stylesheet" href="ActualizarDatos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Editar Datos del Usuario</h1>
        <form method="POST" action="editar_formulario.php?id=<?php echo $user['id']; ?>">

            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo $user['nombre']; ?>" required>

            <label for="sexo">Sexo:</label>
            <select name="sexo" id="sexo" required>
                <option value="1" <?php if($user['sexo_id'] == 1) echo 'selected'; ?>>Masculino</option>
                <option value="2" <?php if($user['sexo_id'] == 2) echo 'selected'; ?>>Femenino</option>
            </select>

            <label for="estadoCivil">Estado Civil:</label>
            <select name="estadoCivil" id="estadoCivil" required>
                <option value="1" <?php if($user['estadocivil_id'] == 1) echo 'selected'; ?>>Soltero</option>
                <option value="2" <?php if($user['estadocivil_id'] == 2) echo 'selected'; ?>>Casado</option>
                <option value="3" <?php if($user['estadocivil_id'] == 3) echo 'selected'; ?>>Divorciado</option>
                <option value="4" <?php if($user['estadocivil_id'] == 4) echo 'selected'; ?>>Unido</option>
                <option value="5" <?php if($user['estadocivil_id'] == 5) echo 'selected'; ?>>Viudo</option>
            </select>

            <label for="calle">Calle:</label>
            <input type="text" id="calle" name="calle" value="<?php echo $user['calle']; ?>" required>

            <label for="ciudad">Ciudad:</label>
            <input type="text" id="ciudad" name="ciudad" value="<?php echo $user['ciudad']; ?>" required>

            <label for="pais">País:</label>
            <input type="text" id="pais" name="pais" value="<?php echo $user['pais']; ?>" required>

            <label for="telefono">Teléfono:</label>
            <input type="text" id="telefono" name="telefono" value="<?php echo $user['numero_telefono']; ?>" required>

            <button type="submit">Actualizar Datos</button>
        </form>

        <!-- Botón de regreso -->
        <a href="editar_datos.php" class="regresar">Regresar a la lista de usuarios</a>

    </div>
</body>
</html>

