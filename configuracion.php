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
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
					if($_SESSION['admin'] == '1'){
						echo '<a href="./menu_administrador.php">Menu ADMINISTRADOR</a></br>';
					}
				?>
				<a href="./modificar_datos.php">Modificar los datos de la cuenta</a>
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
