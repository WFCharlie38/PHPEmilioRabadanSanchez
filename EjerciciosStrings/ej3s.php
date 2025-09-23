<HTML>
<HEAD><TITLE> EJ3-Direccion Red – Broadcast y Rango</TITLE></HEAD>
<BODY>
<?php
$ip="192.168.16.100/16";

$p1 = strpos($ip, ".");
$p2 = strpos($ip, ".", $p1 + 1);
$p3 = strpos($ip, ".", $p2 + 1);
$barra = strpos($ip, "/"); 
$mascara = substr($ip, $barra+1, 2);

$byte1 = (int)substr($ip, 0, $p1);
$byte2 = (int)substr($ip, $p1 + 1, $p2 - $p1 - 1);
$byte3 = (int)substr($ip, $p2 + 1, $p3 - $p2 - 1);
$byte4 = (int)substr($ip, $p3 + 1);

$binario = sprintf('%08b%08b%08b%08b', $byte1, $byte2, $byte3, $byte4);
$binarioTrans = (substr($binario,0,32-$mascara));
$binarioRed = str_pad($binarioTrans, 32, "0", STR_PAD_RIGHT);
$binarioBroadcast = str_pad($binarioTrans, 32, "1", STR_PAD_RIGHT);

$red1 = (int)substr($binarioRed, 0, 8);
$red2 = (int)substr($binarioRed, 8, 8);
$red3 = (int)substr($binarioRed, 16, 8);
$red4 = (int)substr($binarioRed, 24, 8);

$direccionRed = sprintf('%d.%d.%d.%d',bindec($red1),bindec($red2),bindec($red3),bindec($red4));
$rango1 = sprintf('%d.%d.%d.%d',bindec($red1),bindec($red2),bindec($red3),bindec($red4)+1);

$broad1 = (int)substr($binarioBroadcast, 0, 8);
$broad2 = (int)substr($binarioBroadcast, 8, 8);
$broad3 = (int)substr($binarioBroadcast, 16, 8);
$broad4 = (int)substr($binarioBroadcast, 24, 8);

$direccionBroadcast = sprintf('%d.%d.%d.%d', bindec($broad1),bindec($broad2),bindec($broad3),bindec($broad4));
$rango2 = sprintf('%d.%d.%d.%d',bindec($broad1),bindec($broad2),bindec($broad3),bindec($broad4)-1);

echo "IP $ip </br>";
echo "MASCARA $mascara </br>";
echo "DIRECCION RED $direccionRed </br>";
echo "DIRECCION BROADCAST $direccionBroadcast </br>";
echo "RANGO $rango1 a $rango2 </br>";
?>
</BODY>
</HTML>