<?php
function baseDeDatos(){
$servidor = "localhost";
$usuario = "root";
$password = "";
$db = "sistemaescolar";
$conn = mysqli_connect($servidor,$usuario,$password,$db) or die(mysqli_error());
return $conn;
}
?>