<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aprovisionar Productos</title>
</head>
<body>
    <h1>Aprovisionar Productos</h1>
		<p>Aprovisionar Productos<p>
		<div class="card-body">
		<form name="alta" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <?php
                require_once("./funciones/funciones.php");
                require_once("./funciones/fbd.php");

                $conn = openBd("comprasweb");
    
                $resultado = selectASSOC($conn, "SELECT NUM_ALMACEN FROM almacen");
                mostrarOpciones($resultado, "NUM_ALMACEN", "Almacen");

                $resultado = selectASSOC($conn,"SELECT ID_PRODUCTO, NOMBRE FROM producto");
                mostrarOpciones($resultado, "ID_PRODUCTO", "Producto", "NOMBRE");

            ?>
            Cantidad <input type="text" name="cantidad">
            <input type="submit" name="submit" value="Añadir">
        </form>
</body>
</html>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad= limpiar_campos($_POST["cantidad"]);

    try {


        closeBD($conn);

        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
}

?>