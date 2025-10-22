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

    function ajustarCampo($texto, $longitud) {
        $texto = substr($texto, 0, $longitud);
        return str_pad($texto, $longitud, " ");
    }

    $linea = ajustarCampo($nombre, 40)
            . ajustarCampo($apellido1, 41)
            . ajustarCampo($apellido2, 42)
            . ajustarCampo($fecha_nacimiento, 10)
            . ajustarCampo($localidad, 27)
            . "\n";

    $fichero = fopen("./ficheros/alumnos1.txt", "a");
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
    <form method="post">
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
