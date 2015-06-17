<?php
	include_once("./sistema/conectar.php");
	$conectar=conectar();
	$id=$_GET['id'];
	$consulta="SELECT * FROM subasta WHERE idSubasta = '$id'";
	$resul=mysqli_query($conectar,$consulta);
	$subasta=mysqli_fetch_array($resul);
	if($subasta == null) {
		header('Location: ./index.php?error=-1');
	}
	if(!isset($_SESSION)) {
		session_start();
	}
	if(!isset($_SESSION['usuario'])) {
		header('Location: ./index.php?error=-1');
	}
	else{
		if($_SESSION['usuario'] != $subasta['idUsuario'] && $_SESSION['admin'] == 0) {
			header('Location: ./index.php?error=-1');
		}
	}
	
	$fecha = date_create($subasta['fechaFin']);
	$hoy = new DateTime("now");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/mas_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<h2><b>Ofertas realizadas: </b></h2>
				<?php
					$hoy=date("Y-m-d H:i:s");
					$resul=mysqli_query($conectar,"SELECT descripcion FROM oferta WHERE IdSubasta='$id' ORDER BY fecha");
					while($oferta=mysqli_fetch_array($resul)){
						echo "$oferta[descripcion]</br>&nbsp</br>";
					}
				?>
			</section>
			<aside>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>