
<?php 
session_start ();
error_reporting (0);
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
    <link rel="stylesheet" type="text/css" href="css/home.css">
    <style>
@font-face{
    font-family:neon;
    src: url(fonts/Beon.otf);
}
body{
    margin: 0px;
    padding: 0px;
    background: #000;
    font-family: neon;
}
.Encabezado{
    background: rgb(39, 39, 39);
    height: 80px;
    width: 100%;
    position: relative;
    display: flex;
    justify-content: start;
}

.Encabezado::after{
    content: '';
    position: absolute;
    background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000);
    width:  100%;
    top:0px;
    height: calc(100% + 2px);
    z-index: -1;
    pointer-events: none;
    animation: animate 1s linear infinite;
}
.Logo{
    height: 80px;
    width: 80px;
    
}
.Logo img{
    height: 100%;
    width: 100%;
    object-fit: cover;
    border-radius: 50%;
}
.BotonMenu{
    left: 70%;
    top: 11px;
    margin-right: 10PX;
    position: relative;
    width: 160px;
    height: 50px;
    background: #000;
    line-height: 48px;
    text-transform: uppercase;
    font-size: 20px;
    letter-spacing: 4px;
    text-decoration: none;
}
.BotonMenu::before{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #fb0094, #00f, #0f0, #ff0, #f00,#fb0094, #00f, #0f0, #ff0, #f00 );
    background-size: 400%;
    opacity: 0;
    transition: 0.5s;
    animation: animate 1s linear infinite;
}
.BotonMenu::after{
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, #fb0094, #00f, #0f0, #ff0, #f00,#fb0094, #00f, #0f0, #ff0, #f00 );
    background-size: 400%;
    opacity: 0;
    filter: blur(20px);
    transition: 0.5s;
    animation: boton 20s linear infinite;
}
.BotonMenu:hover::before,
.BotonMenu:hover::after{
    opacity: 1;
}
@keyframes boton{
    0%{
        background-position: 0 0;
    }
    50%{
        background-position: 300% 0;
    }
    100%{
        background-position: 0 0;
    }

}

.BotonMenu span{
    position: absolute;
    display: block;
    top: 1px;
    left: 1px;
    right: 1px;
    bottom: 1px;
    text-align: center;
    background: #0c0c0c;
    color: rgba(225, 225, 225, 0.5);
    z-index: 1;
}
.BotonMenu:hover span{
    color: rgba(225, 225, 225, 1);
}

@keyframes animate
        {
            0%{
                filter: blur(5px) hue-rotate(0deg) ;
            }
            100%{
                filter: blur(5px) hue-rotate(360deg) ;
            }
        }
@keyframes COMMENT
        {
            0%{
                filter: blur(0px) hue-rotate(0deg) ;
            }
            100%{
                filter: blur(0px) hue-rotate(360deg) ;
            }
        }

@keyframes animate
        {
            0%{
                filter: blur(5px) hue-rotate(0deg) ;
            }
            100%{
                filter: blur(5px) hue-rotate(360deg) ;
            }
        }

.Cuerpo{
    position: relative;
    color: #fff;
    margin: auto;
    top: 25px;
    width: 75%;
    padding: 15px;
    background:  rgb(39, 39, 39, 1); 
}
.Cuerpo::before{
    content: '';
    position: absolute;
    background: linear-gradient(45deg, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000, #fb0094, #0000ff, #00ff00, #ffff00, #ff0000);
    top:-2px;
    left:-2px;
    width:  calc(100% + 2px);
    height: calc(100% + 2px);
    z-index: -1;
    pointer-events: none;
    animation: animate 1s linear infinite;
}
h2{
    text-align: center;
}
.Neon{
    position: relative;
    top: 1em;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 0 20px;
    font-size: 3em;
    color: #fff;
    text-shadow: 0 0 20px #0380f5;
}
.Neon::after{
    content: attr(data-text);
    position: absolute;
    top: 30px;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: -1;
    color: #0380f5;
    filter: blur(15px);
}
.Neon::before{
        content: '';
        position: absolute;
        top: 0;
        left: 50%;
        background: #0380f5;
        z-index: -2;
        opacity: .5;
        filter: blur(20px);
}
.Categorias{
    display: flex;
    flex-direction: row;

    flex-wrap: wrap;
    justify-content: center;
    margin-top: 30px;
}

.Categoria{
    position: relative;
    height: 200px;
    width: 200px;
    margin: 25px;
}

.Categoria img{
    width: 100%;
    height: 100%;
    object-fit: cover;
}

    </style>
</head>
<body>
    <?php

    include "modulos/encabezado.php";
    
    ?>
<div class="Cuerpo">
        <h2 class="Neon" data-text="[TEMAS_DE_CONVERSACION]">[TEMAS_DE_CONVERSACION]</h2>
        <div class="Categorias">
            <div class="Categoria"><a href="comentarios.php?tema=videojuegos&id="><img src="imagenes/50d476b8e11ae9ca23a7f9d6ae95e409.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=peliculas&id="><img src="imagenes/PELICULAS.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=comida&id="><img src="imagenes/COMIDA.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=musica&id="><img src="imagenes/MUSICA.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=anime&id="><img src="imagenes/ANIME.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=codigo&id="><img src="imagenes/CODIGO.jpg"></a></div>
            <div class="Categoria"><a href="comentarios.php?tema=libros&id="><img src="imagenes/LIBROS.jpg"></a></div>
            <div class="Categoria"><a><img src="imagenes/PROXIMAMENTE.jpg"></a></div>
        </div>
    </div>
    
</body>
</html>