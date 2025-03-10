<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>
 
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">	
<title>Modificación de Artículo Deportivo</title>
</head>
<body>
<div>
<header>
<h1>Modificación de Artículo Deportivo</h1>
</header>
<main>				
 
<?php
// Se comprueba si se ha enviado el formulario de modificación
if(isset($_POST['modifica'])) {
 
	// Se obtienen los datos del formulario mediante POST
	$articulo_id = $mysqli->real_escape_string($_POST['articulo_id']);
	$apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
	$nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
	$deporte = $mysqli->real_escape_string($_POST['deporte']);
	$fecha_publicacion = $mysqli->real_escape_string($_POST['fecha_publicacion']);
 
	// Se comprueba si hay algún campo vacío
	if(empty($apellido_autor) || empty($nombre_autor) || empty($deporte) || empty($fecha_publicacion)) {
		if(empty($apellido_autor)) {
			echo "<font color='red'>Campo Apellido Autor vacío.</font><br/>";
		}
		if(empty($nombre_autor)) {
			echo "<font color='red'>Campo Nombre Autor vacío.</font><br/>";
		}
		if(empty($deporte)) {
			echo "<font color='red'>Campo Deporte vacío.</font><br/>";
		}
		if(empty($fecha_publicacion)) {
			echo "<font color='red'>Campo Fecha de Publicación vacío.</font><br/>";
		}
 
	} else {
		// Se actualiza el registro en la base de datos
		$mysqli->query("UPDATE articulos SET 
			apellido_autor = '$apellido_autor', 
			nombre_autor = '$nombre_autor',  
			deporte = '$deporte',
			fecha_publicacion = '$fecha_publicacion' 
			WHERE articulo_id = $articulo_id");
 
		$mysqli->close();
        echo "<div>Artículo editado correctamente...</div>";
		echo "<a href='index.php'>Ver resultado</a>";
	}
}
?>
 
	</main>	
</div>
</body>
</html>
