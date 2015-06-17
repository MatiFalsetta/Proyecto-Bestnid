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
		<title>Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/mas_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="mis_ofertas">
					<h2><b>Mis ofertas realizadas: </b></h2>
					<?php
						include('./sistema/conectar.php');
						$conec=conectar();
						$hoy=date("Y-m-d H:i:s");
						$resul=mysqli_query($conec,"SELECT oferta.IdSubasta, oferta.descripcion AS oferta, subasta.descripcion, subasta.titulo FROM oferta INNER JOIN subasta ON (oferta.IdSubasta = subasta.idSubasta) WHERE oferta.idUsuario=$_SESSION[usuario] AND subasta.fechaFin > '$hoy' ORDER BY subasta.fechaFin");
						if(mysqli_num_rows($resul)!=0){
							while($oferta=mysqli_fetch_array($resul)){
								echo "<a href='./ver_subasta.php?id=$oferta[IdSubasta]'><div class='oferta'><div class='o'>Titulo:</div> $oferta[titulo]</br>&nbsp</br>
								<div class='o'>Descripcion:</div> $oferta[descripcion]</br>&nbsp</br>
								<div class='o'>Oferta:</div> $oferta[oferta]</div></a></br>";
							}
						}
						else{
							echo "<b>Aun no has realizado ninguna oferta.</b></br>&nbsp";
						}
						mysqli_close($conec);
					?>
				</div>
			</section>
			<aside>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>