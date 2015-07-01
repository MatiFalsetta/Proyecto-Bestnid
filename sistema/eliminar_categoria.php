<?php
	include_once("./conectar.php");
	$conec=conectar();
	$id=$_GET["id"];
	$resul=mysqli_query($conec, "SELECT * FROM subastacategoria WHERE idCategoria='$id'");
	if(mysqli_num_rows($resul)==0){
		$sql= "DELETE FROM categoria WHERE idCategoria='$id'";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
		header("Location: ../listar_categorias.php?error=5");
	}
	else{
		header("Location: ../listar_categorias.php?error=-11");
	}
?>