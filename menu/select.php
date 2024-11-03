<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id = "tipoSangre">
    <label>
        <select name="" id="">
        
        <?php 
            include 'bd.php';

            $consulta="SELECT * FROM tiposangre";
        ?>
        <?php foreach ($variable as $key => $value): ?>
            <option value=""></option>
        <?php endforeach ?>
        </select>
    </label>
    </div>
</body>
</html>