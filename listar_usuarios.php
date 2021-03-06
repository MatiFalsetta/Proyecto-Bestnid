<?php
	session_start();
	if($_SESSION['admin'] != '1'){
		header('Location: ./index.php?error=0');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Ver Usuarios</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<div id="contenedor">
					<?php
						if(isset($_GET["id"])) {
							$id=$_GET["id"];
							$admin=$_GET["admin"];
							if($admin == 0){
					?>
								<form method="POST" name="categoria" action="./sistema/deshacer_admin.php">
									<h4>¿Esta seguro que desea quitarle los permisos de administrador?</h4>
									<div class="caja">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="submit" value="SI">
									</div>
								</form>
					<?php
							}
							else {
					?>
								<form method="POST" name="categoria" action="./sistema/hacer_admin.php">
									<h4>¿Esta seguro que desea darle los permisos de administrador?</h4>
									<div class="caja">
										<input type="hidden" name="id" value="<?php echo $id ?>">
										<input type="submit" value="SI">
									</div>
								</form>
					<?php
							}
					?>
							<form method="POST" name="categoria" action="./listar_usuarios.php">
								<div class="caja">
									<input type="submit" value="NO">
								</div>
							</form>
					<?php
						}
					?>
					</br>
					<h3><b>Administradores: </b></h3>
					<?php
						include('./sistema/conectar.php');
						$conec=conectar();
						$resul=mysqli_query($conec,"SELECT * FROM usuario WHERE administrador = 1 ORDER BY mail");
						while($usuario=mysqli_fetch_array($resul)){
							echo "<div class='nombre_config'>$usuario[mail]</div> ";
							echo "<a href='./listar_usuarios.php?id=$usuario[idUsuario]&admin=0'><div class='boton_config2'>Quitar permisos de Admin</div></a></br>";
						}
						$resul=mysqli_query($conec,"SELECT * FROM usuario WHERE administrador = 0 ORDER BY mail");
						echo "<h3><b>Usuarios: </b></h3>";
						while($usuario=mysqli_fetch_array($resul)){
							echo "<div class='nombre_config'>$usuario[mail]</div> ";
							echo "<a href='./listar_usuarios.php?id=$usuario[idUsuario]&admin=1'><div class='boton_config2'>Dar permisos de Admin</div></a></br>";
						}
						mysqli_close($conec);
					?>
					</br>&nbsp
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