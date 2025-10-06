<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Conversor Binario</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Número Decimal:</label>
        <input type="number" name="decimal" required><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $decimal = $_REQUEST['decimal'];

        $decimal = limpiar_campos($decimal);

        $binario = convertirDecimalBinario($decimal);
    }

    function limpiar_campos($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    
    function convertirDecimalBinario($decimal) {
        $binario = decbin($decimal);
        echo "<p>Resultado: $binario</p>";
    }
?>
</body>
</html>