<?php
require_once "connect.php";
session_start();
$con = conectar();
mysqli_set_charset($con, "utf8");
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
            <?php
            $sql = "SELECT * FROM productos;";
            $data = mysqli_query($con, $sql);

            while ($register = mysqli_fetch_assoc($data)) {
                echo "<div class='producto'>";
                echo "<h3>{$register['Prod_Descripcion']}</h3>";
                echo "<h4>Código: {$register['Prod_Codigo']}</h4>";
                echo "<p><strong>Precio: \${$register['Prod_Precio']}</strong></p>";
                echo "</div>";
            }
            ?>
        </section>
    </div>
    <div class="comment-form">
        <h2>Enviar Comentario al Administrador</h2>
        <form action="comentarios.php" method="post">
            <textarea name="comentario" rows="4" cols="50" required></textarea><br>
            <input type="submit" value="Enviar Comentario">
        </form>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 'true') {
            echo "<p style='color: green;'>Mensaje enviado</p>";
        }
        ?>
    </div>
</body>
</html>