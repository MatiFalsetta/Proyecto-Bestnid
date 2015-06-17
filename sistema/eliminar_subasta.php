<?php
	include_once("./conectar.php");
	$conectar=conectar();
	$idSubasta=$_POST["idSubasta"];
	$consulta="SELECT * FROM oferta WHERE idSubasta = '$idSubasta'";
	$resultado=mysqli_query($conectar,$consulta);
	$consulta2="SELECT * FROM comentario WHERE idSubasta = '$idSubasta'";
	$resultado2=mysqli_query($conectar,$consulta2);
	if(mysqli_num_rows($resultado) == 0 && mysqli_num_rows($resultado2) == 0) {
		$sql= "DELETE FROM subasta WHERE idSubasta='$idSubasta'";
		mysqli_query($conectar,$sql);
		$sql2= "DELETE FROM subastacategoria WHERE idSubasta='$idSubasta'";
		mysqli_query($conectar,$sql2);
		header("Location: ../index.php?error=19");
	}
	else{
		header("Location: ../ver_subasta.php?id=$idSubasta&error=20");
	}
?>