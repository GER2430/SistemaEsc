<html>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <body>
        <div align="center">
            <form method="post">
                <table>
                    <tr><td colspan="2" style="background-color:#33A8DB;padding-bottom:10px;"><label>Iniciar sesión</label></td></tr>
                    <tr><td><label>Usuario:</label></td></tr>
                    <tr><td><input type="text" name="txtusuario" placeholder="ingresar usuario" required/></td></tr>
                    <tr><td><label>contraseña</label></td></tr>
                    <tr><td><input type="password" name="txtpassword" placeholder="ingresar contraseña" required/></td></tr>
                    <tr><td><input type="submit" name="Ingresar" value="ingresar"></td></tr>
                    
                </table>
            </form>
        </div>
    </body>
</html>

<?php
include '..\SISTEMAESCOLAR\Conexiones\conexionSeguridad.php';
 session_start();
 if (isset($_SESSION['nombreUsuario'])) {
     header('location:..\SISTEMAESCOLAR\inicio.php');
 }
 if (isset($_POST['Ingresar'])) {
     if (!$conn) {
         die("No hay conexion: ".mysqli_connect_error());
     }
     $nombre=$_POST['txtusuario'];
     $pass=$_POST['txtpassword'];

     $query=mysqli_query($conn,"SELECT * FROM login where usuario = '".$nombre."' and password= '".$pass."'");
     $nr=mysqli_num_rows($query);
     if(!isset($_SESSION['nombreUsuario'])){

     if ($nr==1) {
         $_SESSION['nombreUsuario']=$nombre;
         header("location: ..\SISTEMAESCOLAR\inicio.php");
     }
     else if ($nr == 0){
         echo "<script>alert('Usuario no existe');window.location'login.php'</script>";
     }
 }
 }
?>