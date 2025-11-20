<?php
function openBD($bdname) {
    $conn = new PDO("mysql:host=localhost;dbname=$bdname","root", "rootroot");
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    return $conn;
}

function closeBD(&$conn) {
    $conn = null;
}

function select($conn, $sentencia) {
    $stmt = $conn->prepare("$sentencia");
    $stmt->execute();
    return $stmt;
}

/*function insert($conn, $tabla, $valores, $sentencia) {
    $stmt = select($conn, "DESCRIBE $tabla");
    $campos = $stmt->fetchAll(PDO::FETCH_COLUMN);
    $stmt = $conn->prepare("$sentencia");
    foreach($campos as $campo) {
        $stmt->bindParam(":'" . $campo ."'", $descripcion);
    }
    $stmt->execute();
}*/
?>