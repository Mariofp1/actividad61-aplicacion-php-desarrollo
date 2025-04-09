<?php
// Incluye el archivo de configuración de la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
    <header class="text-center mb-4">
        <h1>Sport Magazines</h1>
    </header>
    <main>
        <div class="card p-4">
            <?php
            // Obtiene el id del artículo a eliminar desde la URL
            if (isset($_GET['id'])) {
                $articulo_id = $_GET['id'];

                // Escapa caracteres especiales para seguridad
                $articulo_id = $mysqli->real_escape_string($articulo_id);

                // Ejecuta la consulta para eliminar el artículo
                $resultado = $mysqli->query("DELETE FROM articulos WHERE articulo_id = $articulo_id");

                // Cierra la conexión a la base de datos
                $mysqli->close();
                
                echo "<div class='alert alert-success'>Artículo eliminado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger'>Error: No se proporcionó un ID válido.</div>";
            }
//Se redirige a la página principal: index.php
//header("Location:index.php");
            ?>
            <a href="index.php" class="btn btn-primary mt-3">Ver lista de artículos</a>
        </div>
    </main>
    <footer class="text-center mt-4">
        <p>Created by the IES Miguel Herrero team &copy; 2025</p>
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
