<?php 
session_start ();

require_once "controllers/formularios.php";

 if(!isset($_SESSION['Id'])){
     header("Location: index.html");
 }

 $get = $_GET["tema"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/comentarios.css">
	<style>
	@font-face{
		font-family:neon;
		src: url(fonts/Beon.otf);
	}
	h1{
		font-family: neon;
	}
	</style>
</head>
<body>
<div class="Encabezado">
    <div class="Logo">
		<a href="home.php">
			<img src="imagenes/Logo.jpg">
			</a></div>
    <a href="logout.php" class="BotonMenu"><span>SALIR</span></a>
</div>
    <div class="Cuerpo">
        <H1 class="Neon" data-text="<?php echo $_GET["tema"];?>"><?php echo $_GET["tema"];?></H1>
    <!-- Formulario para Comentarios -->
    <form name="form1" method="post" action="">
        <label for="textarea"></label>
        <center>
            <p>
            <textarea class="textarea" name="comentario" cols="80" rows="5" id="textarea"></textarea><input type="submit" <?php if (isset($_GET['id'])) { ?>name="reply"<?php } else { ?>name="comentar"<?php } ?>value="Comentar">
            </p>
            <p>
            
            </p>
        </center>
        </form>
		<?php
		if(isset($_POST['comentar'])){
        $registro = ControladorFormularios::Comentar();
        if($registro=="ok"){
            header("Location: comentarios.php?tema= $get");
        }
}
        ?>
		<?php
		if(isset($_POST['reply'])){
        $registro = ControladorFormularios::Reply();
        if($registro=="ok"){
            header("Location: comentarios.php?tema= $get");
        }
	}
        ?>
        <!-- Contenedor Principal -->
	<div class="comments-container">

		<ul id="comments-list" class="comments-list">
		<?php
		require_once "models/conexion.php";

		$mysqli = new mysqli('localhost', 'root', '', 'kaffee_fushs');

		
        $comentarios = $mysqli->query("SELECT * FROM $get WHERE reply = 0 ORDER BY id DESC");
		while($row=mysqli_fetch_array($comentarios)) {
			
			$usuario = $mysqli->query("SELECT * FROM registros WHERE id = '".$row['usuario']."'");
			$user = mysqli_fetch_array($usuario);

		?>
			<li>
				<div class="comment-main-level">
					<!-- Avatar -->
					<div class="comment-avatar"><img src="<?php if(isset($user['avatar'])){ echo $user['avatar'];}else{ echo "imagenes/DEFAULT.JPG";}?>" alt=""></div>
					<!-- Contenedor del Comentario -->
					<div class="comment-box">
						<div class="comment-head">
							<h6 class="comment-name "><a href="#"><?php echo $user["usuario"]; ?></a></h6>
							<span><?php echo $row["fecha"]; ?></span>
						</div>
						<div class="comment-content">
						<?php echo $row["comentario"]; ?>
						<a href="comentarios.php?user=<?php echo $user["usuario"]; ?>&id=<?php echo $row["id"]; ?>&tema=<?php echo $get;?>">
                    	Responder
                    	</a>
						</div>
					</div>
				</div>
				<!-- Respuestas de los comentarios -->
				<?php
				$mysqli = new mysqli('localhost', 'root', '', 'kaffee_fushs');
				$contar = mysqli_num_rows($mysqli->query("SELECT * FROM $get WHERE reply = '".$row['id']."'"));
				if($contar != '0') {
					
					$reply = $mysqli->query("SELECT * FROM $get WHERE reply = '".$row['id']."' ORDER BY id DESC");
					while($rep=mysqli_fetch_array($reply)) {
						
					$usuario2 = $mysqli->query("SELECT * FROM registros WHERE id = '".$rep['usuario']."'");
					$user2 = mysqli_fetch_array($usuario2);
				?>
				<ul class="comments-list reply-list">
					<li>
						<!-- Avatar -->
						<div class="comment-avatar"><img src="<?php if(isset($user2['avatar'])){ echo $user2['avatar'];}else{ echo "imagenes/DEFAULT.JPG";}?>" alt=""></div>
						<!-- Contenedor del Comentario -->
						<div class="comment-box">
							<div class="comment-head">
								<h6 class="comment-name"><a href="#"><?php echo $user2['usuario']; ?></a></h6>
								<span><?php echo $rep['fecha']; ?></span>
							</div>
							<div class="comment-content">
							<?php echo $rep['comentario']; ?>
							</div>
						</div>
					</li>
		
				</ul>
				<?php } } }?>
			</li>
		</ul>
	</div>
</body>
</html>