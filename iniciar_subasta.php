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
		<title>Bestnid Iniciar Subasta</title>
		<script src="./javascript/validarSubasta.js"></script>
		<link href="./estilos/estilo.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="./estilos/mas_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="iniciar_subasta">
					<h2>Crear una nueva Subasta</h2>
					<form enctype="multipart/form-data" method="POST" name="subasta" action="./sistema/registrar_subasta.php">
						Titulo:</br>
						<input type="text" id="titulo" name="titulo" placeholder="Titulo"></br>
						Descripción:</br>
						<textarea id="descripcion" name="descripcion" placeholder="Descripcion"></textarea></br>
						Fecha de finalizacion:</br> (Año-Mes-Dia)</br>
						<input type="date" id="fechafin" name="fechafin" value="<?php echo date('Y-m-d', strtotime( '+1 month', strtotime(date('y-m-d')))); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime( '+1 month', strtotime(date('y-m-d')))); ?>"></br>
						Hora de finalizacion:</br> (Hora:Minutos)</br>
						<input type="time" name="fechafinhora" value="23:59"></br>
						Categorias:</br>
						<div id="categorias">
							<?php
								include('./sistema/conectar.php');
								$conec=conectar();
								$resul=mysqli_query($conec,"SELECT * FROM categoria");
								while($categoria=mysqli_fetch_array($resul)){
									echo "<input type='checkbox' name='categoria[]' value='$categoria[idCategoria]'> $categoria[nombre]</br>";
								}
								mysqli_close($conec);
							?>
						</div>
						Imagen:</br>
						<input type="file" id="imagen" name="imagen"></br>
						<input type="button" value="Iniciar Subasta" onclick="validarSubasta()">
					</form>
				</div>
			</section>
			<aside>
				<?php include ('./aside_botones.php'); ?>
				<a href="./iniciar_subasta.php"><div style="background-color: #8EF9B2;" class="boton_aside">Iniciar subasta</div></a>
				<a href="./ver_mis_subastas.php"><div class="boton_aside">Ver mis subastas</div></a>
				<a href="./ver_mis_ofertas.php"><div class="boton_aside">Ver ofertas realizadas</div></a>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>