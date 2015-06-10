<?php
	session_start();
	if($_SESSION['usuario'] != '1'){
		header('Location: ./index.php?error=-1');
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="iso-8859-1">
		<title>Configuracion</title>
		<link rel="stylesheet" href="./estilos/estilo.css">
		<link rel="stylesheet" href="./estilos/otros_estilos.css">
		<script src="./javascript/validarCategoriaAgregarModificar.js"></script>
	</head>
	<body>
		<?php include ('./menu.php'); ?>
		<div id='cuerpo'>
			<section>
				<h3><b>Agregar categoria: </b></h3>
				<form method="POST" name="categoria" action="./sistema/agragar_categoria.php">
					<div class="caja">
						<input type="text" id="categoria" name="categoria" placeholder="Nombre">
						<input type="button" value="Agregar" onclick="validaragregar()">
					<div>
				</form>
				<?php
					if(isset($_GET["id"])) {
						$id=$_GET["id"];
						$nom=$_GET["nom"];
				?>
				<h3><b>Modificar categoria: </b></h3>
				<form method="POST" name="edit_categoria" action="./sistema/editar_categoria.php">
					<div class="caja">
						<input type="text" id="edit_categoria" name="edit_categoria" value="<?php echo $nom ?>">
						<input type="hidden" name="id" value="<?php echo $id ?>">
						<input type="button" value="Modificar" onclick="validarmodificar()">
					</div>
				</form>
				<?php
					}
				?>				
				<h3><b>Categorias: </b></h3>
				<?php
					include('./sistema/conectar.php');
					$conec=conectar();
					$resul=mysqli_query($conec,"SELECT * FROM categoria");
					while($categoria=mysqli_fetch_array($resul)){
						echo "<div class='nombre_config2'>$categoria[nombre]</div> ";
						echo "<a href='./listar_categorias.php?id=$categoria[idCategoria]&nom=$categoria[nombre]'><div class='boton_config'>Editar</div></a> ";
						echo "<a href='./sistema/eliminar_categoria.php?id=$categoria[idCategoria]'><div class='boton_config'>Eliminar</div></a>";
					}
					mysqli_close($conec);
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