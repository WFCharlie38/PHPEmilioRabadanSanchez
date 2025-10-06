<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <h1>Calculadora</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label>Primer número:</label>
        <input type="number" name="num1" required><br><br>
        <label>Segundo número:</label>
        <input type="number" name="num2" required><br><br>
        <label>Operación:</label><br>
            <input type="radio" id="suma" name="operacion" value="suma" required>
            <label for="suma">Suma</label><br>

            <input type="radio" id="resta" name="operacion" value="resta">
            <label for="resta">Resta</label><br>

            <input type="radio" id="multiplicacion" name="operacion" value="multiplicacion">
            <label for="multiplicacion">Multiplicación</label><br>

            <input type="radio" id="division" name="operacion" value="division">
            <label for="division">División</label><br><br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $numero1 = $_REQUEST['num1'];
        $numero2 = $_REQUEST['num2'];
        $operacion = $_REQUEST['operacion'];

        $numero1 = limpiar_campos($numero1);
        $numero2 = limpiar_campos($numero2);
        $operacion = limpiar_campos($operacion);

        switch ($operacion) {
            case 'suma':
                sumar($numero1,$numero2);
                break;
            case 'resta':
                restar($numero1,$numero2);
                break;
            case 'multiplicacion':
                multiplicar($numero1,$numero2);
                break;
            case 'division':
                dividir($numero1,$numero2);
                break;
        }
    }

        function limpiar_campos($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function sumar($a,$b) {
            $resultado = $a + $b; 
            echo "<p>Resultado operacion: ",$a," + ",$b," = $resultado</p>";
        }

        function restar($a,$b) {
            $resultado = $a - $b; 
            echo "<p>Resultado operacion: ",$a," - ",$b," = $resultado</p>";
        }

        function multiplicar($a,$b) {
            $resultado = $a * $b; 
            echo "<p>Resultado operacion: ",$a," * ",$b," = $resultado</p>";
        }

        function dividir($a,$b) {
            $resultado = $a / $b; 
            echo "<p>Resultado operacion: ",$a," / ",$b," = $resultado</p>";
        }
    
?>
</body>
</html>