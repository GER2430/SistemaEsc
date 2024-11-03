<?php 
include 'conexionServidor.php';
$conn2= mysqli_select_db($conn,'SISTEMAESCOLAR');
if ($conn2) {
    echo "conexion con la BD establecida";
} else {
    die('No se pudo establecer la conexión con la BD'.mysqli_error());
}
?>