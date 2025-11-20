<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta almacenes</title>
</head>
<body>
    <h1>Alta almacenes</h1>
		<p>Dar de alta almacenes<p>
		<div class="card-body">
		<form name="alta" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            Localidad <input type="text" name="localidad">
            <input type="submit" name="submit" value="Añadir">
        </form>
</body>
</html>
<?php
require_once("./funciones/funciones.php");
require_once("./funciones/fbd.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $localidad= limpiar_campos($_POST["localidad"]);
    $dbname = "comprasweb";
    $codigo=0;

    try {
        $conn = openBD($dbname); 

        $id_almacen = selectCOL($conn,"SELECT MAX(NUM_ALMACEN) FROM almacen") +1;

        $stmt = $conn->prepare("INSERT INTO almacen(NUM_ALMACEN,LOCALIDAD) VALUES (:num_almacen,:localidad)");
        $stmt->bindParam(':num_almacen', $id_almacen);
        $stmt->bindParam(':localidad', $localidad);
        $stmt->execute();

        closeBD($conn);

        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
}

?>