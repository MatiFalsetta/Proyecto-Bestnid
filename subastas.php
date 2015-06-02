<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<?php
	include_once("./sistema/conectar.php");
	$conectar=conectar();
	$consulta="SELECT DISTINCT subasta.idSubasta, subasta.titulo, subasta.descripcion, subasta.foto, subasta.fechaInicio, subasta.fechaFin FROM subasta INNER JOIN subastacategoria ON (subasta.idSubasta = subastacategoria.idSubasta) INNER JOIN categoria ON (subastacategoria.idCategoria = categoria.idCategoria)";
	$categoria=-1;
	if(isset($_GET['categoria'])){
		$categoria=$_GET["categoria"];
	}
	if($categoria != -1)	{
		$consulta=$consulta." WHERE categoria.idCategoria='$categoria'";
	}
	$consulta=$consulta." ORDER BY subasta.fechaFin";
	$resul=mysqli_query($conectar,$consulta) or die('Error: ' . mysqli_error($con));
	while($subasta=mysqli_fetch_array($resul)){
		?>
		<div id="miniSubasta">
			<div id="miniFoto">
				<a href="./ver_subasta.php?id=<?php echo $id; ?>"><img src="./<?php echo $subasta['foto'] ?>"></a>
			</div>
			<div id="miniDescripcion">
				<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
				<p><b>Fecha de Inicio:</b> <?php echo date_format(date_create($subasta['fechaInicio']), 'd/m/Y'); ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
				<b>Fecha de Finalizacion:</b> <?php echo date_format(date_create($subasta['fechaFin']), 'd/m/Y'); ?></p> 
				<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
			</div>
		</div>
		<?php
	}
	mysqli_close($conectar);
	?>		
</html>