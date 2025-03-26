<?php
/*Incluye parámetros de conexión a la base de datos: 
DB_HOST: nombre_autor o dirección del gestor de BD MariaDB
DB_NAME: nombre_autor de la BD
DB_USER: Usuario de la BD
DB_PASSWORD: Contraseña del usuario de la BD
*/
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Sport Magazines</title>
</head>
<body>
<div>
	<header>
		<h1>Sport Magazines</h1>
	</header>

	<main>
	<ul>
		<li><a href="index.php">Inicio</a></li>
		<li><a href="add.html">Alta</a></li>
	</ul>
	<h2>Articulos</h2>
	<table border="1">
	<thead>
		<tr>
			<th>Nombre_autor</th>
			<th>Apellido_autor</th>
			<th>Deporte</th>
			<th>Fecha_publicacion</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbdody>

<?php
/*Se realiza una consulta de selección la tabla empleados ordenados y almacena todos los registros en una estructura especial PARECIDA a una "tabla" llamada $resultado.
Cada fila y cada columna de la tabla se corresponde con un registro y campo de la tabla EMPLEADOS.
*/

$resultado = $mysqli->query("SELECT * FROM articulos ORDER BY fecha_publicacion");

//Cierra la conexión de la BD
$mysqli->close();

/*
A continuación indicamos distintos manera de leer cada fila de la tabla anterior: 
mysqli_fetch_array()- Almacena una fila de la tabla anterior, $resultado, en un array asociativo, numérico o ambos
mysqli_fetch_assoc()-  Almacena una fila de la tabla anterior, , $resultado, SOLO en un array asociativo
mysqli_fetch_row() - Almacena una fila de la tabla anterior, , $resultado, en un array numérico

Veamos la diferencia entre un array numérico y asosiativo. Antes que nada supongamos que hemos leido el 1º registro de la tabla:
articulo_id=1
apellido_autor=Coloma
nombre_autor=Javier
deporte=25
fecha_publicacion=contable

ARRAYS NUMÉRICO (se accede por índice). Donde los índices se corresponde con la POSICIÓN de cada campo en la tabla de empleados: 0->articulo_id, 1->apellido_autor, 2->nombre_autor, 3->deporte y 4-> fecha_publicacion
$fila[0] -> Contiene el contenido del campo articulo_id del empleado: 1
$fila[1] -> Contiene el contenido del campo apellido_autor: Coloma
$fila[2] -> Contiene el contenido del campo apellido_autor: Javier
$fila[3] -> Contiene el contenido del campo deporte: 25
$fila[4] -> Contiene el el contenido del campo fecha_publicacion: contable

ARRAYS ASOCIATIVO (se acceder por nombre_autor): Donde los índices (conocidos como claves) se corresponde con el nombre_autor de cada campo de la tabla de empleados: articulo_id, apellido_autor, nombre_autor, deporte y fecha_publicacion.
$fila["articulo_id"] -> Contiene el contenido del campo articulo_id del empleado actual: 1
$fila["apellido_autor"] -> Contiene el contenido del campo apellido_autor: Coloma
$fila["nombre_autor"] -> Contiene el contenido del campo nombre_autor: Javier 
$fila["deporte"] -> Contiene el contenido del campo deporte: 25
$fila["fecha_publicacion"] -> Contiene el el contenido del campo fecha_publicacion: contable
*/

//Comprobamos si el nº de fila/registros es mayor que 0
 if ($resultado->num_rows > 0) {

/* A través de la estructura repetitiva "while" se recorre la "tabla" $resultados almacenando cada línea/registro en el array asociativo $fila. 
Recuerda que $fila contiene el contenido de todos los campos del registro actual tal como explicamos anteriormente.
El bucle finaliza cuando se llegue a la última línea (o registro) de la tabla $resultado. 
A medida que avanza se va consturyendo cada fila de la tabla HTML con todos los campos del empleado, hasta completar todos los registros*/

	while($fila = $resultado->fetch_array()) {
		echo "<tr>\n";
		echo "<td>".$fila['nombre_autor']."</td>\n";
		echo "<td>".$fila['apellido_autor']."</td>\n";
		echo "<td>".$fila['deporte']."</td>\n";
		echo "<td>".$fila['fecha_publicacion']."</td>\n";
		echo "<td>";
/* En la última columna se añade dos enlaces para editar y modificar el registro correspondiente. 
Los datos se pueden enviar entre distintas páginas siguiendo distintos métodos. En este caso el articulo_id del registro a editar/eliminar se pasa a través de la URL. 
Este forma de pasar el dato se conoce como: método GET*/
		echo "<a href=\"edit.php?id=$fila[articulo_id]\">Edición</a>\n";
		echo "<a href=\"delete.php?id=$fila[articulo_id]\" onClick=\"return confirm('¿Está seguro que desea eliminar el artículo?')\" >Baja</a></td>\n";
		echo "</td>";
		echo "</tr>\n";
	}//fin mientras
 }//fin si
?>
	</tbdody>
	</table>
	</main>
	<footer>
    	Created by the IES Miguel Herrero team &copy; 2025
  	</footer>
</div>
</body>
</html>