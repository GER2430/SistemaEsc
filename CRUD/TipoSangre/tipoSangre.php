<?php include("../../Conexiones/conexionBd.php")?>

<?php include("../../menu/menuVertical2.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Escolar</title>
  <link rel="stylesheet" href="/menu/menuVertical2.css">
</head>
<body>
<script src="C:/wamp64/www/SISTEMAESCOLAR/menu/main.js" charset= "utf-8"></script> 
</body>
</html>

<div class="container p-4">
<button type="button" class="btn btn-success" onclick="location.href='saveType.php'">Nuevo</button>
  <div class="row">
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Grupo sanguineo</th>
            <th>Acciones</th>
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
              <a href="delete.php?id=<?php echo $row['id']?>" onclick="return confirm('Estás seguro que deseas eliminar el registro?');" class= "btn btn-danger"><button type="button" class="btn btn-danger" onclick="return confirm(\'¿Realmente desea eliminar?\')">
                Delete</button>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <button type="button" class="btn btn-success" onclick="location.href='saveType.php'">Nuevo</button>
</div>
