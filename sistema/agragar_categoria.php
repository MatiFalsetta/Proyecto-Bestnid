<?php
	include_once("./conectar.php");
	$conec=conectar();
	$nombre=$_POST["categoria"];
	$resul=mysqli_query($conec, "SELECT * FROM categoria WHERE nombre='$nombre'");
	if(mysqli_num_rows($resul)==0){
		$sql= "INSERT INTO categoria (nombre) VALUES ('$nombre')";
		mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
		header("Location: ../listar_categorias.php?error=3");
	}
	else {
		header("Location: ../listar_categorias.php?error=13");
	}
?>