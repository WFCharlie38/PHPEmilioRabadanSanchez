<?php
$decimal = $_REQUEST['decimal'];

$decimal = limpiar_campos($decimal);

function limpiar_campos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

echo "<h1>Conversor Binario</h1>";

$binario = convertirDecimalBinario($decimal);

function convertirDecimalBinario($decimal) {
    $binario = decbin($decimal);
    echo "<p>Resultado: $binario</p>";
}

?>