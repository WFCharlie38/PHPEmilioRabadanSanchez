<?php

$archivo = './ficheros/alumnos2.txt';

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
    
    $registros = explode("##", $linea);

    echo "<tr>";
    foreach ($registros as $registro) {
        echo "<td>$registro</td>";
    }  
    echo "</tr>";

    $contador++;
}

echo "</table>";
fclose($fp);

echo "<p>Número de filas leídas: $contador</p>";
?>
