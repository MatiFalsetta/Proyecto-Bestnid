<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$id=$_POST["id"];
	$nombre=$_POST["edit_categoria"];
	$resul=mysqli_query($conectar, "SELECT * FROM categoria WHERE nombre='$nombre'");
	if(mysqli_num_rows($resul)==0){
		$sql= "UPDATE categoria SET nombre='$nombre' WHERE idCategoria='$id'";
		mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
		header("Location: ../listar_categorias.php?error=4");
	}
	else{
		header("Location: ../listar_categorias.php?error=12");
	}
?>