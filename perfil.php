<?php 
session_start ();
error_reporting (0);
require_once "controllers/formularios.php";
require_once "models/conexion.php";
 if(!isset($_SESSION['Id'])){
     header("Location: index.html");
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/perfil.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="Encabezado">
    <div class="Logo"><a href="home.php"><img src="imagenes/Logo.jpg"></a></div>
    <a href="logout.php" class="BotonMenu"><span>SALIR</span></a>
    <a href="editar.php" class="BotonMenu"><span>EDITAR</span></a>  
</div>

<div class="Box">
    <div class="imgBx">
        <img src="<?php if(isset($_SESSION['Avatar'])){ echo $__SESSION['Avatar']; }else{ echo "imagenes/DEFAULT.JPG";}?>">
    </div>
    <ul class="Social-Iconos">
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
    </ul>
    <div class="Details">
        <h2><?php echo $_SESSION['Usuario']; ?><br><span>CON NOSOTROS DESDE:<br><?php echo $_SESSION['Fecha']; ?></span></h2>
    </div>
</div>
</body>
</html>