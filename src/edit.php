<?php
//Incluye fichero con parámetros de conexión a la base de datos
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
/*Obtiene el id del registro del empleado a modificar, idempleado, a partir de su URL. Este tipo de datos se accede utilizando el método: GET*/

//Recoge el id del empleado a modificar a través de la clave idempleado del array asociativo $_GET y lo almacena en la variable idempleado
        $articulo_id = $_GET['id'];
//Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
        $articulo_id = $mysqli->real_escape_string($articulo_id);
//Se selecciona el registro a modificar: select
        $resultado = $mysqli->query("SELECT apellido_autor, nombre_autor, deporte, antiguedad, fecha_publicacion FROM articulos WHERE articulo_id = $articulo_id");
//Se extrae el registro y lo guarda en el array $fila
//Nota: También se puede utilizar el método fetch_assoc de la siguiente manera: $fila = $resultado->fetch_assoc();
        $fila = $resultado->fetch_array();
        $nombre_autor = $fila['nombre_autor'];
        $apellido_autor = $fila['apellido_autor'];
        $deporte = $fila['deporte'];
        $antiguedad = $fila['antiguedad'];
        $fecha_publicacion = $fila['fecha_publicacion'];
//Se cierra la conexión de base de datos
        $mysqli->close();   
        ?>
<!--FORMULARIO DE EDICIÓN. Al hacer click en el botón Guardar, llama a esta misma página (form action="edit.php"): edit.php
Esta misma página (edit.php), además de editar el formulario, se encargará de proceder a la modificación del registro correspondiente en la tabla de empleados.
-->
        <form action="edit_action.php" method="post" class="border p-4 rounded bg-light">
            <div class="mb-3">
                <label for="nombre_autor" class="form-label">Nombre Autor</label>
                <input type="text" class="form-control" name="nombre_autor" id="nombre_autor" value="<?php echo $nombre_autor;?>" required>
            </div>

            <div class="mb-3">
                <label for="apellido_autor" class="form-label">Apellido Autor</label>
                <input type="text" class="form-control" name="apellido_autor" id="apellido_autor" value="<?php echo $apellido_autor;?>" required>
            </div>

            <div class="col-md-6">
			<label for="deporte" class="form-label">Deporte</label>
            <select name="deporte" id="deporte" class="form-control" placeholder="Deporte" required>
                <option value="<?php echo $deporte;?>" selected><?php echo $deporte;?></option>
				<option value="Fútbol">Fútbol</option>
				<option value="Baloncesto">Baloncesto</option>
				<option value="Petanca">Petanca</option>
				<option value="Ciclismo">Ciclismo</option>
				<option value="Rugby">Rugby</option>
				<option value="Atletismo">Atletismo</option>
				<option value="Waterpolo">Waterpolo</option>
            </select>    
		    </div>

            <div class="mb-3">
                <label for="antiguedad" class="form-label">Antiguedad</label>
                <input type="number" class="form-control" name="antiguedad" id="antiguedad" value="<?php echo $antiguedad;?>" required>
            </div>

            <div class="mb-3">
                <label for="fecha_publicacion" class="form-label">Fecha de Publicación</label>
                <input type="date" class="form-control" name="fecha_publicacion" id="fecha_publicacion" value="<?php echo $fecha_publicacion;?>" required>
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
