<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Registrarse</title>
		<script src="./javascript/validarSubasta.js"></script>
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<form enctype="multipart/form-data" method="POST" name="subasta" action="./sistema/registrar_subasta.php">
					<input type="text" id="titulo" name="titulo" placeholder="Titulo"></br>
					<textarea id="descripcion" name="descripcion" placeholder="Descripcion"></textarea></br>
					<input type="date" name="fechafin" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime( '+1 month', strtotime(date('y-m-d')))); ?>"></br>
					<?php
						include('./sistema/conectar.php');
						$conec=conectar();
						$resul=mysqli_query($conec,"SELECT * FROM categoria");
						while($categoria=mysqli_fetch_array($resul)){
							echo "<input type='checkbox' name='categoria[]' value='$categoria[idCategoria]'> $categoria[nombre]</br>";
						}
						mysqli_close($conec);
					?>
					<input type="file" id="imagen" name="imagen"></br>
					<input type="button" value="Iniciar Subasta" onclick="validarSubasta()">
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