<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$id=$_POST["id"];
	$nombre=$_POST["categoria"];
	$sql= "UPDATE categoria SET nombre='$nombre' WHERE idCategoria='$id'";
	mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../listar_categorias.php?error=4");
?>