<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta nombre_autor="viewport" content="width=device-width, initial-scale=1">	
	<title>Sport Magazines</title>
</head>
<body>
<div>
	<header>
		<h1>Sport Magazines</h1>
	</header>
	
	<main>				
	<ul>
		<li><a href="index.php" >Inicio</a></li>
		<li><a href="add.html" >Alta</a></li>
	</ul>
	<h2>Modificación articulo</h2>


<?php


/*Obtiene el id del registro del empleado a modificar, articulo_id, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave articulo_id del array asociativo $_GET y lo almacena en la variable articulo_id
$articulo_id = $_GET['id'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$articulo_id = $mysqli->real_escape_string($articulo_id);

//Se selecciona el registro a modificar: select
$resultado = $mysqli->query("SELECT apellido_autor, nombre_autor, deporte, fecha_publicacion FROM articulos WHERE articulo_id = $articulo_id");

//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
$fila = $resultado->fetch_array();
$nombre_autor = $fila['nombre_autor'];
$apellido_autor = $fila['apellido_autor'];
$deporte = $fila['deporte'];
$fecha_publicacion = $fila['fecha_publicacion'];

//Se cierra la conexión de base de datos
$mysqli->close();
?>
<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a esta misma página (form action="edit.php"): edit.php
Esta misma página (edit.php), además de editar el formulario, se encargará de proceder a la modificación del registro correspondiente en la tabla de articulos.
-->

    <form action="edit_action.php" method="post">
        <div>
            <label for="nombre_autor">Nombre Autor</label>
            <input type="text" name="nombre_autor" id="nombre_autor" value="<?php echo $nombre_autor;?>" required>
        </div>

        <div>
            <label for="apellido_autor">Apellido Autor</label>
            <input type="text" name="apellido_autor" id="apellido_autor" value="<?php echo $apellido_autor;?>" required>
        </div>

        <div>
            <label for="deporte">Deporte</label>
            <input type="text" name="deporte" id="deporte" value="<?php echo $deporte;?>" required>
        </div>

        <div>
            <label for="fecha_publicacion">Fecha de Publicación</label>
            <input type="date" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo $fecha_publicacion;?>" required>
        </div>

        <div>
            <input type="hidden" name="articulo_id" value="<?php echo $articulo_id; ?>">
            <input type="submit" name="modifica" value="Guardar">
            <input type="button" value="Cancelar" onclick="location.href='index.php'">
        </div>
    </form>
    </main>    
    <footer>
        Created by the IES Miguel Herrero team &copy; 2024
    </footer>
</div>
</body>
</html>

