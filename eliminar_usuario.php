<?php
include('db.php');

// Verificar si se pasa un ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar datos relacionados en las tablas direccion, telefono y usuarios
    $delete_query = "DELETE FROM telefono WHERE persona_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $delete_query = "DELETE FROM direccion WHERE persona_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $delete_query = "DELETE FROM usuarios WHERE persona_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Eliminar el usuario de la tabla persona
    $delete_query = "DELETE FROM persona WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Usuario eliminado con éxito.');window.location.href='editar_datos.php';</script>";
} else {
    echo "<script>alert('ID no válido.');window.location.href='editar_datos.php';</script>";
}
?>

