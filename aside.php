<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
		<?php include ('./aside_botones.php'); ?>
		<div id="filtro_aside">
			<h5>Filtrar por Categorias:</h5>
			<form method="GET" name="filtro_subastas" action="./index.php">
				<?php
					$fecha=date('Y-m-d');
					$hora='12:00';
					$categoria=-1;
					if(isset($_GET['categoria'])){
						$categoria=$_GET["categoria"];
						$fecha=$_GET["fechafin"];
						$hora=$_GET["fechafinhora"];
						$consulta=$consulta." AND subasta.fechaFin > '$fecha'";
						$orden=$_GET["orden"];
					}
				?>
				<select name='categoria'>
					<option value='-1'>Todas</option>
					<?php
						$resultado=mysqli_query($conec,"SELECT * FROM categoria");
						while($categorias=mysqli_fetch_array($resultado)){
							$selected='';
							if($categoria == $categorias['idCategoria']){
								$selected='selected';
							}
							echo "<option value=".$categorias['idCategoria']." ".$selected.">".$categorias['nombre']."</option>";
						}
						mysqli_close($conec);
					?>
				</select></br>
				<h5>Orden de busqueda:</h5>
				<select name='orden'>
					<option value='ASC'>Ascendente</option>
					<option value='DESC' <?php if($orden == 'DESC'){echo 'selected';}; ?>>Descendente</option>
				</select></br>
				<h5>Buscar a partir de la</br> fecha de finalizacion:</h5>
				<input type="date" name="fechafin" value="<?php echo $fecha; ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime( '+1 month', strtotime(date('y-m-d')))); ?>"></br>
				<input type="time" name="fechafinhora" value="<?php echo $hora; ?>"></br>
				<input type='submit' value='filtrar'>
			</form>
		</div>
		<?php
			if(!isset($_SESSION)) {
				session_start();
			}
			if(isset($_SESSION['usuario'])) {
		?>
			<a href="./iniciar_subasta.php"><div class="boton_aside">Iniciar subasta</div></a>
			<a href="./ver_mis_subastas.php"><div class="boton_aside">Ver mis subastas</div></a>
			<a href="./ver_mis_ofertas.php"><div class="boton_aside">Ver ofertas realizadas</div></a>
		<?php
			}
		?>
</html>