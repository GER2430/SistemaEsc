<?php
 include("../../conexiones/conexionBd.php");

 if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tipoSangre WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $tipo = $row['tipo'];
 }
}
if (isset($_POST['Actualiza'])) {
    $id = $_GET['id'];
    $tipo = $_POST['tipo'];

    $query = "UPDATE tiposangre set tipo = '$tipo' WHERE id = $id";
    mysqli_query($conn, $query);
    header("location: tipoSangre.php");
}

?>
<head>

</head>
<div class="container p-4">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                <div class="form-group">
                    <input type="text" name="tipo" value="<?php echo $tipo ?>" class="form-control">
                </div>
                <button class="btn btn-success" name="Actualiza">
                    Actualizar
                     
                </button>
                <button type="button" class="btn btn-success" onclick="location.href='tipoSangre.php'">Volver</button>
            </form>
        </div>
    </div>
</div>

