<?php

include("C:/wamp64/www/SISTEMAESCOLAR/conexiones/db.php");

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tipoSangre WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }

    header("Location: tipoSangre.php");
 }

?>