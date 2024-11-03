<?php

 include("..\..\Conexiones\conexionBd.php");
 include("..\..\inicio.php");


 if (isset($_GET['saveType'])) {
     $noControl = $_GET['id'];
     $nombre = $_GET['nombre'];
     $pApellido = $_GET['pApellido'];
     $sApellido = $_GET['sApellido'];
     $curp = $_GET['curp'];
     $carrera = $_GET['carrera'];
     $rfc = $_GET['rfc'];
     $sexo = $_GET['sexo'];
     $tipoSangre = $_GET['tipoSangre'];
     $fNacimiento = $_GET['fechaNacimiento'];
     $estado = $_GET['estado'];
     $municipio = $_GET['municipio'];
     $colonia = $_GET['colonia'];
     $calle = $_GET['calle'];
     $noExterior = $_GET['numExterior'];
     $cPostal = $_GET['codPostal'];
     $email = $_GET['email'];
     $noTelefono = $_GET['numTelefono'];
     $tutor = $_GET['nombreTutor'];
     $pApTutor = $_GET['pApellidoTutor'];
     $sApTutor = $_GET['sApellidoTutor'];
     $telTutor = $_GET['telTutor'];
     $parentesco = $_GET['parentesco'];

     $query = "INSERT INTO alumnos(id, nombre, pApellido, sApellido, curp, carrera, rfc, sexo, tiposangre, fechaNacimiento,
     estado, municipio, colonia, calle, numExterior, codPostal, email, numTelefono, nombreTutor, pApellidoTutor,
     sApellidoTutor, telTutor, parentesco) VALUES ('$noControl', '$nombre', '$pApellido', '$sApellido', '$curp',
     '$carrera', '$rfc', '$sexo', '$tipoSangre', '$fNacimiento', '$estado', '$municipio', '$colonia', '$calle', '$noExterior',
     '$cPostal', '$email', '$noTelefono', '$tutor', '$pApTutor', '$sApTutor', '$telTutor', '$parentesco' )";
     $result = mysqli_query($conn, $query);
     if (!$result) {
         die("Query Failed" .mysqli_error());
     }
     header("location: alumno.php");
 }

    $consulta = "SELECT * FROM tiposangre";
    $resultado = mysqli_query($conn,$consulta);

    $consulta2 = "SELECT * FROM sexo";
    $resultado2 = mysqli_query($conn,$consulta2);

    $consulta3 = "SELECT * FROM carrera";
    $resultado3 = mysqli_query($conn,$consulta3);

    $consulta4 = "SELECT * FROM estado";
    $resultado4 = mysqli_query($conn,$consulta4);

    $consulta5 = "SELECT * FROM parentesco";
    $resultado5 = mysqli_query($conn,$consulta5);

 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="\Sitio1\menu\menuVertical2.css">
 </head>
 <body>
     
 </body>
 </html>

<center>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="saveType.php" method="GET">
                        <div class="form-group">
                            <tr><td><label>Número de control:</label></td></tr>
                            <input type="text" name="id"  value="" class ="form-control">
                        </div>
                        <div class="form-group">
                        <tr><td><label>Nombre:</label></td></tr>
                            <input type="text" name="nombre" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                        <tr><td><label>Primer apellido:</label></td></tr>
                            <input type="text" name="pApellido" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                        <tr><td><label>Segundo apellido:</label></td></tr>
                            <input type="text" name="sApellido" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                        <tr><td><label>CURP:</label></td></tr>
                            <input type="text" name="curp" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Carrera:</label></td></tr>
                            <select name="carrera" class="container__input">
                                <option value = "0"> Seleccione su carrera</option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado3)){
                                $id = $fila['id'];
                                $carrera = $fila['carrera'];
                                echo "<option value = $id>$carrera</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                        <tr><td><label>RFC:</label></td></tr>
                            <input type="text" name="rfc" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Sexo:</label></td></tr>
                            <select name="sexo" class="container__input">
                                <option value = "0"> Seleccione su sexo</option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado2)){
                                $id = $fila['id'];
                                $sexo = $fila['sexo'];
                                echo "<option value = $id>$sexo</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <tr><td><label>tipo de sangre:</label></td></tr>
                            <select name="tipoSangre" class="container__input">
                                <option value = "0"> Seleccione un tipo de sangre</option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado)){
                                $id = $fila['id'];
                                $tipo = $fila['tipo'];
                                echo "<option value = $id>$tipo</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <tr><td><label>Fecha de nacimiento:</label></td></tr>
                            <input type="date" name="fechaNacimiento" value="" required pattern="\d{4}-\d{2}-\d{2}">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Estado:</label></td></tr>
                            <select name="estado" class="container__input">
                                <option value = "0"> Seleccione su Estado:</option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado4)){
                                $id = $fila['id'];
                                $estado = $fila['estado'];
                                echo "<option value = $id>$estado</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <tr><td><label>Municipio:</label></td></tr>
                            <input type="text" name="municipio" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Colonia:</label></td></tr>
                            <input type="text" name="colonia" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Calle:</label></td></tr>
                            <input type="text" name="calle" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Numero Exterior:</label></td></tr>
                            <input type="text" name="numExterior" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Codigo Postal:</label></td></tr>
                            <input type="text" name="codPostal" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Correo Electronico:</label></td></tr>
                            <input type="text" name="email" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Numero de telefono:</label></td></tr>
                            <input type="text" name="numTelefono" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Nombre del tutor:</label></td></tr>
                            <input type="text" name="nombreTutor" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Primer apellido del tutor:</label></td></tr>
                            <input type="text" name="pApellidoTutor" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Segundo apellido del tutor:</label></td></tr>
                            <input type="text" name="sApellidoTutor" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Telefono del tutor:</label></td></tr>
                            <input type="text" name="telTutor" value="" class ="form-control">
                        </div>
                        <div class="form-group">
                            <tr><td><label>Parentesco del tutor:</label></td></tr>
                            <select name="parentesco" class="container__input">
                                <option value = "0"> Seleccione el parentesco</option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado5)){
                                $id = $fila['id'];
                                $parentesco = $fila['parentesco'];
                                echo "<option value = $id>$parentesco</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="saveType" value="Guardar">
                        <button type="button" class= "btn btn-success" onclick="location.href='alumno.php'">Volver</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</center>