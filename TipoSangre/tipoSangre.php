<?php include("C:/wamp64/www/SISTEMAESCOLAR/conexiones/db.php");?>
<?php include "C:/wamp64/www/SISTEMAESCOLAR/menu/menuVertical2.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  
</head>
<body>
<div class="container p-4">
  <div class="row">
    <div class="col-md-8">
      <div class="card card-body">
        <form action="saveType.php" method="POST">
          <div class="form-group">
            <input type="text" name="grupo" class="form-control">
          </div>
          <div class="form-group">
            <input type="text" name="rh" class="form-control">
          </div>
          <input type="submit" class="btn btn-success btn-block" name="saveType" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-4">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Tipo</th>

          </tr>
        </thead>
        <tbody>
          <?php 
          $query = "SELECT * FROM tiposangre";
          $resultTipo = mysqli_query($conn, $query);
          
          while($row = mysqli_fetch_array($resultTipo)) { ?>
          <tr>
            <td><?php echo $row['tipo'] ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class= "btn btn-primary">
                Edit
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class= "btn btn-danger">
                Delete
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

</div>
</body>
</html>
