<?php include("menu/menuVertical2.php");
 include("includes/header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="menu/menuVertical2.css">
    <link rel="stylesheet" href="indexStyle.css">
    
    
    
</head>
<body>
<?php include("Login2/logout.php");?>
<?php
    if (isset($_SESSION['nombreUsuario'])) {
        $usuario = $_SESSION['nombreUsuario'];
        echo "<h1> usuario conectado: $usuario</h1> ";
 }
    
?>


</body>
</html>

