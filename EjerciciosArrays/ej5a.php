<HTML>
<HEAD><TITLE> EJ5A – Unir los 3 arrays sin funciones, con merge y con push</TITLE></HEAD>
<BODY>
<?php
$asignaturas1=["Bases Datos", "Entornos Desarrollo", "Programación"];
$asignaturas2=["Sistemas Informáticos","FOL","Mecanizado"];
$asignaturas3=["Desarrollo Web ES","Desarrollo Web EC","Despliegue","Desarrollo Interfaces", "Inglés"];
$unionA=[];
$unionB=[];
$unionC=[];
$contador=0;

for ($i=0; $i < count($asignaturas1) ; $i++) {
    $unionA[$contador]=$asignaturas1[$i];
    $contador++;
}
for ($i=0; $i < count($asignaturas2) ; $i++) {
    $unionA[$contador]=$asignaturas2[$i];
    $contador++;
}
for ($i=0; $i < count($asignaturas3) ; $i++) {
    $unionA[$contador]=$asignaturas3[$i];
    $contador++;
}

$unionB = array_merge($asignaturas1, $asignaturas2, $asignaturas3);

array_push($unionC, ...$asignaturas1, ...$asignaturas2, ...$asignaturas3);

echo "UNION A: "; 
print_r($unionA);
echo "</br>UNION B: "; 
print_r($unionB);
echo "</br>UNION C: "; 
print_r($unionC);
?>
</BODY>
</HTML>