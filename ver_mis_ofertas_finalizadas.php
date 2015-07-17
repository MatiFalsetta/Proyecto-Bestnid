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
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
		<link rel="stylesheet" href="./estilos/mas_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor">
					<a href="./ver_mis_ofertas.php"><div id="boton_ver_ofertas" style="width: 150px; margin-left: 565px; margin-top: 5px; position: absolute;">Volver a mis ofertas</div></a>
					<h2><b>Mis ofertas pagas: </b></h2>
					<?php
						include('./sistema/conectar.php');
						$conec=conectar();
						$hoy=date("Y-m-d H:i:s");
						$resul=mysqli_query($conec,"SELECT usuario.mail, oferta.precio, oferta.IdSubasta, oferta.descripcion AS oferta, subasta.descripcion, subasta.titulo FROM oferta INNER JOIN subasta ON (oferta.IdSubasta = subasta.idSubasta) INNER JOIN usuario ON (usuario.idUsuario = subasta.IdUsuario) WHERE oferta.idUsuario=$_SESSION[usuario] AND subasta.pago = 1 ORDER BY subasta.fechaFin");
						if(mysqli_num_rows($resul)!=0){
						while($oferta=mysqli_fetch_array($resul)){
					?>
							<div class='oferta'>
								<div class='o'>Titulo:</div> <?php echo $oferta['titulo']; ?></br>&nbsp</br>
								<div class='o'>Correo del subastador:</div> <?php echo $oferta['mail']; ?></br>&nbsp</br>
								<div class='o'>Descripcion:</div> <?php echo $oferta['descripcion']; ?></br>&nbsp</br>
								<div class='o'>Oferta:</div> <?php echo $oferta['oferta']; ?></br>&nbsp</br>
								<div class='o'>Precio: $</div> <?php echo $oferta['precio']; ?>
							</div></br>
					<?php
							}
						}
						else{
							echo "<b>Aun no ha pagado ninguna oferta.</b></br>&nbsp";
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