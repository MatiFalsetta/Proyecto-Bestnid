<?php
	include_once("./conectar.php");
	$conec=conectar();
	$nombre=$_POST["categoria"];
	$sql= "INSERT INTO categoria (nombre) VALUES ('$nombre')";
	mysqli_query($conec,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../index.php");
?>