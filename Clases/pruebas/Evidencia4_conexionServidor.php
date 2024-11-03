<?php
$conn = mysqli_connect(
    'localhost',
    'root',
    '',);
    if ($conn) {
        echo "conexion con servidor establecida<br>";
    }else {
        die('No se pudo establecer la conexión'.mysqli_error());
    }
?>