<?php
	session_start();
	if($_SESSION['usuario'] == ''){
		header('Location: ./index.php?error=0');
	}
	include_once('./sistema/conectar.php');
	$idUsuario = $_SESSION['usuario'];
	$conectar=conectar();
	$idSubasta=$_GET['id'];
	$resultado=mysqli_query($conectar,"SELECT * FROM subasta INNER JOIN oferta ON (subasta.idOfertaGanadora = oferta.idOferta) INNER JOIN usuario ON (subasta.IdUsuario = usuario.idUsuario) WHERE subasta.idSubasta = $idSubasta AND oferta.idUsuario = $idUsuario AND pago = 0");
	if(mysqli_num_rows($resultado) == 0){
		header('Location: ./index.php?error=0');
	}
	$subasta=mysqli_fetch_array($resultado);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Pagar Subasta</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" type="text/css" href="./estilos/mas_estilos.css">
		<link rel="stylesheet" type="text/css" href="./estilos/nuevos_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor-registro">
					<h2>Pagar subasta con tarjeta de Credito/Debito</h2>
					<h3>Ingresar datos de la tarjeta:</h3></br>
					<div class="oferta" style="width: 400px; height: 120px; text-align: center;">
						<h2>Monto total a abonar: $<?php echo $subasta['precio']; ?></h2>
						<h3>Correo del subastador:</h3>
						<h3><?php echo $subasta['mail']; ?></h3>
					</div></br>
					<form method="POST" name="pago" action="./sistema/pagar_subasta.php">
						<?php
							$resul=mysqli_query($conectar,"SELECT * FROM usuario WHERE idUsuario='$idUsuario'");
							$usuario=mysqli_fetch_array($resul);
							$fecha=$usuario['fechaNac'];
							echo 'Pais:</br>';
							include ('./paises.html');
						?>
						</br>
						Numero de Tarjeta:</br>
						<input type="number" id="tarjeta" name="tarjeta" value="<?php echo $usuario['tarjetaCredito']; ?>"></br>
						Tipo de Tarjeta:</br>
						<select name="tipoTarjeta">
							<option value="visa">VISA</option>
							<option value="mastercard">MasterCard</option>
							<option value="discover">Discover</option>
							<option value="americanexpres">American Expres</option>
						</select></br>
						Correo electronico:</br>
						<input type="email" id="email" name="user" value="<?php echo $usuario['mail']; ?>"></br>
						Clave:</br>
						<input type="password" id="pass" name="pass" value="<?php echo $usuario['contrasenia']; ?>"></br>
						Repita la Clave:</br>
						<input type="password" id="pass2" name="pass2" value="<?php echo $usuario['contrasenia']; ?>"></br>
						DNI:</br>
						<input type="number" id="dni" name="DNI" value="<?php echo $usuario['dni']; ?>"></br>
						<input type="hidden" name="idSubasta" value="<?php echo $idSubasta; ?>">
						<input type="submit" value="Pagar">
					</form>
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