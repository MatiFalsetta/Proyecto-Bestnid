<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Registrarse</title>
		<script src="./javascript/validarUsuario.js"></script>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script>
		$(function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true
			});
		});
		</script>
	</head>
	<body>
		<?php include ('./menu.html'); ?>
		<div id='cuerpo'>
			<section>
				<form method="POST" name="registro" action="./sistema/registrar_usuario.php">
					<input type="email" id="email" name="user" placeholder="Correo"></br>
					<input type="password" id="pass" name="pass" placeholder="Contraseña"></br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre"></br>
					<input type="text" id="apellido" name="apellido" placeholder="Apellido"></br>
					<input type="number" id="dni" name="DNI" placeholder="DNI"></br>
					<input type="number" id="tarjeta" name="tarjeta" placeholder="Tarjeta de Credito"></br>
					<input type="text" name="fecha" id="datepicker" placeholder="Fecha de Nacimiento"></br>
					<input type="button" value="Registrar" onclick="validarRegistro()">
				</form>
			</section>
			<aside>
				Bloque de al lado</br>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>