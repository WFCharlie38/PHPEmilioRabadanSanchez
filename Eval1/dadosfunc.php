<?php

/*Recibe un dato y limpia el dato para evitar inyección de código*/
function limpiar($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/*Recibe los nombres de los jugadores, con esta información, crea un array de jugadores y lo devuelve*/
function generarJugadores($j1, $j2 ,$j3, $j4) {
    for ($i=1; $i < 5; $i++) { 
        $jugadores[] = ${"jugador$i"} = array('nombre' => ${"j$i"}, 'dados' => array(), 'puntos' => 0);
    }

    $jugadores[] = $banca = array('nombre' => "banca", 'dados' => array(), 'puntos' => 0);
    
    return $jugadores;
}

/*Recibe la cantidad de dados y los jugadores, se le asigna a cada uno de los jugadores los dados correspodientes*/
function repartirDados($dados, &$jugadores) {
    foreach ($jugadores as &$jugador) {
        for ($i=0; $i < $dados; $i++) {
            $dado = random_int(1,6);
            array_push($jugador['dados'],$dado);
        }
    }
}

/*Recibe los jugadores, se suma la cantidad de puntuación de cada jugador y se le asigna, 
controlando la excpeción de que saque los mismos dados y depediendo también si este es el jugador o la banca*/
function sumarPuntos(&$jugadores) {
    foreach ($jugadores as &$jugador) {
        $puntuacion = 0;
        foreach ($jugador['dados'] as $dado) {
            $puntuacion+=$dado;
        }
        $repeticiones = array_count_values($jugador['dados']);
        $repeticiones = array_values($repeticiones);
        if (count($repeticiones) == 1) {
            if ($jugador['nombre'] == "banca") {
                $puntuacion = 100;
            }
            else {
                $puntuacion = $puntuacion * ($repeticiones[0]);
            }
        }
        $jugador['puntos'] = $puntuacion;
    }
}

/*Recibe jugadores, identifica quien/es han sacado mayor puntuacion, crea el array con los ganadores y lo devuelve*/
function encontrarGanadores($jugadores) {
    $ganadores = array();
    $puntos = array();

    foreach ($jugadores as $jugador) {
            array_push($puntos, $jugador['puntos']);
    }

    $maxValor=max($puntos);

    foreach ($jugadores as $jugador) {
        if ($jugador['puntos']==$maxValor){
            array_push($ganadores, $jugador);
        }
    }

    return $ganadores;
}

/*Recibe jugadores y ganadores, utiliza la información para imprimir por pantalla una tabla con los jugadores y sus respectivos dados, tambien imprime las puntuaciones y los ganadores*/
function mostrarResultado($jugadores, $ganadores) {
    echo "<table border='1' cellpadding='5'>";

    foreach ($jugadores as $jugador) {
        echo "<tr>";
        echo "<td>" . $jugador['nombre'] . "</td>";
        foreach ($jugador['dados'] as $dado) {
            $ruta = "./images/" . $dado . ".PNG";
            echo "<td><img src='$ruta' alt='$dado' width='80' height='120'></td>";
        }
    }
    echo "<b>RESULTADO JUEGO DADOS</br></br></b>";

    foreach ($jugadores as $jugador) {
        echo $jugador['nombre'] . ' = ' . $jugador['puntos'] . "</br>";   
    }
    
    echo "</br>";

    foreach ($ganadores as $ganador) {
        echo "<b>Ganador: </b>" . $ganador['nombre'] . "</br>";   
    }
    
    echo "<b>Total jugadores ganadores: </b>" . count($ganadores);

    echo "</br>";
    echo "</br>";
}

/*Recibe jugadores, y genera el fichero con los nombres de los jugadores, sus puntuaciones y sus dados*/
function generarFichero($jugadores) {
    $archivo = "";

    foreach ($jugadores as $jugador) {
        $archivo .= $jugador['nombre'] . '#' . $jugador['puntos'];
        foreach ($jugador['dados'] as $dado) {
            $archivo .= '#' . $dado;
        }
        $archivo .= "\n";
    }
        
    $f1 = fopen("./resultados.txt", "w+");
    fwrite($f1, $archivo);
    fclose($f1);
}

/*Recibe jugadores, saca los puntos de cada jugador en un array puntos, este se utiliza para indexar los jugadores en orden en el array jugadoresOrdenados y lo devuelve*/
function ordenarJugadores($jugadores) {
    $puntos = array();
    $jugadoresOrdenados = array();

    foreach ($jugadores as $jugador) {
        array_push($puntos,$jugador['puntos']);
    }
    
    rsort($puntos);

    do {
        foreach ($jugadores as $jugador) {
            $posicion = count($jugadoresOrdenados);
            if ($posicion < 5) {
                if ($jugador['puntos'] == $puntos[$posicion]) {
                    array_push($jugadoresOrdenados, $jugador);
                    unset($puntos[$posicion]);
                }
            }
        }
    } while (count($puntos) > 0);
    
    return $jugadoresOrdenados;
}
?>