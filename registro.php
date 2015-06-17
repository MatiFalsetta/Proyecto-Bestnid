<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Registrarse</title>
		<script src="./javascript/validarUsuario.js"></script>
		<link rel="stylesheet" type="text/css" href="./estilos/estilo.css">
		<link rel="stylesheet" type="text/css" href="./estilos/mas_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="registro">
					<h2>Registrarse en BESTNID</h2>
					<form method="POST" name="registro" action="./sistema/registrar_usuario.php">
						Correo electronico:</br>
						<input type="email" id="email" name="user" placeholder="Correo"></br>
						Contraseña:</br>
						<input type="password" id="pass" name="pass" placeholder="Contraseña"></br>
						Repita la contraseña:</br>
						<input type="password" id="pass2" name="pass2" placeholder="Contraseña"></br>
						Nombre:</br>
						<input type="text" id="nombre" name="nombre" placeholder="Nombre"></br>
						Apellido:</br>
						<input type="text" id="apellido" name="apellido" placeholder="Apellido"></br>
						DNI:</br>
						<input type="number" id="dni" name="DNI" placeholder="DNI"></br>
						Nº de Tarjeta de Credito:</br>
						<input type="number" id="tarjeta" name="tarjeta" placeholder="Tarjeta de Credito"></br>
						Fecha de nacimiento:</br> (Año-Mes-Dia)</br>
						<input type="date" id="fecha" name="fecha" value="<?php echo date('Y-m-d'); ?>" placeholder="Fecha de Nacimiento"></br>
						<input type="button" value="Registrar" onclick="validarRegistro()">
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