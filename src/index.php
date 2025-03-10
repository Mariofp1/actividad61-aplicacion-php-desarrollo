<?php
/*Incluye parámetros de conexión a la base de datos:
DB_HOST: Nombre o dirección del gestor de BD MariaDB
DB_NAME: Nombre de la BD
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
    <title>Artículos Deportivos</title>
</head>
<body>
<div>
    <header>
        <h1>Listado de Artículos Deportivos</h1>
    </header>
 
    <main>
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="add.html">Alta</a></li>
    </ul>
    <h2>Artículos</h2>
    <table border="1">
    <thead>
        <tr>
            <th>Apellido Autor</th>
            <th>Nombre Autor</th>
            <th>Deporte</th>
            <th>Fecha de Publicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
 
<?php
// Se realiza una consulta para obtener todos los artículos ordenados por fecha de publicación
$resultado = $mysqli->query("SELECT * FROM articulos ORDER BY fecha_publicacion DESC");
 
// Cierra la conexión con la BD
$mysqli->close();
 
// Comprobamos si hay registros en la tabla
if ($resultado->num_rows > 0) {
    while($fila = $resultado->fetch_array()) {
        echo "<tr>\n";
        echo "<td>".$fila['apellido_autor']."</td>\n";
        echo "<td>".$fila['nombre_autor']."</td>\n";
        echo "<td>".$fila['deporte']."</td>\n";
        echo "<td>".$fila['fecha_publicacion']."</td>\n";
        echo "<td>";
        // Enlaces para editar y eliminar el registro
        echo "<a href=\"edit.php?id=$fila[articulo_id]\">Edición</a>\n";
        echo "<a href=\"delete.php?id=$fila[articulo_id]\" onClick=\"return confirm('¿Está seguro que desea eliminar este artículo?')\" >Baja</a></td>\n";
        echo "</td>";
        echo "</tr>\n";
    }
}
?>
    </tbody>
    </table>
    </main>
    <footer>
        Created by the IES Miguel Herrero team &copy; 2025
    </footer>
</div>
</body>
</html>
