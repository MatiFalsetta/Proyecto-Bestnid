<?php
	session_start();
	if($_SESSION['admin'] != '1'){
		header('Location: ./index.php?error=0');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Ver Mis Ofertas</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/mas_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor">&nbsp
					<?php
						include_once("./sistema/conectar.php");
						$conectar=conectar();
						$resul=mysqli_query($conectar,"SELECT * FROM comision WHERE 1 ORDER BY idComision DESC");
						$comision=mysqli_fetch_array($resul);
					?>
						<div class='oferta' style="text-align: center;">
							<h2>Comision actual: %<?php echo $comision['porcentaje']; ?></h2>
						</div>
						</br>
						<form method="POST" name="modificar_comision" action="./sistema/modificar_comision.php">
							<h3><b>Editar:</b><h3>
							<input type="number" name="comision" value="<?php echo $comision['porcentaje']; ?>" min="0" max="100" style="width: 100px; height: 19px;">
							<input type="submit" value="Enviar" style="width: 100px; height: 25px;">
						</form>
						</br> &nbsp </br>
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