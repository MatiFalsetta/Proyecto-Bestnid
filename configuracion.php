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
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
					if($_SESSION['admin'] == '1'){
				?>
						<a href="./listar_categorias.php"><div class="boton_configuracion">Configurar categorias</div></a>
						<a href="./listar_usuarios.php"><div class="boton_configuracion">Listar usuarios registrados</div></a>
						</br>
				<?php
					}
				?>
				<a href="./modificar_datos.php"><div class="boton_configuracion">Modificar los datos de la cuenta</div></a>
				<a href="./ver_ofertas_realizadas.php"><div class="boton_configuracion">Ver las ofertas que realice</div></a>
			</section>
			<aside>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>
