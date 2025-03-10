<?php

// Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Alta Artículo</title>
</head>
<body>
<div>
<header>
<h1>Alta de Artículo Deportivo</h1>
</header>
<main>
 
<?php

if(isset($_POST['inserta'])) 
{
    $apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
    $nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
    $deporte = $mysqli->real_escape_string($_POST['deporte']);
    $fecha_publicacion = $mysqli->real_escape_string($_POST['fecha_publicacion']);

    if(empty($apellido_autor) || empty($nombre_autor) || empty($deporte) || empty($fecha_publicacion)) 
    {
        if(empty($apellido_autor)) {
            echo "<div>Campo Apellido Autor vacío.</div>";
        }
 
        if(empty($nombre_autor)) {
            echo "<div>Campo Nombre Autor vacío.</div>";
        }
 
        if(empty($deporte)) {
            echo "<div>Campo Deporte vacío.</div>";
        }
 
        if(empty($fecha_publicacion)) {
            echo "<div>Campo Fecha de Publicación vacío.</div>";
        }

        $mysqli->close();
        echo "<a href='javascript:self.history.back();'>Volver atrás</a>";
    } 
    else 
    {
        $result = $mysqli->query("INSERT INTO articulos (apellido_autor, nombre_autor, deporte, fecha_publicacion) 
        VALUES ('$apellido_autor', '$nombre_autor', '$deporte', '$fecha_publicacion')");	
 
        $mysqli->close();
        echo "<div>Artículo añadido correctamente...</div>";
        echo "<a href='index.php'>Ver resultado</a>";
    }
}

?>
 
</main>
</div>
</body>
</html>