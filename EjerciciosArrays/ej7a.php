<HTML>
<HEAD><TITLE> EJ7A – Crear un array asociativo con los nombres de 5 alumnos y la edad de cada uno de ellos</TITLE></HEAD>
<BODY>
<?php
$alumnos = array(
    "Samuel" => 28,
    "Emilio" => 18,
    "Alvaro" => 19,
    "Rizwan" => 40,
    "Carlos" => 20
);

echo "<b>Imprimo el array con un bucle foreach:</b></br>";      
foreach ($alumnos as $alumno => $edad) {
    echo "$alumno $edad </br>";
}

reset($alumnos);

next($alumnos);

echo "</br><b>Avanzo a la segunda posición:</b></br>";         
echo key($alumnos) . " tiene " . current($alumnos) . " años.<br>";

next($alumnos);

echo "</br><b>Avanzo una posición:</b></br>";       
echo key($alumnos) . " tiene " . current($alumnos) . " años.<br>";

end($alumnos);

echo "</br><b>Avanzo a la última posición:</b></br>";       
echo key($alumnos) . " tiene " . current($alumnos) . " años.<br>";

echo "</br><b>Ordeno el array por edades</b></br>";     
asort($alumnos);
reset($alumnos);

echo "</br><b>Imprimo la primera posición:</b></br>";       
echo key($alumnos) . " tiene " . current($alumnos) . " años.<br>";
end($alumnos);
echo "</br><b>Imprimo la última posición:</b></br>";       
echo key($alumnos) . " tiene " . current($alumnos) . " años.<br>";
?>
</BODY>
</HTML>