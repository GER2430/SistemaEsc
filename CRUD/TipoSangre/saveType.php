<?php

include("C:\wamp64\www\SISTEMAESCOLAR\conexiones\conexionBd.php");

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

<div class="container p-4">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body">
                <form action="saveType.php" method="post">
                    <div class="form-group">
                        <input type="text" name="tipo" class="form-control">
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="saveType" value="Guardar">
                </form>
            </div>
        </div>
    </div>
</div>