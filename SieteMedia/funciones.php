<?php


function extraer_carta(&$baraja, &$jugador) {
    $carta = array_rand($baraja);
    $jugador[$carta] = $baraja[$carta];
    unset($baraja[$carta]);
}

function contarMano(&$jugador) {
    $mano=0;
    foreach ($jugador as $valor) {
        $mano += $valor;
    };
    return $mano;    
}

function extraerInciales($nombre) {
    $iniciales = "";
    $nombre_apellido =  preg_split('/\s+/', trim($nombre));
    $iniciales .= $nombre_apellido[0][0];
    $iniciales .= $nombre_apellido[1][0];
    return strtoupper($iniciales);
}

function extraerGanadores($manos) {
    $ganadores = array();

    $ganadores = array_filter($manos, function($n) {
        return $n <= 7.5;
    });
    if (!empty($ganadores)) {
        $maximo = max($ganadores);
        $ganadores = array_filter($manos, function($n) use ($maximo) {
            return $n == $maximo;
        });
    }
    
    return $ganadores;
}

function mostrarCartas($n1,$n2,$n3,$n4,$j1,$j2,$j3,$j4) {
    
    echo "<table border='1' cellpadding='5'>";

    // Jugador 1
    echo "<tr>";
    echo "<td>$n1</td>";
    foreach($j1 as $carta => $valor){
        $ruta = "./images/" . $carta . ".png";  
        echo "<td><img src='$ruta' alt='$carta' width='80' height='120'></td>";
    }
    echo "</tr>";

    // Jugador 2
    echo "<tr>";
    echo "<td>$n2</td>";
    foreach($j2 as $carta => $valor){
        $ruta = "./images/" . $carta . ".png"; 
        echo "<td><img src='$ruta' alt='$carta' width='80' height='120'></td>";
    }
    echo "</tr>";

    // Jugador 3
    echo "<tr>";
    echo "<td>$n3</td>";
    foreach($j3 as $carta => $valor){
        $ruta = "./images/" . $carta . ".png"; 
        echo "<td><img src='$ruta' alt='$carta' width='80' height='120'></td>";
    }
    echo "</tr>";

    // Jugador 4
    echo "<tr>";
    echo "<td>$n4</td>";
    foreach($j4 as $carta => $valor){
        $ruta = "./images/" . $carta . ".png"; 
        echo "<td><img src='$ruta' alt='$carta' width='80' height='120'></td>";
    }
    echo "</tr>";

    echo "</table>";
}

function mostrarGanadores($apuesta, $ganadores) {
    if (!empty($ganadores)) {
        $puntuacion = max($ganadores);
    }

    if (empty($ganadores)) {
        echo "No hay ganadores la casa se queda con todo";
        $premio = 0;
    }
    elseif ($puntuacion == 7.5) {
        if (count($ganadores) > 1) {
            foreach ($ganadores as $jugador => $puntuacion) {
                echo "$jugador ";
            }
            echo "han ganado con una puntuación de $puntuacion";
        }
        else {
            $nombreGanador = array_keys($ganadores)[0];
            echo " $nombreGanador ha ganado la partida con una puntuación de  $puntuacion";
        }
        $premio = $apuesta * 0.8;
        echo "</br>Los ganadores han obtenido $premio$ de premio";
    }
    else {
        if (count($ganadores) > 1) {
            foreach ($ganadores as $jugador => $puntuacion) {
                echo "$jugador ";
            }
            echo "han ganado con una puntuación de $puntuacion";
        }
        else {
            $nombreGanador = array_keys($ganadores)[0];
            echo " $nombreGanador ha ganado la partida con una puntuación de  $puntuacion";
        }
        $premio = $apuesta * 0.5;
        echo "</br>Los ganadores han obtenido $premio$ de premio";
    }

    return $premio;
}

function generarFichero($iniciales, $ganadores, $premio) {
    $fecha = date("d-m-Y-H-i-s");
    if (!empty($ganadores)) {
        $repartido = $premio / count($ganadores);
    }
    else {
        $repartido = 0;
    }
    $premios = count($ganadores);
    $iniciales_ganadores = array_map('extraerInciales', array_keys($ganadores));
    $archivo = "";
    
    foreach ($iniciales as $inicial => $puntuacion) {

        if (in_array($inicial,$iniciales_ganadores)) {
            $dinero = $repartido;
        }
        else {
            $dinero = 0;
        }        
        $archivo .= "$inicial#$puntuacion#$dinero\n";
    }

    $archivo .= "TOTALPREMIOS#$premios#$repartido";

    $fichero = fopen("./ficheros/$fecha.txt", "a+");
    fwrite($fichero, $archivo);
    fclose($fichero);
}

function limpiar_campos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>