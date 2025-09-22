<HTML>
<HEAD><TITLE> EJ2-Direccion Red – Broadcast y Rango</TITLE></HEAD>
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

$binario = sprintf('%08bd.%08b.%08bd.%08b', $byte1, $byte2, $byte2, $byte4);
$binarioTrans = (substr($binario,0,32-$mascara+1));
$binarioRed = str_pad($binarioTrans, 32, "1", STR_PAD_RIGHT);
$binarioBroadcast = str_pad($binarioTrans, 32, "0", STR_PAD_RIGHT);

$red1 = (int)substr($binarioRed, 0, 7);
$red2 = (int)substr($binarioRed, 8, 15);
$red3 = (int)substr($binarioRed, 16, 23);
$red4 = (int)substr($binarioRed, 24, 31);

$direccionRed = sprintf('%d.%d.%d.%d', $red1, $red2, $red3, $red4);

$red1 = (int)substr($binarioRed, 0, 7);
$red2 = (int)substr($binarioRed, 8, 15);
$red3 = (int)substr($binarioRed, 16, 23);
$red4 = (int)substr($binarioRed, 24, 31);

$direccionBroadcast = ;

$rango1 = ;
$rango2 = ;

echo "IP $ip </br>";
echo "MASCARA $mascara </br>";
echo "DIRECCION RED $direccionRed </br>";
echo "DIRECCION BROADCAST $direccionBroadcast </br>";
echo "RANGO $rango1 a $rango2 </br>";
?>
</BODY>
</HTML>