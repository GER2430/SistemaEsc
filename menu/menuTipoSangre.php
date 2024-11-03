<?php include 'bd.php'?>
<?php
    $conn = baseDeDatos();
    $consulta = "SELECT * FROM tiposangre";
    $resultado = mysqli_query($conn,$consulta);
 
?>
<form method="post" action="tipoSangreAccion.php">
<select name="tipoSangre" class="container__input">
    <option value = "0"> Seleccione un tipo de sangre</option>
    <?php
        while($fila = mysqli_fetch_array($resultado)){
            $id = $fila['id'];
            $grupo = $fila['grupo'];
            $rh = $fila['rh'];
            echo "<option value = $id>$grupo$rh</option>";
        }
?>
</select>
<input type="submit" value="ingresar"/>
</form>
