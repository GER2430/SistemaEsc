<?php
 include("../../conexiones/conexionBd.php");
 include("../../inicio.php");



 if (isset($_GET['id'])) {
     $id = $_GET['id'];
     /*$query = "SELECT alumnos.numControl, alumnos.nombre, alumnos.pApellido, alumnos.sApellido,
     alumnos.curp, alumnos.rfc, alumnos.sexo, alumnos.tipoSangre, alumnos.fechaNacimiento,
     alumnos.municipio, alumnos.colonia, alumnos.calle, alumnos.numExterior,
     alumnos.codPostal, alumnos.email, alumnos.numTelefono, alumnos.nombreTutor,
     alumnos.pApellidoTutor, alumnos.sApellidoTutor, alumnos.telTutor, carrera.carrera, alumnos.estado, alumnos.parentesco FROM alumnos 
     INNER JOIN carrera ON alumnos.carrera = carrera.id WHERE alumnos.id = $id";*/
    $query = "SELECT * FROM alumnos WHERE id = $id";
 
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
         $tipoSangre =$row['tipoSangre'];
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

     }
 }
 if(isset($_POST['Actualiza'])){
     $id = $_GET['id'];
     $nombre = $_POST['nombre'];
     $pApellido = $_POST['pApellido'];
     $sApellido = $_POST['sApellido'];
     $curp = $_POST['curp'];
     $carrera = $_POST['carrera'];
     $rfc = $_POST['rfc'];
     $sexo = $_POST['sexo'];
     $tipoSangre = $_POST['tipoSangre'];
     $fNacimiento = $_POST['fechaNacimiento'];
     $estado = $_POST['estado'];
     $municipio = $_POST['municipio'];
     $colonia = $_POST['colonia'];
     $calle = $_POST['calle'];
     $noExterior = $_POST['numExterior'];
     $cPostal = $_POST['codPostal'];
     $email = $_POST['email'];
     $noTelefono = $_POST['numTelefono'];
     $tutor = $_POST['nombreTutor'];
     $pApTutor = $_POST['pApellidoTutor'];
     $sApTutor = $_POST['sApellidoTutor'];
     $telTutor = $_POST['telTutor'];
     $parentesco = $_POST['parentesco'];

     $query = "UPDATE alumnos set nombre = '$nombre', pApellido = '$pApellido', sApellido = '$sApellido',
     curp = '$curp', carrera = '$carrera', rfc = '$rfc', sexo = '$sexo', tipoSangre = '$tipoSangre', fechaNacimiento = '$fNacimiento',
     estado = '$estado', municipio = '$municipio', colonia = '$colonia', calle = '$calle',
     numExterior = '$noExterior', codPostal = '$cPostal', email = '$email', numTelefono = '$noTelefono',
     nombreTutor = '$tutor', pApellidoTutor = '$pApTutor', sApellidoTutor = '$sApTutor',
     telTutor = '$telTutor', parentesco = '$parentesco' WHERE id =$id";
     mysqli_query($conn, $query);
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
 <head>
 <link rel="stylesheet" href="..\..\menu\menuVertical2.css">
 </head>
 <div class="container p-4">
     <div class="col-md-4 mx-auto">
         <div class="card card-body">
             <form action="edit.php?id=<?php echo $_GET['id']?>" method="POST">
             <button type="button" align="right" class= "btn btn-success" onclick="location.href='alumno.php'">Volver</button><br>
             <?php echo "numero de control: $noControl"?>
             <div class="form-group">
             <tr><td><label>Nombre:</label></td></tr>
                 <input type="text" name="nombre" value="<?php echo $nombre ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Primer apellido:</label></td></tr>
                 <input type="text" name="pApellido" value="<?php echo $pApellido ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Segundo apellido:</label></td></tr>
                 <input type="text" name="sApellido" value="<?php echo $sApellido ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>CURP:</label></td></tr>
                 <input type="text" name="curp" value="<?php echo $curp ?>" class ="form-control">
             </div>
             <div class="form-group" >
                    <tr><td><label>Carrera:</label></td></tr>
                    <select name="carrera" class="container__input">
                    <option value = "<?php echo $carrera ?>"><?php echo $carrera ?></option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado3)){
                                $id = $fila['id'];
                                $carrera = $fila['carrera'];
                                echo "<option value = $id >$carrera</option>";
                                }
                                ?>
                    </select>
             </div>
             <div class="form-group">
             <tr><td><label>RFC:</label></td></tr>
                 <input type="text" name="rfc" value="<?php echo $rfc ?>" class="form-control">
             </div>
             <div class="form-group" >
                    <tr><td><label>Sexo:</label></td></tr>
                    <select name="sexo" class="container__input">
                    <option value = "<?php echo $sexo ?>"><?php echo $sexo ?></option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado2)){
                                $id = $fila['id'];
                                $sexo = $fila['sexo'];
                                echo "<option value = $id>$sexo</option>";
                                }
                                ?>
                    </select>
             </div>
             <div class="form-group" >
                    <tr><td><label>tipo de sangre:</label></td></tr>
                    <select name="tipoSangre" class="container__input">
                    <option value = "<?php echo $tipoSangre ?>"><?php echo $tipoSangre ?></option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado)){
                                $id = $fila['id'];
                                $tipo = $fila['tipo'];
                                echo "<option value = $id>$tipo</option>";
                                }
                                ?>
                    </select>
             </div>
             <div class="form-group" class="form-control">
             <tr><td><label>Fecha de nacimiento:</label></td></tr>
                            <input type="date" name="fechaNacimiento" value="<?php echo $fNacimiento ?>" required pattern="\d{4}-\d{2}-\d{2}">
             </div>
             <div class="form-group" >
                    <tr><td><label>Estado:</label></td></tr>
                    <select name="estado" class="container__input">
                    <option value = "<?php echo $estado ?>"> <?php echo $estado ?></option>
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
                 <input type="text" name="municipio" value="<?php echo $municipio ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Colonia:</label></td></tr>
                 <input type="text" name="colonia" value="<?php echo $colonia ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Calle:</label></td></tr>
                 <input type="text" name="calle" value="<?php echo $calle ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Numero Exterior:</label></td></tr>
                 <input type="text" name="numExterior" value="<?php echo $noExterior ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Código postal:</label></td></tr>
                 <input type="text" name="codPostal" value="<?php echo $cPostal ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Correo electrónico:</label></td></tr>
                 <input type="text" name="email" value="<?php echo $email ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Número telefónico:</label></td></tr>
                 <input type="text" name="numTelefono" value="<?php echo $noTelefono ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Nombre del tutor:</label></td></tr>
                 <input type="text" name="nombreTutor" value="<?php echo $tutor ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Primer apellido del tutor:</label></td></tr>
                 <input type="text" name="pApellidoTutor" value="<?php echo $pApTutor ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Segundo apellido del tutor:</label></td></tr>
                 <input type="text" name="sApellidoTutor" value="<?php echo $sApTutor ?>" class="form-control">
             </div>
             <div class="form-group">
             <tr><td><label>Telefono del tutor:</label></td></tr>
                 <input type="text" name="telTutor" value="<?php echo $telTutor ?>" class="form-control">
             </div>
             <div class="form-group" >
                    <tr><td><label>Parentesco del tutor:</label></td></tr>
                    <select name="parentesco" class="container__input">
                    <option value = "<?php echo $parentesco ?>"> <?php echo $parentesco ?></option>
                                <?php
                                while($fila = mysqli_fetch_array($resultado5)){
                                $id = $fila['id'];
                                $parentesco = $fila['parentesco'];
                                echo "<option value = $id>$parentesco</option>";
                                }
                                ?>
                    </select>
             </div>
             <button class="btn btn-success" name="Actualiza">
                    Actualizar       
             </button>
             <button type="button" class= "btn btn-success" onclick="location.href='alumno.php'">Volver</button>
            </form>
         </div>
     </div>
 </div>