<?php
include('db.php'); // Incluir el archivo de conexión

// Obtener los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $fechaNacimiento = $_POST['fechaNacimiento'];
    $sexo = $_POST['sexo_id'];  // Asegúrate de que este campo esté bien configurado en el formulario
    $estadoCivil = $_POST['EstadoCivil'];  // Asegúrate de que este campo esté bien configurado en el formulario
    $calle = $_POST['calle'];
    $ciudad = $_POST['ciudad'];
    $pais = $_POST['pais'];
    $telefono = $_POST['telefono'];

    // Validar que los valores de sexo y estado civil sean válidos
    if (!in_array($sexo, [1, 2])) {
        die("Sexo no válido.");
    }

    if (!in_array($estadoCivil, [1, 2, 3, 4, 5])) {
        die("Estado Civil no válido.");
    }

    // Insertar los datos en la tabla Persona
    $sql_persona = "INSERT INTO persona (nombre, fecha_nacimiento, sexo_id, estadocivil_id) 
                    VALUES ('$nombre', '$fechaNacimiento', '$sexo', '$estadoCivil')";
    
    if ($conn->query($sql_persona) === TRUE) {
        // Obtener el ID de la persona recién insertada
        $persona_id = $conn->insert_id;
        
        // Insertar la dirección
        $sql_direccion = "INSERT INTO direccion (persona_id, calle, ciudad, pais) 
                          VALUES ('$persona_id', '$calle', '$ciudad', '$pais')";
        $conn->query($sql_direccion);
        
        // Insertar el teléfono
        $sql_telefono = "INSERT INTO telefono (persona_id, numero_telefono) 
                         VALUES ('$persona_id', '$telefono')";
        $conn->query($sql_telefono);
        
        echo "Registro exitoso.";
        header("refresh:2;url=Formulario.html"); 
        exit();

    } else {
        echo "Error: " . $sql_persona . "<br>" . $conn->error;
    }
}

$conn->close();
?>