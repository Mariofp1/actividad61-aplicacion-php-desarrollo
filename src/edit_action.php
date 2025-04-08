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
    <main>
        <?php
        if(isset($_POST['modifica'])) {
            $articulo_id = $mysqli->real_escape_string($_POST['articulo_id']);
            $nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
            $apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
            $deporte = $mysqli->real_escape_string($_POST['deporte']);
            $fecha_publicacion = $mysqli->real_escape_string($_POST['fecha_publicacion']);

            if(empty($nombre_autor) || empty($apellido_autor) || empty($deporte) || empty($fecha_publicacion)) {
                echo "<div class='alert alert-danger' role='alert'>Por favor, complete todos los campos.</div>";
            } else {
                $mysqli->query("UPDATE articulos SET nombre_autor = '$nombre_autor', apellido_autor = '$apellido_autor', deporte = '$deporte', fecha_publicacion = '$fecha_publicacion' WHERE articulo_id = $articulo_id");
                $mysqli->close();
                echo "<div class='alert alert-success' role='alert'>Registro editado correctamente.</div>";
                echo "<a href='index.php' class='btn btn-primary mt-3'>Ver resultado</a>";
            }
        }
        ?>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
