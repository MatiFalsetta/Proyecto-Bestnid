<?php
	include_once("./sistema/conectar.php");
	$conectar=conectar();
	$id=$_GET['id'];
	$consulta="SELECT * FROM subasta INNER JOIN usuario ON (subasta.idUsuario = usuario.idUsuario) WHERE idSubasta = '$id'";
	$resul=mysqli_query($conectar,$consulta);
	$subasta=mysqli_fetch_array($resul);
	if($subasta == null) {
		header('Location: ./index.php?error=0');
	}
	$fecha = date_create($subasta['fechaFin']);
	$hoy = new DateTime("now");
	if($fecha < $hoy){
		if(!isset($_SESSION)) {
			session_start();
		}
		if(!isset($_SESSION['usuario'])) {
			header('Location: ./index.php?error=0');
		}
		else{
			if($_SESSION['usuario'] != $subasta['idUsuario'] && $_SESSION['admin'] == 0) {
				header('Location: ./index.php?error=0');
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Bestnid Ver Subasta</title>
		<link href="./estilos/estilo.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" type="text/css" href="./estilos/mas_estilos.css">
		<link href="./estilos/otros_estilos.css" rel="stylesheet" type="text/css">
		<script src="./javascript/validarTextarea.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<?php
				$consultaCateg="SELECT DISTINCT nombre FROM categoria INNER JOIN subastacategoria ON (categoria.idCategoria = subastacategoria.idCategoria) WHERE subastacategoria.idSubasta = '$id'";
				$resulCateg=mysqli_query($conectar,$consultaCateg);
				?>
				<div class="maxiSubasta">
					<div class="maxiFoto"><img src="./<?php echo $subasta['foto'] ?>"></div>
					<div class="maxiDescripcion">
						<p><b>Titulo:</b> <?php echo $subasta['titulo']; ?></p>
						<p><b>Fecha de Inicio:</b> <?php echo date_format(date_create($subasta['fechaInicio']), 'd/m/Y - H:i'); ?>hs.</p> 
						<p><b>Fecha de Finalizacion:</b> <?php echo date_format(date_create($subasta['fechaFin']), 'd/m/Y - H:i'); ?>hs.</p>
						<p><b>Categorias:</b>
						<?php
						while($categoria=mysqli_fetch_array($resulCateg)){
							echo $categoria['nombre'].", ";
						}						
						?></p>
						<p><b>Subastador: </b><?php echo $subasta['nombre']." ".$subasta['apellido']." - ".$subasta['mail']; ?></p>
						<p><b>Descripcion:</b> <?php echo $subasta['descripcion']; ?></p>
					</div>
					<?php
						if(isset($_SESSION['usuario']) && ($_SESSION['admin']=='1' || $_SESSION['usuario']==$subasta['idUsuario'])) {
					?>
							<a href="./ver_ofertas.php?id=<?php echo $id ?>"><div id="boton_ver_ofertas">Ver ofertas</div></a>
							<form method="POST" name="eliminar_subasta" action="./sistema/eliminar_subasta.php">
								<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
								<input type="submit" value="Eliminar subasta">
							</form>
					<?php
						}
					?>
				</div>
				<?php
					if(!isset($_SESSION)) {
						session_start();
					}
					if(isset($_SESSION['usuario']) && $_SESSION['usuario'] != $subasta['idUsuario'] && $fecha > $hoy) {
						$c="SELECT * FROM oferta WHERE idSubasta = '$id' AND idUsuario = '$_SESSION[usuario]'";
						$r=mysqli_query($conectar,$c);
						if(mysqli_num_rows($r)==0) {
				?>
							<div id="oferta">
								<div id="crear_comentario">
								<b>Ofertar por esta subasta:</b>
									<form method="POST" name="crear_oferta" action="./sistema/crear_oferta.php">
										<textarea name="oferta" rows="6" cols="80" id="ofertar" maxlength="1000" placeholder="Por que queres este producto?"></textarea>
										<div id="pesos">
											<p><b>Pesos:&nbsp$</b> <input type="number" id="peso0" name="pesos" min="1" max="9999999999999" step="0.01" size="6" value="1"></p>
										</div>
										<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
										<input type="button" value="Ofertar" onclick="validarOferta()">
									</form>
								</div>
							</div>
				<?php
						}
						else{
							$re=mysqli_fetch_array($r);
				?>
							<div id="oferta">
								<div id="crear_comentario">
								<b>Oferta realizada a esta subasta:</b>
									<form method="POST" name="modificar_oferta" action="./sistema/modificar_oferta.php">
										<textarea name="oferta" rows="6" cols="80" id="ofertar0" maxlength="1000"><?php echo $re['descripcion']; ?></textarea>
										<div id="pesos">
											<p><b>Pesos:&nbsp$</b> <input type="number" id="peso1" name="pesos" min="1" max="9999999999999" step="0.01" size="6" value="<?php echo $re['precio']; ?>"></p>
										</div>
										<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
										<input type="button" value="Modificar" onclick="validarOfertaMod()">
									</form>
									<form method="POST" name="eliminar_oferta" action="./sistema/eliminar_oferta.php">
										<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
										<input type="hidden" name="idOferta" value="<?php echo $re['idOferta']; ?>">
										<input type="submit" value="Eliminar">
									</form>
								</div>
							</div>
				<?php
						}
					}
				?>
				<div id="comentarios">
					<?php
						if(!isset($_SESSION)) {
							session_start();
						}
						if(isset($_SESSION['usuario']) && $fecha > $hoy) {
					?>
							<div id="crear_comentario">
								<form method="POST" name="crear_comentario" action="./sistema/crear_comentario.php">
									<textarea name="comentario" rows="6" cols="80" id="comentario"  maxlength="1000" placeholder="Tienes algo que comentar?"></textarea>
									<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
									<input type="submit" value="Publicar">
								</form>
							</div>
					<?php
						}
						$consultacoment="SELECT comentario.idComentario, comentario.descripcion, comentario.fecha, comentario.idUsuario, usuario.administrador, usuario.mail FROM comentario INNER JOIN usuario ON (comentario.idUsuario = usuario.idUsuario) WHERE idSubasta = '$id' ORDER BY comentario.fecha DESC";
						$resulcoment=mysqli_query($conectar,$consultacoment);
						while($comentario=mysqli_fetch_array($resulcoment)) {
					?>
							<div class="comentario">
								<div class="comentario_encabezado">
									<div class="comentario_encabezado_izq">
										<?php echo $comentario['mail']; ?>:
									</div>
									<div class="comentario_encabezado_der">
										<?php echo date_format(date_create($comentario['fecha']), 'd/m/Y - H:i'); ?>
									</div>
								</div>
								<div class="comentario_texto">
									<?php echo $comentario['descripcion']; ?>
								</div>
								<?php
									if(isset($_SESSION['usuario'])){
										if($_SESSION['admin']=='1' || $comentario['idUsuario']==$_SESSION['usuario'] || $_SESSION['usuario']==$subasta['idUsuario']) {
								?>
											<form method="POST" name="crear_comentario" action="./sistema/eliminar_comentario.php">
												<input type="hidden" name="idComentario" value="<?php echo $comentario['idComentario']; ?>">
												<input type="hidden" name="idSubasta" value="<?php echo $id; ?>">
												<input type="submit" value="Eliminar">
											</form>
								<?php
										}
									}
								?>
							</div>
					<?php
						}
					?>
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