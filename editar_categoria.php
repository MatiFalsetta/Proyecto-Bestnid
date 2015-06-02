<?php
	session_start();
	if($_SESSION['usuario'] != '1'){
		header('Location: ./index.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<script src="./javascript/validarCategoria.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
					$id=$_GET["id"];
					$nom=$_GET["nom"];
				?>
				<form method="POST" name="categoria" action="./sistema/editar_categoria.php">
					<input type="text" id="categoria" name="categoria" value="<?php echo $nom ?>">
					<input type="hidden" name="id" value="<?php echo $id ?>">
					<input type="button" value="Modificar" onclick="validar()">
				</form>
			</section>
			<aside>
				Bloque de al lado </br>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>