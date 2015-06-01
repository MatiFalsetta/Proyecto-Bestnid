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
		<?php include ('./menu.html'); ?>
		<div id='cuerpo'>
			<section>
				<form method="POST" name="categoria" action="./sistema/agragar_categoria.php">
					<input type="text" id="categoria" name="categoria" placeholder="Nombre">
					<input type="button" value="Agregar" onclick="validar()">
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