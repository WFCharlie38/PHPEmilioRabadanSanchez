<?php
$decimal = $_REQUEST['decimal'];
$base = $_REQUEST['base'];

$decimal= limpiar_campos($decimal);
$base = limpiar_campos($base);

echo "<h1>Conversor Númerico</h1>";

echo "<label>Número Decimal:</label>";
echo "<input type='number' name='decimal' value='$decimal' required><br><br>";

switch ($base) {
    case 'binario':
        binario($decimal);
        break;
    case 'octal':
        octal($decimal);
        break;
    case 'hexa':
        hexa($decimal);
        break;
    case 'todos':
        todos($decimal);
        break;
}

function limpiar_campos($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function binario($decimal) {
    $binario = decbin($decimal);
    echo "
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <td>Binario</td>
            <td>$binario</td>
        </tr>
    </table>
    ";
}

function octal($decimal) {
    $octal = decoct($decimal);
    echo "
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <td>Octal</td>
            <td>$octal</td>
        </tr>
    </table>
    ";
}

function hexa($decimal) {
    $hex = dechex($decimal);
    echo "
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <td>Hexadecimal</td>
            <td>$hex</td>
        </tr>
    </table>
    ";
}

function todos($decimal) {
    $binario = decbin($decimal);
    $octal = decoct($decimal);
    $hex = dechex($decimal);
    echo "
    <table border='1' cellpadding='5' cellspacing='0'>
        <tr>
            <td>Binario</td>
            <td>$binario</td>
        </tr>
        <tr>
            <td>Octal</td>
            <td>$octal</td>
        </tr>
        <tr>
            <td>Hexadecimal</td>
            <td>$hex</td>
        </tr>
    </table>
    ";
}
?>