<HTML>
<HEAD><TITLE> EJ1B – Conversor decimal a binario</TITLE></HEAD>
<BODY>
<?php
$numOriginal="168";
$num="168";
$binario="";

while ($num>=1) {
    $binario=$num%2 . $binario;
    $num=(int)($num/2);
}

echo "El número $numOriginal convertido a binario es: $binario";

?>
</BODY>
</HTML>