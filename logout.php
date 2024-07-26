<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
    $login_time = $_SESSION['login_time'];
    $logout_time = time();
    $duration = ($logout_time - $login_time) / 60;

    $date = date('Y-m-d H:i:s', $login_time);
    $log_entry = "Fecha y Hora: $date, Usuario: $username, Duración: " . round($duration, 2) . " minutos\n";
    $resource=fopen("accesos.txt", "a");
    fwrite($resource, $log_entry);

}

session_destroy();
header('Location: login.php');
exit();
