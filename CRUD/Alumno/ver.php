<?php include("..\..\Conexiones\conexionBd.php")?>
<?php include("..\..\inicio.php")?>
<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "SELECT alumnos.id, alumnos.nombre, alumnos.pApellido, alumnos.sApellido,
    alumnos.curp, alumnos.rfc, sexo.sexo, tiposangre.tipo, alumnos.fechaNacimiento,
    alumnos.municipio, alumnos.colonia, alumnos.calle, alumnos.numExterior,
    alumnos.codPostal, alumnos.email, alumnos.numTelefono, alumnos.nombreTutor,
    alumnos.pApellidoTutor, alumnos.sApellidoTutor, alumnos.telTutor, carrera.carrera, estado.estado, parentesco.parentesco FROM alumnos 
    INNER JOIN carrera ON alumnos.carrera = carrera.id INNER JOIN sexo ON alumnos.sexo = sexo.id
    INNER JOIN estado ON alumnos.estado = estado.id 
    INNER JOIN parentesco ON alumnos.parentesco = parentesco.id INNER JOIN tiposangre ON alumnos.tipoSangre = tiposangre.id WHERE alumnos.id = $id";
    //$query = "SELECT * FROM alumnos WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $noControl = $row['id'];
        $nombre = $row['nombre'];
        $pApellido = $row['pApellido'];
        $sApellido = $row['sApellido'];
        $curp = $row['curp'];
        $carrera = $row['carrera'];
        $rfc = $row['rfc'];
        $sexo = $row['sexo'];
        $tipoSangre = $row['tipo'];
        $fNacimiento = $row['fechaNacimiento'];
        $estado = $row['estado'];
        $municipio = $row['municipio'];
        $colonia = $row['colonia'];
        $calle = $row['calle'];
        $noExterior = $row['numExterior'];
        $cPostal = $row['codPostal'];
        $email = $row['email'];
        $noTelefono = $row['numTelefono'];
        $tutor = $row['nombreTutor'];
        $pApTutor = $row['pApellidoTutor'];
        $sApTutor = $row['sApellidoTutor'];
        $telTutor = $row['telTutor'];
        $parentesco = $row['parentesco'];
        $carrera = $row['carrera'];
    }
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\SISTEMAESCOLAR\menu\menuVertical2.css">
</head>
<body>
    <form action = "">
        <button type="button" class= "btn btn-success" onclick="location.href='alumno.php'">Volver</button>
        <div class="container p-4">
            <?php
             echo "Numero de control: $noControl <br>Nombre: $nombre<br> Apellidos: $pApellido $sApellido<br>
               curp: $curp<br> carrera: $carrera<br> rfc: $rfc<br> sexo: $sexo<br>
               tipo de sangre: $tipoSangre<br> fecha de nacimiento: $fNacimiento<br>
               Estado: $estado<br> Municipio: $municipio<br> Colonia: $colonia<br> Calle: $calle<br>
               Numero exterior: $noExterior<br> Codigo Postal: $cPostal<br>
               E-mail: $email<br> Numero de telefono: $noTelefono<br> 
               Nombre del tutor: $tutor $pApTutor $sApTutor<br>
               Telefono del tutor: $telTutor<br> Parentesco: $parentesco<br>";
            ?>
        </div>
        <button type="button" class= "btn btn-success" onclick="location.href='alumno.php'">Volver</button>
    </form>
</body>
</html>