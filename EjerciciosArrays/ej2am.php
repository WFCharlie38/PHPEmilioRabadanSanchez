<HTML>
<HEAD><TITLE> EJ2AM – Modificar el ejemplo anterior ejercicio anterior para mostrar la suma de los elementos por filas y por columnas.</TITLE></HEAD>
<BODY>
<?php
$multiplos = array();
$numero = 2;
$sumasFilas = array();
$sumaFila;
$sumasColumnas = array();
$sumaColumna;

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

for ($i=0; $i < 3; $i++) { 
    $sumaFila = 0;
    $sumaColumna = 0;
    for ($j=0; $j < 3; $j++) {
        $sumaFila += $multiplos[$i][$j];
        $sumaColumna += $multiplos[$j][$i];
    }
    $sumasFilas[$i] = $sumaFila;
    $sumasColumnas[$i] = $sumaColumna;  
}

echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>Suma Columna 1</th><th>Suma Columna 2</th><th>Suma Columna 3</th></tr>";
for ($i=0; $i <count($sumasColumnas) ; $i++) {
    echo "<td>" . $sumasColumnas[$i] . "</td>";
}

echo "<table border='1' cellpadding='6' cellspacing='0'>";
for ($i=0; $i <count($sumasFilas) ; $i++) {
    echo "<tr>";
    echo "<th>Suma Fila " . ($i+1) . "</th>";
    echo "<td>" . $sumasFilas[$i] . "</td>";
    echo "</tr>";
}

?>
</BODY>
</HTML>