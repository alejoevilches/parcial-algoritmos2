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
    <title>Administrador</title>
    <link href="styles.css" rel="stylesheet">
</head>
<body>
    <h1>Pagina de Administrador</h1>
    <div class="admin">
        <ul>
            <li>
                <a href="./add.php"><button>Ingresar Productos</button></a>
            </li>   
            <li>    
                <form action="./search.php" method="get">
                    <input type="text" name="buscado" required>
                    <input type="radio" name="op" value="codigo" required>Código
                    <input type="radio" name="op" value="descripcion" required>Descripción
                    <input type="submit" value="Buscar">
                </form>
            </li>
            <li>
                <a href="./products.php"><button>Lista de Productos</button></a>
            </li>
            <li>
                <a href="./admincomments.php"><button>Ver Comentarios</button></a>
            </li>
        </ul>
    </div>
    <div style="position: absolute; top: 10px; right: 10px;">
        <span><?php echo "Bienvenido, " . $_SESSION['username']; ?></span>
        <a href="logout.php"><button>Cerrar Sesión</button></a>
    </div>
</body>
</html>