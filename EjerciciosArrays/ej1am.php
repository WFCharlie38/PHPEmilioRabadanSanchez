<HTML>
<HEAD><TITLE> EJ1AM – Crear una matriz de 3x3 con los sucesivos múltiplos de 2</TITLE></HEAD>
<BODY>
<?php
$multiplos = array();
$numero = 2;

for ($i=0; $i < 3; $i++) { 
    for ($j=0; $j < 3; $j++) {
        $multiplos[$i][$j] = $numero;
        $numero+=2;
    }
}

echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>Columna 1</th><th>Columna 2</th><th>Columna 3</th></tr>";
for ($i=0; $i <count($multiplos) ; $i++) {
    echo "<tr>";
    for ($j=0; $j <count($multiplos) ; $j++) {
        echo "<td>" . $multiplos[$i][$j] . "</td>";
    }
    echo "</tr>";
}

?>
</BODY>
</HTML>