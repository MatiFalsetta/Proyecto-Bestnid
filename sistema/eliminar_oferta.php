<?php
	include_once("./conectar.php");
	$conec=conectar();
	$idSubasta=$_POST["idSubasta"];
	$idOferta=$_POST["idOferta"];
	$sql= "DELETE FROM oferta WHERE idOferta='$idOferta'";
	mysqli_query($conec,$sql);
	header("Location: ../ver_subasta.php?id=$idSubasta&error=18");
?>