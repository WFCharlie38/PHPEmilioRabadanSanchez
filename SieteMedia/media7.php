<?php
require_once ("./funciones.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre1 = limpiar_campos($_POST["nombre1"]);
    $nombre2 = limpiar_campos($_POST["nombre2"]);
    $nombre3 = limpiar_campos($_POST["nombre3"]);
    $nombre4 = limpiar_campos($_POST["nombre4"]);
    $cartas = (int)limpiar_campos($_POST["numcartas"]);
    $apuesta = limpiar_campos($_POST["apuesta"]);

    $baraja = array(
            '1C' => 1, '2C' => 2, '3C' => 3, '4C' => 4, '5C' => 5, '6C' => 6, '7C' => 7, 'JC' => 0.5, 'QC' => 0.5, 'KC' => 0.5,
            '1P' => 1, '2P' => 2, '3P' => 3, '4P' => 4, '5P' => 5, '6P' => 6, '7P' => 7, 'JP' => 0.5, 'QP' => 0.5, 'KP' => 0.5,
            '1D' => 1, '2D' => 2, '3D' => 3, '4D' => 4, '5D' => 5, '6D' => 6, '7D' => 7, 'JD' => 0.5, 'QD' => 0.5, 'KD' => 0.5,
            '1T' => 1, '2T' => 2, '3T' => 3, '4T' => 4, '5T' => 5, '6T' => 6, '7T' => 7, 'JT' => 0.5, 'QT' => 0.5, 'KT' => 0.5
    );

    $jugador1 = array();
    $jugador2 = array();
    $jugador3 = array();
    $jugador4 = array();


    for ($i=0; $i < $cartas; $i++) { 
        extraer_carta($baraja,$jugador1);
    };
    for ($i=0; $i < $cartas; $i++) { 
        extraer_carta($baraja,$jugador2);
    };
    for ($i=0; $i < $cartas; $i++) { 
        extraer_carta($baraja,$jugador3);
    };
    for ($i=0; $i < $cartas; $i++) { 
        extraer_carta($baraja,$jugador4);
    };

    $manos = array(
        $nombre1 => contarMano($jugador1),
        $nombre2 => contarMano($jugador2),
        $nombre3 => contarMano($jugador3),
        $nombre4 => contarMano($jugador4)
    );

    $ganadores = extraerGanadores($manos);

    mostrarGanadores($apuesta, $ganadores);
    mostrarCartas($nombre1,$nombre2,$nombre3,$nombre4,$jugador1,$jugador2,$jugador3,$jugador4);


}


?>