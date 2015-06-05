<?php
	session_start();
	if($_SESSION['usuario'] != '1'){
		header('Location: ./index.php?error=-1');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
					include('./sistema/conectar.php');
					$conec=conectar();
					$resul=mysqli_query($conec,"SELECT * FROM categoria");
					while($categoria=mysqli_fetch_array($resul)){
						echo "$categoria[nombre]
						<a href='./editar_categoria.php?id=$categoria[idCategoria]&nom=$categoria[nombre]'>Editar</a>
						<a href='./sistema/eliminar_categoria.php?id=$categoria[idCategoria]'>Eliminar</a></br>";
					}
					mysqli_close($conec);
				?>
			</section>
			<aside>
				Bloque de al lado </br>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>