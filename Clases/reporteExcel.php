
<?php
date_default_timezone_set('America/Mexico_City');
$fechahoraActual = date('d/m/y h:i:s a');

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= ListadoAlumnos-".$fechahoraActual.".xls");

include '../Conexiones/conexionBd.php';
?>

<table border="1">
    <tr class="titulotablaalumnos">
      <th >Numero</th>
      <th >Numero de control</th>
      <th >Nombre</th>
      <th >Primer Apellido</th>
      <th >Segundo Apellido</th>
      <th >CURP</th>
      <th >Carrera</th>
      <th >Sexo</th>
      <th >Tipo de sangre</th>
      <th >Fecha de nacimiento</th>
      <th >Estado</th>
      <th >Municipio</th>
      <th >Colonia</th>
      <th >Calle</th>
      <th >Numero Exterior</th>
      <th >Codigo postal</th>
      <th >Correo electronico</th>
      <th >Numero telefonico</th>
      <th >Nombre del tutor</th>
      <th >Primer apellido del tutor</th>
      <th> Segundo apellido del tutor</th>
      <th> Numero telefonico del tutor</th>
      <th> Parentesco</th>
    </tr>

    <?php
        $consulta = "SELECT alumnos.id, alumnos.nombre, alumnos.pApellido, alumnos.sApellido,
        alumnos.curp, alumnos.rfc, sexo.sexo, tiposangre.tipo, alumnos.fechaNacimiento,
        alumnos.municipio, alumnos.colonia, alumnos.calle, alumnos.numExterior,
        alumnos.codPostal, alumnos.email, alumnos.numTelefono, alumnos.nombreTutor,
        alumnos.pApellidoTutor, alumnos.sApellidoTutor, alumnos.telTutor, carrera.carrera, estado.estado, parentesco.parentesco FROM alumnos 
        INNER JOIN carrera ON alumnos.carrera = carrera.id INNER JOIN sexo ON alumnos.sexo = sexo.id
        INNER JOIN estado ON alumnos.estado = estado.id 
        INNER JOIN parentesco ON alumnos.parentesco = parentesco.id INNER JOIN tiposangre ON alumnos.tipoSangre = tiposangre.id ORDER BY pApellido";
        //$consulta = "SELECT * FROM alumnos WHERE id = $id";
        $ejecutar = mysqli_query($conn, $consulta);

        
        
        $contador = 0;
        while($fila = mysqli_fetch_array($ejecutar)){
                $id = $fila['id'];
                $nombre = $fila['nombre'];
                $pApellido= $fila['pApellido'];
                $sApellido=$fila['sApellido'];
                $curp=$fila['curp'];
                $carrera = $fila['carrera'];
                $rfc = $fila['rfc'];
                $sexo=$fila['sexo'];
                $sangre = $fila['tipo'];
                $fechanacim =$fila['fechaNacimiento'];
                $estado = $fila['estado'];
                $municipio = $fila['municipio'];
                $colonia = $fila['colonia'];
                $calle = $fila['calle'];
                $numeroext = $fila['numExterior'];
                $cPostal = $fila['codPostal'];
                $email = $fila['email'];
                $numTelefono = $fila['numTelefono'];
                $nombreTutor = $fila['nombreTutor'];
                $pApTutor = $fila['pApellidoTutor'];
                $sApTutor = $fila['sApellidoTutor'];
                $telTutor = $fila['telTutor'];
                $parentesco = $fila['parentesco'];
                
                
                
                $contador++;

                /*$consulta1 = "SELECT * FROM carrera WHERE carrera='$carrera'";
                $ejecutar1 = mysqli_query($conn, $consulta1);
        
                $consulta2 = "SELECT * FROM sexo WHERE sexo='$sexo'";
                $ejecutar2 = mysqli_query($conn, $consulta2);
        
                $consulta3 = "SELECT * FROM tiposangre WHERE tipoSangre='$sangre'";
                $ejecutar3 = mysqli_query($conn, $consulta3);
        
        
                $consulta4 = "SELECT * FROM estado WHERE estado='$estado'";
                $ejecutar4 = mysqli_query($conn, $consulta4);






                while($fila1 = mysqli_fetch_array($ejecutar1)){
                    $carrera2 = $fila1['carrera'];
                }
            
    
            
                
                while($fila2 = mysqli_fetch_array($ejecutar2)){
                    $sexo2 = $fila2['sexo'];
                }
            
    
            
                
                while($fila3 = mysqli_fetch_array($ejecutar3)){
                    $sangre2 = $fila3['tipoSangre'];
                }
            
    
            
                
                while($fila4 = mysqli_fetch_array($ejecutar4)){
                    $estado2 = $fila4['estado'];
                }*/
            
    
    
                
                
    
    $valor = "=\"" . $id . "\"";

    $valor1 = "=\"" . $carrera . "\"";
    
    $valor2 = "=\"" . $numTelefono . "\"";

    $valor3 = "=\"" . $cPostal . "\"";
    $valor33 = "=\"" . $numeroext . "\"";

    ?>

    
    <tr class="contenidoalumnos" align="left">
        <td><?php echo $contador; ?></td>
        <td><?php echo $valor; ?></td>
        <td><?php echo strtoupper($nombre); ?></td>
        <td><?php echo strtoupper($pApellido); ?></td>
        <td><?php echo strtoupper($sApellido);?></td>
        <td><?php echo strtoupper($curp); ?></td>
        <td><?php echo strtoupper($carrera); ?></td>
        <td><?php echo strtoupper($sexo); ?></td>
        <td><?php echo strtoupper($sangre); ?></td>
        <td><?php echo strtoupper($fechanacim); ?></td>
        <td><?php echo strtoupper($estado); ?></td>
        <td><?php echo strtoupper($municipio); ?></td>
        <td><?php echo strtoupper($colonia); ?></td>
        <td><?php echo strtoupper($calle); ?></td>
        <td><?php echo strtoupper($valor33); ?></td>
        <td><?php echo strtolower($valor3); ?></td>
        <td><?php echo strtolower($email); ?></td>
        <td><?php echo strtoupper($valor2); ?></td>
        <td><?php echo strtoupper($nombreTutor); ?></td>
        <td><?php echo strtoupper($pApTutor); ?></td>
        <td><?php echo strtoupper($sApTutor); ?></td>
        <td><?php echo strtoupper($telTutor); ?></td>
        <td><?php echo strtoupper($parentesco); ?></td>
    </tr>

    <?php } ?>

  </table>