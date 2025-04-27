<?php

include('db.php'); 

// Obtener usuarios
$sql_usuarios = "SELECT username, password FROM usuarios";
$result_usuarios = $conn->query($sql_usuarios);

// Obtener datos de las personas
$sql_personas = "SELECT p.nombre, p.fecha_nacimiento, s.descripcion as sexo, e.descripcion as estadocivil, d.calle, d.ciudad, d.pais, t.numero_telefono 
                 FROM persona p
                 LEFT JOIN sexo s ON p.sexo_id = s.id
                 LEFT JOIN estadocivil e ON p.estadocivil_id = e.id
                 LEFT JOIN direccion d ON p.id = d.persona_id
                 LEFT JOIN telefono t ON p.id = t.persona_id";
$result_personas = $conn->query($sql_personas);

?>