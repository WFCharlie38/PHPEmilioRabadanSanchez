<HTML>
<HEAD><TITLE> EJ2B – Conversor Decimal a base n </TITLE></HEAD>
<BODY>
<?php
$numOriginal="48";
$num="48";
$base="8";
$resultado="";

while ($num>=1) {
    $resultado=$num%$base . $resultado;
    $num=(int)($num/$base);
}

echo "El número $numOriginal en base $base es: $resultado";

?>
</BODY>
</HTML>