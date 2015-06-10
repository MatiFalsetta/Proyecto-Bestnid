<?php
	session_start();
	if($_SESSION['usuario'] == ''){
		header('Location: ./index.php?error=-1');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
		<script src="./javascript/validarUsuario.js"></script>
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<form method="POST" name="registro" action="./sistema/modificar_datos_usuario.php">
					<?php
						include_once('./sistema/conectar.php');
						$idUsuario = $_SESSION['usuario'];
						$conectar=conectar();
						$resul=mysqli_query($conectar,"SELECT * FROM usuario WHERE idUsuario='$idUsuario'");
						$usuario=mysqli_fetch_array($resul);
						$fecha=$usuario['fechaNac'];
					?>
					<input type="email" id="email" name="user" value="<?php echo $usuario['mail']; ?>"></br>
					<input type="password" id="pass" name="pass" value="<?php echo $usuario['contrasenia']; ?>"></br>
					<input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"></br>
					<input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>"></br>
					<input type="number" id="dni" name="DNI" value="<?php echo $usuario['dni']; ?>"></br>
					<input type="number" id="tarjeta" name="tarjeta" value="<?php echo $usuario['tarjetaCredito']; ?>"></br>
					<input type="date" id="fecha" name="fecha" value="<?php echo $fecha ?>"></br>
					<input type="button" value="Modificar" onclick="validarRegistro()">
				</form>
			</section>
			<aside>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>