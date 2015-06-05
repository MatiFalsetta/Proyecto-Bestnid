<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Registrarse</title>
		<script src="./javascript/validarUsuario.js"></script>
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<form method="POST" name="registro" action="./sistema/registrar_usuario.php">
					<input type="email" id="email" name="user" placeholder="Correo"></br>
					<input type="password" id="pass" name="pass" placeholder="Contraseña"></br>
					<input type="text" id="nombre" name="nombre" placeholder="Nombre"></br>
					<input type="text" id="apellido" name="apellido" placeholder="Apellido"></br>
					<input type="number" id="dni" name="DNI" placeholder="DNI"></br>
					<input type="number" id="tarjeta" name="tarjeta" placeholder="Tarjeta de Credito"></br>
					<input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha de Nacimiento"></br>
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