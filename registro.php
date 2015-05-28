<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Registrarse</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<script language="JavaScript" src="./javascript/validarUsuario.js" type="text/javascript"></script>
	</head>
	<body>
		<?php include ('./menu.html'); ?>
		<div id='cuerpo'>
			<section>
				<form method="POST" name="registro">
					<input type="text" name="user" placeholder="Correo"></br>
					<input type="password" name="pass" placeholder="Contrasenia"></br>
					<input type="text" name="nombre" placeholder="Nombre"></br>
					<input type="text" name="apellido" placeholder="Apellido"></br>
					<input type="number" name="DNI" placeholder="DNI"></br>
					<select name="fecha_dia" size=1>
						<?php
							for ($i=1; $i<=31;$i++){
								echo "<option value=$i>$i</option>";
							}
						?>						
					</select> /
					<select name="fecha_mes" size=1>
						<?php
							for($i=1; $i<=12;$i++){
								echo "<option value=$i>$i</option>";
							}
						?>						
					</select> /
					<select name="fecha_ano" size=1>
						<?php
							for($i=2014; $i<=2015;$i++){
								echo "<option value=$i>$i</option>";
							}
						?>						
					</select></br>
					<input type="submit" value="Registrar" onclick="validarRegistro()">
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