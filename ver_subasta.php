<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Inicio</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
				include_once("./sistema/conectar.php");
				$conectar=conectar();
				$id=$_GET['id'];
				$consulta="SELECT * FROM subasta INNER JOIN usuario ON (subasta.idUsuario = usuario.idUsuario) WHERE idSubasta = '$id'";
				$resul=mysqli_query($conectar,$consulta) or die('Error: ' . mysqli_error($con));
				$subasta=mysqli_fetch_array($resul);
				$consultaCateg="SELECT DISTINCT nombre FROM categoria INNER JOIN subastacategoria ON (categoria.idCategoria = subastacategoria.idCategoria) WHERE subastacategoria.idSubasta = '$id'";
				$resulCateg=mysqli_query($conectar,$consultaCateg) or die('Error: ' . mysqli_error($con));
				?>
				<div class="maxiSubasta">
					<div class="maxiFoto"><img src="./<?php echo $subasta['foto'] ?>"></div>
					<div class="maxiDescripcion">
						<p><b>Titulo:</b> <?php echo $subasta['titulo']; ?></p>
						<p><b>Fecha de Inicio:</b> <?php echo date_format(date_create($subasta['fechaInicio']), 'd/m/Y'); ?>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
						<b>Fecha de Finalizacion:</b> <?php echo date_format(date_create($subasta['fechaFin']), 'd/m/Y'); ?></p>
						<p><b>Categorias:</b>
						<?php
						while($categoria=mysqli_fetch_array($resulCateg)){
							echo $categoria['nombre'].", ";
						}						
						?></p>
						<p><b>Subastador: </b><a href="./ver_usuario.php?id=<?php echo $subasta['idUsuario']; ?>"><?php echo $subasta['nombre']." ".$subasta['apellido']; ?></a></p>
						<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
					</div>
				</div>
			</section>
			<aside>
				<?php include ('./aside.php'); ?>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>