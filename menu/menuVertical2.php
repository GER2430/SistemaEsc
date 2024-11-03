<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar</title>
    <link rel="stylesheet" href="..\..\menu\menuVertical2.css">
</head>
<body>
    <div id="sidebar" class="menu-collapsed">
        <div id="header">
            <div id="title"><span>Menú</span></div>
            <div id="menu-btn">
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
                <div class="btn-hamburger"></div>
            </div>
        </div>
        
    <div id="profile">
        <div id="photo"><img src="/SISTEMAESCOLAR/menu/img/Barbara.png" alt=""></div>

        <div id="name"><span></span></div>
    </div>

    <div id="menu-items">
        <div class="item">
            <a href="\SISTEMAESCOLAR\inicio.php">
                <div class="icon"><img src="/SISTEMAESCOLAR/menu/img/inicio.png" alt=""></div>
                <div class="title"><span>Inicio</span></div>
                
            </a>
        </div>

        <div class="item separator">
            
        </div>

        <div class="item">
            <a href="\SISTEMAESCOLAR\CRUD\Alumno\alumno.php">
                <div class="icon"><img src="/SISTEMAESCOLAR/menu/img/alumno.png" alt=""></div>
                <div class="title"><span>Alumno</span></div>
                
            </a>
        </div>

        <div class="item separator">
            
        </div>

        <div class="item">
            <a href="\SISTEMAESCOLAR\CRUD\TipoSangre\tipoSangre.php">
                <div class="icon"><img src="/SISTEMAESCOLAR/menu/img/sangre.png" alt=""></div>
                <div class="title"><span>Tipo de sangre</span></div>
            </a>
        </div>
    </div>
    </div>

    <div id="main-container">
        
    </div>

    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidebar');
        btn.addEventListener('click', e =>{
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>
    <?php
    
    if (isset($_SESSION['nombreUsuario'])) {
        $usuario = $_SESSION['nombreUsuario'];
        echo "<h1> usuario conectado: $usuario</h1> ";
 }
    
?>
</body>
</html>
