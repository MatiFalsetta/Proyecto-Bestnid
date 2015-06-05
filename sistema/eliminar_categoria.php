<?php
	include_once("./conectar.php");
	$conec=conectar();
	$id=$_GET["id"];
	$sql= "DELETE FROM categoria WHERE idCategoria='$id'";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../listar_categorias.php?error=5");
?>