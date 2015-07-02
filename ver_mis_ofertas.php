<?php
	session_start();
	if($_SESSION['usuario'] == ''){
		header('Location: ./index.php?error=0');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Ver Mis Ofertas</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/mas_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
					<?php
						include('./sistema/conectar.php');
						$conec=conectar();
						$hoy=date("Y-m-d H:i:s");
						$resul=mysqli_query($conec,"SELECT oferta.IdSubasta, oferta.descripcion AS oferta, subasta.descripcion, subasta.titulo FROM oferta INNER JOIN subasta ON (subasta.idOfertaGanadora = oferta.idOferta) WHERE oferta.idUsuario = $_SESSION[usuario] AND subasta.pago = 0");
						if(mysqli_num_rows($resul)!=0){
			?>
						<div id="contenedor">
							<h2><b>Ofertas Ganadoras! </b></h2>
							<h4>Seleccione una oferta para pagarla: </h4>
			<?php
					while($oferta=mysqli_fetch_array($resul)){
			?>
							<a href='./pagar_subasta.php?id=<?php echo $oferta['IdSubasta']; ?>'><div class='oferta'><div class='o'>Titulo:</div> <?php echo $oferta['titulo']; ?></br>&nbsp</br>
							<div class='o'>Descripcion:</div> <?php echo $oferta['descripcion']; ?></br>&nbsp</br>
							<div class='o'>Oferta:</div> <?php echo $oferta['oferta']; ?></div></a></br>
					<?php
							}
						}
					?>
						</div>
				<div id="contenedor">
					<h2><b>Mis ofertas activas: </b></h2>
					<?php
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
							echo "<b>En este momento no tienen ninguna oferta activa.</b></br>&nbsp";
						}
						mysqli_close($conec);
					?>
				</div>
			</section>
			<aside>
				<?php include ('./aside_botones.php'); ?>
				<a href="./iniciar_subasta.php"><div class="boton_aside">Iniciar subasta</div></a>
				<a href="./ver_mis_subastas.php"><div class="boton_aside">Ver mis subastas</div></a>
				<a href="./ver_mis_ofertas.php"><div style="background-color: #8EF9B2;" class="boton_aside">Ver ofertas realizadas</div></a>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>