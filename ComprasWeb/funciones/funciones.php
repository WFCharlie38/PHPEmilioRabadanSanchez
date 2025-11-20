<?php
function limpiar_campos($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;  
}

function mostrarOpciones($resultado, $clave, $etiqueta, $opcion = null) {
    if ($opcion === null) {
        $opcion = $clave;
    }
    
    echo "<label for='almacen'>" . $etiqueta . ":</label>";
    echo "<select id='" . $etiqueta . "' name='" . $etiqueta . "'>";
    foreach($resultado as $row) {
        echo "<option value='" . $row[$clave] . "'>" . $row[$opcion] . "</option>";
    }
    echo "</select>";
}
?>