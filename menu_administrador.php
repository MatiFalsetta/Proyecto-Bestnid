<?php
	session_start();
	if($_SESSION['admin'] != '1'){
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
		<?php include ('./menu.html'); ?>
		<div id='cuerpo'>
			<section>
				<a href="./agregar_categoria.php">Agregar categoria</a></br>
				<a href="./listar_categorias.php">Listar categorias</a></br>
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
