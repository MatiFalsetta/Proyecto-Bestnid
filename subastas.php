<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<?php
	include_once("./sistema/conectar.php");
	$conectar=conectar();
	$hoy=date('Y-m-d H:i:s');
	$consulta="SELECT DISTINCT subasta.idSubasta, subasta.titulo, subasta.descripcion, subasta.foto, subasta.fechaInicio, subasta.fechaFin FROM subasta INNER JOIN subastacategoria ON (subasta.idSubasta = subastacategoria.idSubasta) INNER JOIN categoria ON (subastacategoria.idCategoria = categoria.idCategoria) WHERE subasta.fechaFin > '$hoy'";
	$categoria=-1;
	$orden="ASC";
	if(isset($_GET['categoria'])){
		$categoria=$_GET["categoria"];
		$fecha=$_GET["fechafin"]." ".$_GET["fechafinhora"];
		$consulta=$consulta." AND subasta.fechaFin > '$fecha'";
		$orden=$_GET["orden"];
	}
	if($categoria != -1)	{
		$consulta=$consulta." AND categoria.idCategoria='$categoria'";
	}
	$consulta=$consulta." ORDER BY subasta.fechaFin $orden";
	$resul=mysqli_query($conectar,$consulta) or die('Error: ' . mysqli_error($con));
	$i=0;
	if(mysqli_num_rows($resul) == 0){
		?>
			<h3>No se han encontrado subastas. Intente con otro filtro o haga click <a href="./index.php" style="color: blue;">AQUI</a>.</h3>
		<?php
	}
	while($subasta=mysqli_fetch_array($resul)){
		?>
		<div class="miniSubasta">
			<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
				<div class="miniFoto">
					<img src="./<?php echo $subasta['foto'] ?>">
				</div>
				<div class="miniDescripcion">
					<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
					<p><b>Fecha de Inicio:</b> <?php echo date_format(date_create($subasta['fechaInicio']), 'd/m/Y'); ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
					<b>Fecha de Finalizacion:</b> <?php echo date_format(date_create($subasta['fechaFin']), 'd/m/Y'); ?></p> 
					<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
				</div>
			</a>
		</div>
		<?php
		$i++;
	}
	mysqli_close($conectar);
	?>
</html>