<?php
include('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar la credencial (username y password) de la tabla 'usuarios'
    $delete_query = "DELETE FROM usuarios WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    echo "<script>alert('Credencial eliminada con éxito.');window.location.href='ver_credenciales.php';</script>";
} else {
    echo "<script>alert('ID no válido.');window.location.href='ver_credenciales.php';</script>";
}
?>
