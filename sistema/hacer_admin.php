<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$id=$_POST["id"];
	$sql= "UPDATE usuario SET administrador='1' WHERE idUsuario='$id'";
	mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../listar_usuarios.php?error=15");
?>