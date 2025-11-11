<?php
require_once ("./dadosfunc.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

   $j1 = limpiar($_POST['jug1']);
   $j2 = limpiar($_POST{'jug2'});
   $j3 = limpiar($_POST{'jug3'});
   $j4 = limpiar($_POST{'jug4'});
   $dados= limpiar($_POST{'numdados'});

   /*Controlo la cantidad de dados ingresados, si se ingresan cantidades no adecuadas, no se ejecuta el código*/
   if ($dados > 1 && $dados < 11 ) {
        $jugadores = generarJugadores($j1,$j2,$j3,$j4);
        repartirDados($dados, $jugadores);
        sumarPuntos($jugadores);
        $ganadores = encontrarGanadores($jugadores);
        mostrarResultado($jugadores, $ganadores);
        $jugadoresOrdenados = ordenarJugadores($jugadores);
        generarFichero($jugadoresOrdenados);     
   }
   else {
    echo "No se ha ingresado una cantidad de dados adecuada (2-10)";
   }

}
?>