<?php
	include_once("./conectar.php");
	$conectar=conectar();
	$correo=$_POST["user"];
	$contrasenia=$_POST["pass"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$DNI=$_POST["DNI"];
	$tarjeta=$_POST["tarjeta"];
	$fecha=$_POST["fecha"];
	$fecha=$fecha[6].$fecha[7].$fecha[8].$fecha[9].'-'.$fecha[3].$fecha[4].'-'.$fecha[0].$fecha[1];
	$sql= "INSERT INTO usuario (administrador, fechaNac, mail, nombre, apellido, DNI, tarjetaCredito, contrasenia) VALUES ('$0', '$fecha', '$correo', '$nombre', '$apellido', '$DNI', '$tarjeta', '$contrasenia')";
	mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	header("Location: ../index.php?");
?>