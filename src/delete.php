<?php
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baja Artículo</title>
</head>
<body>
<div>
	<header>
		<h1>Gestión de Artículos Deportivos</h1>
	</header>
	<main>

<?php

$articulo_id = $_GET['articulo_id'];

$articulo_id = $mysqli->real_escape_string($articulo_id);

$result = $mysqli->query("DELETE FROM articulos WHERE articulo_id = $articulo_id");

$mysqli->close();
?>

    <div>Artículo eliminado correctamente</div>
	<a href='index.php'>Ver lista de artículos</a>
    </main>
    <footer>
        Created by the Sports Management Team &copy; 2025
  	</footer>
</div>
</body>
</html>
