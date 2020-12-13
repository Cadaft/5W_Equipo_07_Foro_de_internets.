<?php error_reporting (0);?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #000;
            font-family: consolas;
        }
        .contenedor{
            position: relative;
            margin: auto;
            width: 470px;
            min-height: 420px;
            background: rgba(225, 225, 225, 0.5)
            box-shadow: 0 5px 15px rgba(0, 0, 0, 1);

        }
        .contenedor::before
        {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(225, 225, 225, 0.1);
        }
        .form{
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 40px;
            box-sizing: border-box;
            z-index: 1;
        }
        .form h2{
            margin: 0;
            padding: 0;
            color: #fff;

        }
        .form .input{
            width: 100%;
            margin-top: 20px;

        }
        .form .input input{
            width: 100%;
            background: transparent;
            border: none;
            border-bottom: 2px solid #fff;
            outline: none;
            font-size: 18px;
            color: #fff;
            padding: 5px 0;
            
        }
        .form .inputfile input{
            width: 100%;
            background: transparent;
            border: none;
            margin-top:5px;
            outline: none;
            font-size: 18px;
            color: #fff;
            padding: 5px 0;
            
        }
        ::placeholder{
            color: #eee;
        }
        .form .input input[type="submit"]{
            background: #fff;
            color: #000;
            border: none;
            font-weight: 900;
            max-width: 150px;
            cursor: pointer;
            margin-bottom: 5px;
        }
        form a{
            color: #000;
        }
        .contenedor::after{
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(45deg, #ff0047, #6eff00);
            pointer-events: none;
            animation: animate 1s linear infinite;
        }
        @keyframes animate
        {
            0%{
                filter: blur(60px) hue-rotate(0deg) ;
            }
            100%{
                filter: blur(60px) hue-rotate(360deg) ;
            }
        }
    </style>
</head>
<body>
<div class="contenedor">
        
    <div class="form">
        <?php 
        require_once "controllers/formularios.php";
        $registro = ControladorFormularios::Registro();
        if($registro=="ok"){

            echo '<script>

            if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
            }
            </script>';

            echo "El Usario Se Registro";
        }

        ?>
        <h2>Crea Tu Cuenta</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="input">
               <input type="text" autocomplete="off" required name="registroUsuario" placeholder="Nombre De Usuario">
            </div>
            <div class="input">
               <input type="text" autocomplete="off" required name="registroNombre" placeholder="Nombre Completo">
            </div>
            <div class="input">
                <input type="email" autocomplete="off" required name="registroEmail" placeholder="Correo Electronico">
             </di>
            <div class="input">
                <input type="password" required name="registroPassword" placeholder="Contraseña">
             </div>
             <div class="inputfile">
                <input type="file" required name="registroImagen" value="Selecciona una imagen">
             </div>
             <div class="input">
                <input type="submit" value="Crear Cuenta">
             </div>
             <a href="login.php">INICIAR SESION</a>
        </form>
    </div>
</div>
</body>
</html>