<?php
	session_start();
	if($_SESSION['usuario'] != '1'){
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
				<div id="contenedor">&nbsp
					<?php
						$fi=date("Y-m-d", (mktime(0, 0, 0, date('m')-1, date('d'),   date('Y'))));
						$ff=date('Y-m-d');
						if(isset($_GET['fi'])){
							$fi=$_GET['fi'];
							$ff=$_GET['ff'];
							include_once("./sistema/conectar.php");
							$conectar=conectar();
							$resultado=mysqli_query($conectar,"SELECT precio, fechaFin FROM subasta INNER JOIN oferta ON (subasta.idOfertaGanadora = oferta.idOferta) WHERE subasta.pago = 1 AND subasta.fechaFin > '$fi' AND subasta.fechaFin < '$ff'");
							$pesos = 0;
							while($precio=mysqli_fetch_array($resultado)){
								$resul=mysqli_query($conectar,"SELECT * FROM comision WHERE fecha < '$precio[fechaFin]' ORDER BY idComision DESC");
								$comision=mysqli_fetch_array($resul);
								$pesos = $pesos + $precio['precio'] * $comision['porcentaje'] / 100;
							}
					?>
							<div class='oferta' style="text-align: center;">
								<h4><b>Ganancias obtenidas entre <?php echo date_format(date_create($fi), 'd/m/Y'); ?> y <?php echo date_format(date_create($ff), 'd/m/Y'); ?>: </b></h4>
								<h2><b>$<?php echo $pesos; ?></b></h2>
							</div>
							</br>
					<?php
						}
					?>
					<h4>Seleccione una fecha de inicio y de fin para ver las ganancias entre ambas:</h4></br>
					<form method="GET" name="fechas_ganancia" action="./ver_ganancias.php">
						<b>Inicio:</b> <input type="date" name="fi" value="<?php echo $fi; ?>" max="<?php echo date('Y-m-d'); ?>">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<b>Fin:</b> <input type="date" name="ff" value="<?php echo $ff; ?>" max="<?php echo date('Y-m-d'); ?>">
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						<input type="submit" value="Enviar">
					</form>
					</br> &nbsp </br>
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