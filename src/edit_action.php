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

<?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/

if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre_autor, apellido, deporte y puesto) a partir del formulario de edición (articulo_id, nombre_autor, apellido_autor, deporte y fecha_publicacion)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['articulo_id']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/

	$articulo_id = $mysqli->real_escape_string($_POST['articulo_id']);
	$nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
	$apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
	$deporte = $mysqli->real_escape_string($_POST['deporte']);
	$fecha_publicacion = $mysqli->real_escape_string($_POST['fecha_publicacion']);

/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/	

//Se comprueba si existen campos del formulario vacíos
	if(empty($nombre_autor) || empty($apellido_autor) || empty($deporte) || empty($fecha_publicacion))	{
		if(empty($nombre_autor)) {
			echo "<font color='red'>Campo nombre_autor vacío.</font><br/>";
		}

		if(empty($apellido_autor)) {
			echo "<font color='red'>Campo apellido_autor vacío.</font><br/>";
		}

		if(empty($deporte)) {
			echo "<font color='red'>Campo deporte vacío.</font><br/>";
		}

		if(empty($fecha_publicacion)) {
			echo "<font color='red'>Campo fecha_publicación vacío.</font><br/>";
		}
	} //fin si
	else //Se realiza la modificación de un registro de la BD. 
	{
		//Se actualiza el registro a modificar: update
        $mysqli->query("UPDATE articulos SET nombre_autor = '$nombre_autor', apellido_autor = '$apellido_autor', deporte = '$deporte', fecha_publicacion = '$fecha_publicacion' WHERE articulo_id = $articulo_id");
        $mysqli->close();
        echo "<div>Registro editado correctamente...</div>";
        echo "<a href='index.php'>Ver resultado</a>";
        //Se redirige a la página principal: index.php
        //header("Location: index.php");
	}// fin sino
}//fin si
?>

    <!--<div>Registro editado correctamente</div>
	<a href='index.php'>Ver resultado</a>-->
	</main>	
</div>
</body>
</html>
