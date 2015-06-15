<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idUsuario=$_SESSION['usuario'];
	$oferta=$_POST["oferta"];
	$idSubasta=$_POST["idSubasta"];
	$pesos=$_POST["pesos"];
	if($oferta != ''){
		$sql= "UPDATE oferta SET descripcion='$oferta', precio='$pesos' WHERE idSubasta='$idSubasta' AND idUsuario='$idUsuario'";
		mysqli_query($conectar,$sql);
		header("Location: ../ver_subasta.php?id=$idSubasta&error=16");
	}
	else{
		header("Location: ../listar_categorias.php?error=17");
	}
?>