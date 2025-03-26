<?php
//Incluye fichero con parámetros de conexión a la base de datos
include("config.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar artículo</title>
</head>
<body>
<div>
	<header>
		<h1>Sport Magazines</h1>
	</header>
	<main>

<?php
/*Obtiene el id del registro del empleado a eliminar, articulo_id, a partir de su URL. Se recibe el dato utilizando el método: GET 
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['articulo_id']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

//Recoge el id del empleado a eliminar a través de la clave articulo_id del array asociativo $_GET y lo almacena en la variable articulo_id
$articulo_id = $_GET['id'];

//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
$articulo_id = $mysqli->real_escape_string($articulo_id);

//Se realiza el borrado del registro: delete.
$result = $mysqli->query("DELETE FROM articulos WHERE articulo_id = $articulo_id");

//Se cierra la conexión de base de datos previamente abierta
$mysqli->close();
?>

    <div>Artículo eliminado correctamente</div>
	<a href='index.php'>Ver lista de artículos</a>
    </main>
    <footer>
        Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>