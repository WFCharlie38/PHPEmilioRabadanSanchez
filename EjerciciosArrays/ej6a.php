<HTML>
<HEAD><TITLE> EJ6A – Mostrar el array resultante del ejercicio anterior en orden inverso</TITLE></HEAD>
<BODY>
<?php
$asignaturas1=["Bases Datos", "Entornos Desarrollo", "Programación"];
$asignaturas2=["Sistemas Informáticos","FOL","Mecanizado"];
$asignaturas3=["Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés"];
$unionA=[];
$unionB=[];
$contador=0;
$eliminar;

$unionA = array_merge($asignaturas1, $asignaturas2, $asignaturas3);

$unionB = array_merge($asignaturas1, $asignaturas2, $asignaturas3);

$eliminar = array_search("Mecanizado", $unionB);

unset($unionB[$eliminar]);

$unionB = array_values($unionB);

$unionB = array_reverse($unionB);

echo "UNION A: "; 
print_r($unionA);
echo "</br>UNION B: "; 
print_r($unionB);
?>
</BODY>
</HTML>