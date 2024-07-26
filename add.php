<?php
session_start();
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
    <h1>Agregar producto</h1>
    <div class="admin">
        <ul>
            <li>
              <a href="./admin.php"><button>Volver al inicio</button></a>
            </li>
            <li>
                <form method="post">
                    <input type="hidden" name="altaEmpleado">
                    Codigo:<input type="text" name="code" required><br>
                    Descripcion:<input type="text" name="description" required><br>
                    Precio:<input type="number" name="price" required><br>
                    <input type="submit" value="Agregar">
                </form>
            </li>
        </ul>
    </div>
    <?php
    require_once "connect.php";
    $con = conectar();

    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST["code"])) {
        $price = mysqli_real_escape_string($con, $_POST["price"]);
        $description = mysqli_real_escape_string($con, $_POST["description"]);
        $code = mysqli_real_escape_string($con, $_POST["code"]);

        $sql = "INSERT INTO productos (Prod_Descripcion, Prod_Codigo, Prod_Precio) VALUES ('$description', '$code', '$price');";
        
        mysqli_query($con, $sql);

        if (mysqli_affected_rows($con) > 0) {
            echo "El articulo fue cargado con éxito";
        } else {
            echo "No se pudo cargar el articulo";
        }
    }
    ?>
</body>
</html>
