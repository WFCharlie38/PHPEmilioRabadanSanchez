<?php

$archivo = './ficheros/alumnos1.txt';

$fp = fopen($archivo, 'r');

$contador = 0;

echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr>
        <th>Nombre</th>
        <th>Apellido1</th>
        <th>Apellido2</th>
        <th>Fecha Nacimiento</th>
        <th>Localidad</th>
      </tr>";

while (($linea = fgets($fp)) !== false) {
    $nombre = trim(substr($linea, 0, 40));
    $apellido1 = trim(substr($linea, 40, 41));
    $apellido2 = trim(substr($linea, 81, 42));
    $fecha_nacimiento = trim(substr($linea, 123, 10));
    $localidad = trim(substr($linea, 133, 27));

    echo "<tr>
            <td>$nombre</td>
            <td>$apellido1</td>
            <td>$apellido2</td>
            <td>$fecha_nacimiento</td>
            <td>$localidad</td>
          </tr>";

    $contador++;
}

echo "</table>";
fclose($fp);

echo "<p>Número de filas leídas: $contador</p>";
?>
