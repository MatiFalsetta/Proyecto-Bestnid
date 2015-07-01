<?php
	if (!isset($_SESSION)) {
		session_start();
	}
	if($_SESSION['usuario'] == ''){
		header('Location: ./index.php?error=0');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" type="text/css" href="./estilos/nuevos_estilos.css">
	</head>
	<?php
		include_once("./sistema/conectar.php");
		if(!isset($_SESSION)){
			session_start();
		}
		$idUsuario=$_SESSION['usuario'];
		$conectar=conectar();
		$hoy=date('Y-m-d H:i:s');
		$consulta="SELECT DISTINCT subasta.idOfertaGanadora, subasta.idSubasta, subasta.titulo, subasta.descripcion, subasta.foto, subasta.fechaInicio, subasta.fechaFin FROM subasta INNER JOIN subastacategoria ON (subasta.idSubasta = subastacategoria.idSubasta) INNER JOIN categoria ON (subastacategoria.idCategoria = categoria.idCategoria) WHERE subasta.idUsuario = '$idUsuario'";
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
		$resul=mysqli_query($conectar,$consulta);
		while($subasta=mysqli_fetch_array($resul)){
			if($subasta['fechaFin'] < $hoy) {
				if($subasta['idOfertaGanadora'] == -1) {
					$c="SELECT * FROM subasta INNER JOIN oferta ON (subasta.idSubasta = oferta.idSubasta) WHERE subasta.idSubasta = $subasta[idSubasta]";
					$r=mysqli_query($conectar,$c);
					if(mysqli_num_rows($r) > 0) {
	?>
						<div class="miniSubasta" style="background-color: #8EF9B2;">
							<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
								<div class="miniFoto">
									<img src="./<?php echo $subasta['foto'] ?>">
									<a href="./ver_ofertas.php?id=<?php echo $subasta['idSubasta'] ?>"><div id="ver_ofertas">Elegir Ganador</div></a>
								</div>
							</a>
							<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
								<div class="miniDescripcion">
									<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
									<p><b>FINALIZADA</b></p> 
									<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
								</div>
							</a>
						</div>
	<?php
					}
					else {
	?>
						<div class="miniSubasta">
							<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
								<div class="miniFoto">
									<img src="./<?php echo $subasta['foto'] ?>">
								</div>
							</a>
							<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
								<div class="miniDescripcion">
									<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
									<p><b>FINALIZADA</b></p> 
									<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
								</div>
							</a>
						</div>
	<?php
						
					}
				}
				else {
	?>
				<div class="miniSubasta">
					<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
						<div class="miniFoto">
							<img src="./<?php echo $subasta['foto'] ?>">
						</div>
					</a>
					<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
						<div class="miniDescripcion">
							<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
							<p><b>FINALIZADA</b></p> 
							<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
						</div>
					</a>
				</div>
	<?php					
				}
			}
			else {
	?>
				<a href="./ver_subasta.php?id=<?php echo $subasta['idSubasta']; ?>">
					<div class="miniSubasta">
						<div class="miniFoto">
							<img src="./<?php echo $subasta['foto'] ?>">
						</div>
						<div class="miniDescripcion">
							<b>Titulo:</b> <?php echo $subasta['titulo']; ?></br>
							<p><b>Fecha de Inicio:</b> <?php echo date_format(date_create($subasta['fechaInicio']), 'd/m/Y'); ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
							<b>Fecha de Finalizacion:</b> <?php echo date_format(date_create($subasta['fechaFin']), 'd/m/Y'); ?></p> 
							<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
						</div>
					</div>
				</a>
	<?php
			}
		}
		mysqli_close($conectar);
	?>
</html>