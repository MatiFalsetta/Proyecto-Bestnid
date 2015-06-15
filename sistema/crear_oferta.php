<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idUsuario=$_SESSION['usuario'];
	$oferta=$_POST["oferta"];
	$idSubasta=$_POST["idSubasta"];
	$pesos=$_POST["pesos"];
	$fecha=date("Y-m-d H:i:s");
	$sql= "INSERT INTO oferta (ganador, descripcion, precio, fecha, idSubasta, idUsuario) VALUES ('0', '$oferta', '$pesos', '$fecha', '$idSubasta', '$idUsuario')";
	mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../ver_subasta.php?id=$idSubasta");
?>