<?php
 session_start();

 if (isset($_POST['cerrar'])) {
     session_destroy();
     header('location: \SISTEMAESCOLAR\Index.php');
 }
?>
<form method="post">
        <div align="right">
         <input type="submit" value="cerrar sesion" name="cerrar"/>
        </div>
</form>