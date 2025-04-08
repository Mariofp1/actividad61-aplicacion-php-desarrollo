<?php
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sport Magazines</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
<div class="card p-4 shadow-sm">
    <header class="text-center mb-4">
        <h1 class="text-primary">Sport Magazines</h1>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container-fluid">
            <ul class="nav nav-pills mb-3">
                <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li>
                <li class="nav-item"><a class="nav-link" href="add.html">Alta</a></li>
            </ul>
        </div>
    </nav>

    <main>
        <h2 class="mb-3">Modificación Artículo</h2>

        <?php
        $articulo_id = $mysqli->real_escape_string($_GET['id']);
        $resultado = $mysqli->query("SELECT apellido_autor, nombre_autor, deporte, fecha_publicacion FROM articulos WHERE articulo_id = $articulo_id");
        $fila = $resultado->fetch_array();
        $mysqli->close();
        ?>

        <form action="edit_action.php" method="post" class="border p-4 rounded bg-light">
            <div class="mb-3">
                <label for="nombre_autor" class="form-label">Nombre Autor</label>
                <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" value="<?php echo htmlspecialchars($fila['nombre_autor']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido_autor" class="form-label">Apellido Autor</label>
                <input type="text" class="form-control" name="apellido_autor" id="apellido_autor" value="<?php echo htmlspecialchars($fila['apellido_autor']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="deporte" class="form-label">Deporte</label>
                <input type="text" class="form-control" name="deporte" id="deporte" value="<?php echo htmlspecialchars($fila['deporte']); ?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo htmlspecialchars($fila['fecha_publicacion']); ?>" required>
            </div>

            <input type="hidden" name="articulo_id" value="<?php echo $articulo_id; ?>">
            <input type="submit" name="modifica" value="Guardar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </form>
    </main>

    <footer class="text-center mt-4">
        <p class="text-muted">Created by the IES Miguel Herrero team &copy; 2024</p>
    </footer>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
