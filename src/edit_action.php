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
    <main>
        <?php
/*Se comprueba si se ha llegado a esta página PHP a través del formulario de edición. 
Para ello se comprueba la variable de formulario: "modifica" enviada al pulsar el botón Guardar de dicho formulario.
Los datos del formulario se acceden por el método: POST
*/
        if(isset($_POST['modifica'])) {
/*Se obtienen los datos del empleado (id, nombre, apellido, edad y puesto) a partir del formulario de edición (idempleado, name, surname, age y job)  por el método POST.
Se envía a través del body del HTTP Request. No aparecen en la URL como era el caso del otro método de envío de datos: GET
Recuerda que   existen dos métodos con los que el navegador puede enviar información al servidor:
1.- Método HTTP GET. Información se envía de forma visible. A través de la URL (header HTTP Request )
En PHP los datos se administran con el array asociativo $_GET. En nuestro caso el dato del empleado se obiene a través de la clave: $_GET['idempleado']
2.- Método HTTP POST. Información se envía de forma no visible. A través del cuerpo del HTTP Request 
PHP proporciona el array asociativo $_POST para acceder a la información enviada.
*/
            $articulo_id = $mysqli->real_escape_string($_POST['articulo_id']);
            $nombre_autor = $mysqli->real_escape_string($_POST['nombre_autor']);
            $apellido_autor = $mysqli->real_escape_string($_POST['apellido_autor']);
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
            if(empty($nombre_autor) || empty($apellido_autor) || empty($deporte) || empty($antiguedad) || empty($fecha_publicacion)) 
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
                } //fin si
                else //Se realiza la modificación de un registro de la BD. 
                {
                $mysqli->query("UPDATE articulos SET nombre_autor = '$nombre_autor', apellido_autor = '$apellido_autor', deporte = '$deporte', antiguedad = '$antiguedad', fecha_publicacion = '$fecha_publicacion' WHERE articulo_id = $articulo_id");
                $mysqli->close();
                echo "<div class='alert alert-success' role='alert'>Registro editado correctamente.</div>";
                echo "<a href='index.php' class='btn btn-primary mt-3'>Ver resultado</a>";
                }
            }
        ?>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
