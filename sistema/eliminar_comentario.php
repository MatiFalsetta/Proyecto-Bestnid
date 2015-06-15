<?php
	include_once("./conectar.php");
	$conec=conectar();
	$id=$_POST["idSubasta"];
	$idComentario=$_POST["idComentario"];
	$sql= "DELETE FROM comentario WHERE idComentario='$idComentario'";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../ver_subasta.php?id=$id");
?>