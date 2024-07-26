<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comentario'])) {
    $comentario = htmlspecialchars($_POST['comentario']);
    $username = $_SESSION['username'];
    $date = date('Y-m-d H:i:s');
    $log_entry = "<p><strong>$date</strong> - <em>$username</em>: $comentario</p>\n";

    $resource = fopen("comentarios.html", "a");
    if ($resource === false) {
        die("Error al abrir el archivo comentarios.html para escribir.");
    }

    fwrite($resource, $log_entry);
    fclose($resource);

    header('Location: products.php?success=true');
    exit();
} else {
    header('Location: products.php');
    exit();
}
