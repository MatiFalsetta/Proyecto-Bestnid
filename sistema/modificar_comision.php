<?php
	include_once("./conectar.php");
	$conectar=conectar();
	$comision=$_POST["comision"];
	$hoy=date("Y-m-d H:i:s");
	$sql= "INSERT INTO comision (porcentaje, fecha) VALUES ('$comision', '$hoy')";
	mysqli_query($conectar,$sql);
	header("Location: ../ver_comision.php?error=24");
?>