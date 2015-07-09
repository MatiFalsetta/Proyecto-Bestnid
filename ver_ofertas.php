<?php
	include_once("./sistema/conectar.php");
	$conectar=conectar();
	$id=$_GET['id'];
	$hoy=date("Y-m-d H:i:s");
	$consulta="SELECT * FROM subasta WHERE idSubasta = '$id'";
	$resul=mysqli_query($conectar,$consulta);
	$subasta=mysqli_fetch_array($resul);
	if($subasta == null) {
		header('Location: ./index.php?error=0');
	}
	if(!isset($_SESSION)) {
		session_start();
	}
	if(!isset($_SESSION['usuario'])) {
		header('Location: ./index.php?error=0');
	}
	else{
		if($_SESSION['usuario'] != $subasta['IdUsuario'] && $_SESSION['admin'] == 0) {
			header('Location: ./index.php?error=0');
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Ver Ofertas</title>
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
					<a href="./ver_subasta.php?id=<?php echo $id ?>"><div id="boton_ver_ofertas" style="width: 150px; margin-left: 565px; margin-top: 5px; position: absolute;">Volver a la Subasta</div></a>
					</br>
					<?php
						if(isset($_GET["oferta"]) && $subasta['fechaFin'] < $hoy && $subasta['idOfertaGanadora'] == -1) {
							$idOferta=$_GET["oferta"];
					?>
							<form method="POST" name="ofertaganadora" action="./sistema/oferta_ganadora.php">
								<h4>¿Esta seguro que desea elegir esa oferta como la ganadora?</h4>
								<div class="caja" style="margin-left: 125px;">
									<input type="hidden" name="idOferta" value="<?php echo $idOferta ?>">
									<input type="hidden" name="idSubasta" value="<?php echo $id ?>">
									<input type="submit" value="SI">
								</div>
							</form>
							<form method="POST" name="categoria" action="./ver_ofertas.php?id=<?php echo $id ?>">
								<div class="caja">
									<input type="submit" value="NO">
								</div>
							</form>
							</br>
					<?php
						}
					?>
					<h2><b>Ofertas realizadas: </b></h2>
					<?php
						$resultado=mysqli_query($conectar,"SELECT usuario.mail, oferta.precio, oferta.descripcion, subasta.pago FROM subasta INNER JOIN oferta ON (subasta.idOfertaGanadora = oferta.idOferta) INNER JOIN usuario ON (oferta.IdUsuario = usuario.idUsuario) WHERE subasta.idSubasta = $id");
						if(mysqli_num_rows($resultado) != 0){
							?>
								<h3>GANADORA: </h3>
							<?php
							$o=mysqli_fetch_array($resultado);
							if($o['pago'] == 0){
								$pagado='LA OFERTA AUN NO ESTA PAGA';
							}
							else{
								$pagado='LA OFERTA YA FUE PAGADA!';
							}
							//FA6800
							echo "<div class='oferta' style='background-color: #FDFD55'>
								<div class='o'>Correo ganador:</div> $o[mail]</br></br>
								<div class='o'>Descripcion:</div> $o[descripcion]</br></br>
								<div class='o'>Valor de la oferta: </div> $$o[precio]</br>
								<h3 style='text-align: center; margin-bottom: 5px;'>$pagado</h3>
							</div></br>";
							?>
				</div>
				<div id="contenedor">
								</br>
								<h2>Todas las ofertas: </h2>
							<?php
						}
						$resul=mysqli_query($conectar,"SELECT * FROM oferta WHERE IdSubasta='$id' ORDER BY fecha");
						if(mysqli_num_rows($resul) != 0){
							if ($subasta['fechaFin'] < $hoy && $subasta['idOfertaGanadora'] == -1 && $_SESSION['usuario'] == $subasta['IdUsuario']) {
								?>
									<h3>Elegir al ganador: </h3>
									</br>
								<?php
								while($oferta=mysqli_fetch_array($resul)){
									echo "<a href='./ver_ofertas.php?id=$id&oferta=$oferta[idOferta]'><div class='oferta'><div class='o'>Descripcion:</div> $oferta[descripcion]</div></a></br>";
								}
							}
							else {
								while($oferta=mysqli_fetch_array($resul)){
									echo "<div class='oferta'><div class='o'>Descripcion:</div> $oferta[descripcion]</div></br>";
								}
							}
						}
						else {
							echo "<h5>No hay ninguna oferta para esta subasta. </h5>";
						}
					?>
					</br>
				</div>
			</section>
			<aside>
				<?php include ('./aside_botones.php'); ?>
				<a href="./iniciar_subasta.php"><div class="boton_aside">Iniciar subasta</div></a>
				<a href="./ver_mis_subastas.php"><div class="boton_aside">Ver mis subastas</div></a>
				<a href="./ver_mis_ofertas.php"><div class="boton_aside">Ver ofertas realizadas</div></a>
			</aside>
		</div>
		<footer>
			<span>Derechos Reservados &copy; 2015-2016</span>
		</footer>
	</body>
</html>