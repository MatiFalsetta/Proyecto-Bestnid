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
		<title>Bestnid Ver Categorias</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
		<link rel="stylesheet" href="./estilos/nuevos_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
			<div id="contenedor">
				<h3><b>Agregar categoria: </b></h3>
				<form method="POST" name="categoria" action="./sistema/agragar_categoria.php">
					<div class="caja">
						<input type="text" id="categoria" name="categoria" placeholder="Nombre">
						<div class="selec">
							<input type="button" value="Agregar" onclick="validaragregar()">
						</div>
					</div>
				</form>
				</br>&nbsp
				<h3><b>Categorias: </b></h3>
				<?php
					$ok=false;
					if(isset($_GET["id"])) {
						$id=$_GET["id"];
						$nom=$_GET["nom"];
						$ok=true;
					}
					include('./sistema/conectar.php');
					$conec=conectar();
					$resul=mysqli_query($conec,"SELECT * FROM categoria");
					while($categoria=mysqli_fetch_array($resul)){
						if($ok && $categoria['nombre'] == $nom){
				?>
							<form method="POST" name="edit_categoria" action="./sistema/editar_categoria.php">
								<div class="caja">
									<input type="text" style="background-color: #00FF80;" id="edit_categoria" name="edit_categoria" value="<?php echo $nom ?>">
									<input type="hidden" name="id" value="<?php echo $id ?>">
									<div class="selec">
										<input type="button" value="Modificar" onclick="validarmodificar()">
									</div>
								</div>
							</form></br>
				<?php
						}
						else{
				?>
							<div class='nombre_config2'><?php echo $categoria['nombre'] ?></div>
							<a href='./listar_categorias.php?id=<?php echo $categoria['idCategoria'] ?>&nom=<?php echo $categoria['nombre'] ?>'><div class='boton_config'>Editar</div></a>
							<a href='./sistema/eliminar_categoria.php?id=<?php echo $categoria['idCategoria'] ?>'><div class='boton_config'>Eliminar</div></a>
				<?php
						}
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