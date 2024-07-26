<?php
require_once "connect.php";
session_start();
$con = conectar();
mysqli_set_charset($con, "utf8");

if(isset($_GET["buscado"]) && isset($_GET["op"])) {       
    $query = mysqli_real_escape_string($con, $_GET['buscado']);
    $option = $_GET["op"];
    if($option == "descripcion") {
        $sql = "SELECT * FROM productos WHERE Prod_Descripcion LIKE '%$query%'";
        $data = mysqli_query($con, $sql);
        $register = mysqli_fetch_assoc($data);
    }
    elseif ($option == "codigo") {
        $sql = "SELECT * FROM productos WHERE Prod_Codigo = '$query'";
        $data = mysqli_query($con, $sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>Lista de productos</h1>
    <div class="admin">
        <ul>
            <li>
                <a href="./admin.php"><button>Volver al inicio</button></a>
            </li>
        </ul>
        <section>
        </section>
    </div>
    <?php
        while ($register = mysqli_fetch_assoc($data)) {
            echo "<div class='producto'>";
            echo "<h3>{$register['Prod_Descripcion']}</h3>";
            echo "<h4>Código: {$register['Prod_Codigo']}</h4>";
            echo "<p><strong>Precio: \${$register['Prod_Precio']}</strong></p>";
            echo "</div>";
        }
    ?>
</body>
</html>
