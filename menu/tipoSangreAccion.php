<?php include 'bd.php';

if(isset($_POST['tipoSangre'])){
    $claveTipoSangre = $_POST['tipoSangre'];
    $conn = baseDeDatos();
    $consulta = "SELECT grupo, rh FROM tipoSangre WHERE id = '$claveTipoSangre'";
    $result = mysqli_query($conn, $consulta);

    while ($fila = mysqli_fetch_array($result)) {
        if(strcmp($claveTipoSangre, $fila['grupo'])){
        echo "Tipo de sangre seleccionado: ".$fila['grupo'];
        echo $fila['rh'];
        }
    }
}
?>
<br>
<br>
<form class="container__form" action="#" method="POST">
    <label class="container__label">Tipo de Sangre:</label>
    <select name="tipoSangre" class="container__input">
    <?php
        $consulta = "SELECT * FROM tiposangre";
        $result = mysqli_query($conn,$consulta);
        while($fila = mysqli_fetch_array($result)) {
            $selected = ($fila['id']==$_POST['tipoSangre'] ) ? 'selected="selected"':'';
            echo '<option '.$selected.'value="'.$fila["id"].'">'.$fila["grupo"] .$fila["rh"].'</option>';
        }
    ?>
    </select>
    <input type="submit" value="ingresar"/>
</form>
