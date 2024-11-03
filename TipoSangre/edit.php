<?php
include("C:/wamp64/www/SISTEMAESCOLAR/conexiones/db.php");
include("C:/wamp64/www/SISTEMAESCOLAR/menu/menuVertical2.php");

 if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM tipoSangre WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $grupo = $row['grupo'];
        $rh = $row['rh'];
 }
}
if (isset($_POST['Actualiza'])) {
    $id = $_GET['id'];
    $grupo = $_POST['grupo'];
    $rh = $_POST['rh'];

    $query = "UPDATE tiposangre set grupo = '$grupo', rh = '$rh' WHERE id =$id";
    mysqli_query($conn, $query);
    header("location: tipoSangre.php");
}

?>
<head>
<?php include("C:/wamp64/www/SISTEMAESCOLAR/menu/menuVertical2.php") ?>
</head>
<div class="container p-4">
    <div class="col-md-4 mx-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
                <div class="form-group">
                    <input type="text" name="grupo" value="<?php echo $grupo ?>" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="rh" value="<?php echo $rh ?>" class="form-control">
                </div>
                <button class="btn btn-success" name="Actualiza">
                    Actualizar
                     
                </button>
                <button type="button" class="btn btn-success" onclick="location.href='tipoSangre.php'">Volver</button>
            </form>
        </div>
    </div>
</div>

<?php include ("includes/footer.php") ?>