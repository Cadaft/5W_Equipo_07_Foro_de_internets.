<!DOCTYPE html>
<?php error_reporting (0);
session_start ();?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/login .css">
</head>
<body>
<div class="contenedor">
        
    <div class="form">
        <?php
        require "controllers/formularios.php";
            $ingreso = new ControladorFormularios;
            $ingreso -> Ingreso();
        ?>
        <h2>Iniciar Sesion</h2>
        <form action="" method="post">
            <div class="input">
               <input autocomplete="off" type="text" name="ingresoUsuario" placeholder="Nombre De Usuario">
            </div>
            <div class="input">
                <input type="password" name="ingresoPassword" placeholder="Contraseña">
             </div>
             <div class="input">
                <input type="submit" value="Ingresar">
             </div>
             <center><p>Aun no tienes una cuenta?</p><a href="crate.php">CREAR CUENTA</a></center>
        </form>
    </div>
</div>
<div class="ContImg">
    <img src="imagenes/LOGO.jpg">
</div>
</body>
</html>