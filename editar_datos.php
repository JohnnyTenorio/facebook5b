<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar y Eliminar Datos - Panel Admin</title>
    <link rel="stylesheet" href="editar_datos.css?v=1.0">
</head>
<body>
    <div class="container">
        <h1>Panel de Administrador: Editar y Eliminar Datos</h1>

        <!-- Formulario de búsqueda -->
        <form method="POST" action="editar_datos.php" class="search-form">
            <input type="text" name="nombre" placeholder="Buscar por nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : '' ?>">
            <button type="submit" name="buscar">Buscar</button>
        </form>

        <!-- Incluir el archivo PHP que trae los datos de la base de datos -->
        <?php include('editar.php'); ?>

        <!-- Botón para regresar al formulario principal -->
        <a href="admin_formulario.html" class="btn regresar">Regresar al Panel</a>

        <!-- Botón para ver credenciales -->
        <a href="ver_credenciales.php" class="ver-credenciales">Ver Credenciales</a>        
    </div>

    <script src="editar_datos.js"></script>
</body>
</html>
