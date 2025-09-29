<HTML>
<HEAD><TITLE> EJ8A – Crear un array asociativo con los nombres de 5 alumnos y la nota de cada uno de ellos en Bases Datos</TITLE></HEAD>
<BODY>
<?php
$notas = array(
    "Samuel" => 7,
    "Emilio" => 7,
    "Alvaro" => 4,
    "Rizwan" => 5,
    "Martin" => 8
);

arsort($notas);
reset($notas);  

echo "<b>Alumno con mayor nota:</b></br>";    
echo key($notas) . " tiene " . current($notas) . " en Base de Datos.<br>";

end($notas);

echo "</br><b>Alumno con menor nota:</b></br>";
echo key($notas) . " tiene " . current($notas) . " en Base de Datos.<br>";

$media = array_sum($notas) / count($notas);
echo "</br><b>Media de las notas:</b></br>";
echo "$media";
?>
</BODY>
</HTML>