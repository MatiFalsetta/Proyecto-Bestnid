<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
		<a href="./iniciar_subasta.php"><div id="">Iniciar Subasta</div></a></br>
		<h5>Filtrar por Categorias:</h5>
		<form method="GET" name="filtro_subastas" action="./index.php">
			<select name='categoria'>
				<option value='-1'>Todas</option>
				<?php
					include_once('./sistema/conectar.php');
					$conec=conectar();
					$resultado=mysqli_query($conec,"SELECT * FROM categoria");
					while($categorias=mysqli_fetch_array($resultado)){
						echo "<option value=".$categorias['idCategoria'].">".$categorias['nombre']."</option>";
					}
					mysqli_close($conec);
				?>
			</select></br>
			<h6>Orden de busqueda:</h6>
			<select name='orden'>
				<option value='ASC'>Ascendente</option>
				<option value='DESC'>Descendente</option>
			</select></br>
			<h6>Buscar a partir de la fecha:</h6>
			<input type="date" name="fechafin" value="<?php echo date('Y-m-d'); ?>" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime( '+1 month', strtotime(date('y-m-d')))); ?>"></br>
			<input type='submit' value='filtrar'>
		</form>
</html>