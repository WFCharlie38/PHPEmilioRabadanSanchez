<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    function limpiar_campos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nombre = limpiar_campos($_POST["nombre"]);
    $apellido1 = limpiar_campos($_POST["apellido1"]);
    $apellido2 = limpiar_campos($_POST["apellido2"]);
    $fecha_nacimiento = limpiar_campos($_POST["fecha_nacimiento"]);
    $localidad = limpiar_campos($_POST["localidad"]);

    $linea = "$nombre##$apellido1##$apellido2##$fecha_nacimiento##$localidad\n";

    $fichero = fopen("./ficheros/alumnos2.txt", "a");
    fwrite($fichero, $linea);
    fclose($fichero);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Alumnos</title>
</head>
<body>
    <h2>Formulario de Alumnos</h2>
    <form action="post">
        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br><br>

        <label>Primer Apellido:</label><br>
        <input type="text" name="apellido1" required><br><br>

        <label>Segundo Apellido:</label><br>
        <input type="text" name="apellido2"><br><br>

        <label>Fecha de Nacimiento:</label><br>
        <input type="date" name="fecha_nacimiento" required><br><br>

        <label>Localidad:</label><br>
        <input type="text" name="localidad" required><br><br>

        <input type="submit" value="Guardar Alumno">
    </form>
</body>
</html>
