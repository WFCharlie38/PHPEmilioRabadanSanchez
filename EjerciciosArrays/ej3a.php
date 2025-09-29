<HTML>
<HEAD><TITLE> EJ3A – Definir un array y almacenar los 20 primeros números binarios</TITLE></HEAD>
<BODY>
<?php
$binarios=[];
$octales=[];
for ($i=0; $i <20 ; $i++) {
    $binarios[$i]=decbin($i);
    $octales[$i]=decoct($i);
}
echo "<h2>Tabla de Impares</h2>";
echo "<table border='1' cellpadding='6' cellspacing='0'>";
echo "<tr><th>Indice</th><th>Binario</th><th>Octal</th></tr>";
for ($i=0; $i <count($binarios) ; $i++) {
    echo "<tr>";
    echo "<td>$i</td>";
    echo "<td>$binarios[$i]</td>";
    echo "<td>$octales[$i]</td>";
    echo "</tr>";
}
echo "</table>";
?>
</BODY>
</HTML>