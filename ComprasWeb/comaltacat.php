<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alta en categorias en productos</title>
</head>
<body>
    <h1>Alta en categorias en productos</h1>
		<p>Dar de alta categorías en productos<p>
		<div class="card-body">
		<form name="alta" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            Nombre <input type="text" name="nombre">
            <input type="submit" name="submit" value="Añadir">
        </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function limpiar_campos($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }

    $servername = "localhost";
    $username = "root";
    $password = "rootroot";
    $dbname="comprasweb";
    $nombre= limpiar_campos($_POST["nombre"]);
    $codigo=0;

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT MAX(SUBSTR(ID_CATEGORIA, -3)) FROM categoria;");
        $stmt->execute();

        $codigo = $stmt->fetchColumn() +1;
        $codigo = str_pad((string)$codigo, 3, "0", STR_PAD_LEFT);
        $id_cat = "C-" . $codigo;

        $stmt = $conn->prepare("INSERT INTO categoria(ID_CATEGORIA,NOMBRE) VALUES (:id_categoria,:nombre)");
        $stmt->bindParam(':id_categoria', $id_cat);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
}

?>