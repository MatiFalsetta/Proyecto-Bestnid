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
				<form method="POST" name="correo" action="./sistema/recuperar_clave.php">
					<input type="email" id="email" name="correo" placeholder="Correo">
					<input type="submit" value="Recuperar">
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