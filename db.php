<?php
// db.php
$servername = "localhost";
$username = "root"; // Usuario predeterminado en XAMPP
$password = ""; // Contraseña vacía en XAMPP
$dbname = "facebook5b";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
