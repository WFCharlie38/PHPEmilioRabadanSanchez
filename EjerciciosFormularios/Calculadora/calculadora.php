<?php
$numero1 = $_REQUEST['num1'];
$numero2 = $_REQUEST['num2'];
$operacion = $_REQUEST['operacion'];

$numero1 = limpiar_campos($numero1);
$numero2 = limpiar_campos($numero2);
$operacion = limpiar_campos($operacion);

echo "<h1>Calculadora</h1>";

switch ($operacion) {
    case 'suma':
        sumar($numero1,$numero2);
        break;
    case 'resta':
        restar($numero1,$numero2);
        break;
    case 'multiplicacion':
        multiplicar($numero1,$numero2);
        break;
    case 'division':
        dividir($numero1,$numero2);
        break;
}


function limpiar_campos($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function sumar($a,$b) {
    $resultado = $a + $b; 
    echo "Resultado operacion: ",$a," + ",$b," = $resultado";
}

function restar($a,$b) {
    $resultado = $a - $b; 
    echo "Resultado operacion: ",$a," - ",$b," = $resultado";
}

function multiplicar($a,$b) {
    $resultado = $a * $b; 
    echo "Resultado operacion: ",$a," * ",$b," = $resultado";
}

function dividir($a,$b) {
    $resultado = $a / $b; 
    echo "Resultado operacion: ",$a," / ",$b," = $resultado";
}

?>