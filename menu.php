<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
		<script src="./javascript/validarUsuario.js"></script>
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	</head>
	<nav>
		<div id='barraNav'>
			<a href="./index.php"><img id='nav_logo' src="./imagenes/bestnid/logo.png"></a>
			<a href="./index.php""><div class="nav_boton">Bestnid</div></a>
			<a href=""><div class="nav_boton">Preguntas frecuentes</div></a>
			<?php
				if(!isset($_SESSION)) {
					session_start();
				}
				if(!isset($_SESSION['usuario'])) {
			?>
				<div id="nav_derecha">
					<a href="./registro.php"><div class="nav_boton">Registrarse</div></a>
					<a href="./recuperar_clave.php"><div class="nav_boton">Recuperar clave</div></a>
					<form method="POST" name="iniciarsesion" action="./sistema/iniciar_sesion.php">
						<div class="nav_sesion">
							<input type="email" id="emailmenu" name="usermenu" placeholder="Correo"></br>
							<input type="password" id="passmenu" name="passmenu" placeholder="Contraseña">
						</div>
						<div id="ingresar">
							<input type="button" value="Ingresar" onclick="valida()">
						</div>
					</form>
				</div>
			<?php
				}
				else {
			?>
				<div id="nav_derecha">
					<div class="nav_boton_bienvenido">
						Bienvenido!</br>
						<?php echo $_SESSION['nombre'] ?> 
					</div>
					<a href="./configuracion.php"><div class="nav_boton">Configuracion</div></a>
					<a href="./sistema/cerrar_sesion.php"><div class="nav_boton">Cerrar sesion</div></a>
				</div>
			<?php					
				}
			?>
		</div>
	</nav>
	<?php include ('./sistema/excepciones.php'); ?>
</html>