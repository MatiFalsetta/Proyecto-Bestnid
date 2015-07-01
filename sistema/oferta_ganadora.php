<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idOferta=$_POST['idOferta'];
	$idSubasta=$_POST["idSubasta"];
	$sql= "UPDATE subasta SET idOfertaGanadora='$idOferta'WHERE idSubasta='$idSubasta'";
	mysqli_query($conectar,$sql);
	header("Location: ../ver_ofertas.php?id=$idSubasta&error=21");
?>