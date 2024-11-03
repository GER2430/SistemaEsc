<?php include("..\..\Conexiones\conexionBd.php");
 include "../../menu/menuVertical2.php";
 include("../../Login2/logout.php");
 include("../../includes/header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\..\menu\menuVertical2.css">

</head>
<body>
    <div class="container p-4">
        <div align="right">
        <button type="button" class="btn btn-success" onclick="location.href='../../Clases/reporteExcel.php'" style="background-color: green;"><img src="../../Img/excel.png" alt="" srcset="" width="25px" height="25px">Descargar listado</button>
         <button type="button" class="btn btn-success" onclick="location.href='../../Clases/reportePdf.php'" style="background-color: red;"><img src="../../Img/pdff.png" alt="" srcset=""width="25px" height="25px">Descargar listado</button>
         <button type="button" class="btn btn-success" onclick="location.href='saveType.php'">Nuevo Registro</button>
        </div>
    
        <div class="row">
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>No. Control</th>
                            <th>Nombre(s)</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>CURP</th>
                            <th>Carrera</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

$query = "SELECT alumnos.id, alumnos.nombre, alumnos.pApellido, alumnos.sApellido,
alumnos.curp, alumnos.rfc, sexo.sexo, tiposangre.tipo, alumnos.fechaNacimiento,
alumnos.municipio, alumnos.colonia, alumnos.calle, alumnos.numExterior,
alumnos.codPostal, alumnos.email, alumnos.numTelefono, alumnos.nombreTutor,
alumnos.pApellidoTutor, alumnos.sApellidoTutor, alumnos.telTutor, carrera.carrera, estado.estado, parentesco.parentesco FROM alumnos 
INNER JOIN carrera ON alumnos.carrera = carrera.id INNER JOIN sexo ON alumnos.sexo = sexo.id
INNER JOIN estado ON alumnos.estado = estado.id 
INNER JOIN parentesco ON alumnos.parentesco = parentesco.id INNER JOIN tiposangre ON alumnos.tipoSangre = tiposangre.id ORDER BY pApellido";
//$query = "SELECT * FROM alumnos WHERE id = $id";
                        
                        $resultAlumno = mysqli_query($conn, $query);
                        $n=1;
                        while($row = mysqli_fetch_array($resultAlumno)) { ?>
                        <tr>
                        <td><?php echo $n?></td>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['nombre']?></td>
                            <td><?php echo $row['pApellido']?></td>
                            <td><?php echo $row['sApellido']?></td>
                            <td><?php echo $row['curp']?></td>
                            <td><?php echo $row['carrera']?></td>

                            <td>
                                <button type="button" onclick="location.href='ver.php?id=<?php echo $row['id']?>'">
                                    Ver
                                </button>
                                <div  >
                                <a  href="edit.php?id=<?php echo $row['id']?>" class="button btn" style="text-decoration: none;border: 1px solid blue; background-color: blue; color: white; font-weight: bold;">
                                    Modificar
                                </a>
                                <a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Estás seguro que deseas eliminar el registro?');" class= "button" style="text-decoration: none;border: 1px solid red; background-color: red; color: white; font-weight: bold;" >
                                    Eliminar
                                </a>
                                </div>
                            </td>
                        </tr>
                       <?php $n++; } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>

