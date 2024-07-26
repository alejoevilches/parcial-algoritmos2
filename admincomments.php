<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Comentarios</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>Comentarios de Empleados</h1>
    <div class="comments">
        <?php
        $filename = "comentarios.html";
        if (file_exists($filename)) {
            $comments = file_get_contents($filename);
            $comments = str_replace('<em>', '<em style="color: red;">', $comments);
            echo $comments;
        } else {
            echo "<p>No hay comentarios.</p>";
        }
        ?>
    </div>
    <a href="admin.php"><button>Volver</button></a>
</body>
</html>