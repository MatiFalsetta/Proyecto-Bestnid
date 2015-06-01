<?php
	session_start();
	if($_SESSION['usuario'] == ''){
		header('Location: ./index.php');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
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
				<form method="POST" name="registro" action="./sistema/modificar_datos_usuario.php">
					<?php
						include_once('./sistema/conectar.php');
						$idUsuario = $_SESSION['usuario'];
						$conectar=conectar();
						$resul=mysqli_query($conectar,"SELECT * FROM usuario WHERE idUsuario='$idUsuario'");
						$usuario=mysqli_fetch_array($resul);
						$fecha=$usuario['fechaNac'];
						$fecha=$fecha[8].$fecha[9].'/'.$fecha[5].$fecha[6].'/'.$fecha[0].$fecha[1].$fecha[2].$fecha[3];
					?>
					<input type="email" id="email" name="user" value="<?php echo $usuario['mail']; ?>"></br>
					<input type="password" id="pass" name="pass" value="<?php echo $usuario['contrasenia']; ?>"></br>
					<input type="text" id="nombre" name="nombre" value="<?php echo $usuario['nombre']; ?>"></br>
					<input type="text" id="apellido" name="apellido" value="<?php echo $usuario['apellido']; ?>"></br>
					<input type="number" id="dni" name="DNI" value="<?php echo $usuario['dni']; ?>"></br>
					<input type="number" id="tarjeta" name="tarjeta" value="<?php echo $usuario['tarjetaCredito']; ?>"></br>
					<input type="text" name="fecha" id="datepicker" value="<?php echo $fecha ?>"></br>
					<input type="button" value="Modificar" onclick="validarRegistro()">
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