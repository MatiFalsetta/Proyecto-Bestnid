<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idUsuario=$_SESSION['usuario'];
	$comentario=$_POST["comentario"];
	$idSubasta=$_POST["idSubasta"];
	$fecha=date("Y-m-d H:i:s");
	if($comentario!='') {
		$sql= "INSERT INTO comentario (descripcion, fecha, idSubasta, idUsuario) VALUES ('$comentario', '$fecha', '$idSubasta', '$idUsuario')";
		mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	}
	header("Location: ../ver_subasta.php?id=$idSubasta");
?>