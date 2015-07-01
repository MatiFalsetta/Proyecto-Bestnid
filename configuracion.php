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
		<title>Bestnid Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor">
					<?php
						if($_SESSION['admin'] == '1'){
					?>
							<h2>Opciones de administrador:</h2>
							<a href="./listar_categorias.php"><div class="boton_configuracion">Configurar categorias</div></a>
							<a href="./listar_usuarios.php"><div class="boton_configuracion">Listar usuarios registrados</div></a>
							</br>
					<?php
						}
					?>
					<h2>Opciones de la cuenta:</h2>
					<a href="./modificar_datos.php"><div class="boton_configuracion">Modificar los datos de la cuenta</div></a>
					</br>
				</div>
			</section>
			<aside>
				<?php include ('./aside_botones.php'); ?>
				<a href="./iniciar_subasta.php"><div class="boton_aside">Iniciar subasta</div></a>
				<a href="./ver_mis_subastas.php"><div class="boton_aside">Ver mis subastas</div></a>
				<a href="./ver_mis_ofertas.php"><div class="boton_aside">Ver ofertas realizadas</div></a>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>
