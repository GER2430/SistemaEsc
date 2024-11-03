<?php

include "/SISTEMAESCOLAR/conexiones/db.php";

if (isset($_POST['saveType'])){
    $tipo = $_POST['tipo'];
    

    $query = "INSERT INTO tiposangre(tipo) VALUES ('$tipo')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }
    
    header("Location: tipoSangre.php");
}

?>