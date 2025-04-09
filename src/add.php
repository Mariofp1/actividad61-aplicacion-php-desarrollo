<?php
//Incluye fichero con parámetros de conexión a la base de datos
include_once("config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Alta artículo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-4">
<div class="card p-4 shadow-sm">
    <header class="text-center mb-4">
        <h1 class="text-primary">Sport Magazines</h1>
    </header>
    <main>
        <?php
/* Se Comprueba si se ha llegado a esta página PHP a través del formulario de altas. 
Para ello se comprueba la variable de formulario: "inserta" enviada al pulsar el botón inserta.
Los datos del formulario se acceden por el método: POST
*/
        if(isset($_POST['inserta'])) 
        {
            $apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
            $nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
            $deporte = $mysqli->real_escape_string($_POST['deporte']);
            $antiguedad = $mysqli->real_escape_string($_POST['antiguedad']);
            $fecha_publicacion = $mysqli->real_escape_string($_POST['fecha_publicacion']);
/*Con mysqli_real_scape_string protege caracteres especiales en una cadena para ser usada en una sentencia SQL.
Esta función es usada para crear una cadena SQL legal que se puede usar en una sentencia SQL. 
Los caracteres codificados son NUL (ASCII 0), \n, \r, \, ', ", y Control-Z.
Ejemplo: Entrada sin escapar: "O'Reilly" contiene una comilla simple (').
Escapado con mysqli_real_escape_string(): Se convierte en "O\'Reilly", evitando que la comilla se interprete como el fin de una cadena en SQL.
*/

//Se comprueba si existen campos del formulario vacíos
            if(empty($apellido_autor) || empty($nombre_autor) || empty($deporte) || empty($antiguedad) || empty($fecha_publicacion)) 
            {
                if(empty($apellido_autor)) 
                {
                    echo "<div class='alert alert-danger' role='alert'>Por favor, complete el campo apellido autor.</div>";
                }
                if(empty($nombre_autor)) 
                {
                    echo "<div class='alert alert-danger' role='alert'>Por favor, complete el campo nombre autor.</div>";
                }
                if(empty($deporte)) 
                {
                    echo "<div class='alert alert-danger' role='alert'>Por favor, complete el campo deporte.</div>";
                }
                if(empty($antiguedad)) 
                {
                    echo "<div class='alert alert-danger' role='alert'>Por favor, complete el campo antiguedad.</div>";
                }
                if(empty($fecha_publicacion)) 
                {
                    echo "<div class='alert alert-danger' role='alert'>Por favor, complete el campo fecha publicación.</div>";
                }
//Enlace a la página anterior
		//Se cierra la conexión 
            $mysqli->close();
            echo "<a href='javascript:self.history.back();' class='btn btn-secondary mt-3'>Volver atrás</a>";
        }//fin si     
        else {//Sino existen campos de formulario vacíos se procede al alta del nuevo registro
//Se ejecuta una sentencia SQL. Inserta (da de alta) el nuevo registro: insert.
            $result = $mysqli->query("INSERT INTO articulos (apellido_autor, nombre_autor, deporte, antiguedad, fecha_publicacion) VALUES ('$apellido_autor', '$nombre_autor', '$deporte', '$antiguedad', '$fecha_publicacion')");
            $mysqli->close();
            echo "<div class='alert alert-success' role='alert'>Artículo añadido correctamente.</div>";
            echo "<a href='index.php' class='btn btn-primary mt-3'>Ver resultado</a>";
        }//fin sino
    }
        ?>
    </main>
    <footer class="text-center mt-4">
        Created by the IES Miguel Herrero team &copy; 2025
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>