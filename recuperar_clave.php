<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Recuperar Clave</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" type="text/css" href="./estilos/mas_estilos.css">
		<script src="./javascript/validarCategoria.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="registro">
					<h2>Recuperar clave</h2>
					<form method="POST" name="correo" action="./sistema/recuperar_clave.php">
						Ingrese su email: </br>&nbsp</br>
						<input type="email" id="email" name="correo" placeholder="Correo"></br>
						<input type="submit" value="Recuperar"></br>
					</form>
				</div>
			</section>
			<aside>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>