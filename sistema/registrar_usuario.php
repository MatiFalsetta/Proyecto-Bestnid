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
	$resul=mysqli_query($conectar, "SELECT * FROM usuario WHERE mail='$correo'");
	if(mysqli_num_rows($resul)==0){
		$sql= "INSERT INTO usuario (administrador, fechaNac, mail, nombre, apellido, DNI, tarjetaCredito, contrasenia) VALUES ('0', '$fecha', '$correo', '$nombre', '$apellido', '$DNI', '$tarjeta', '$contrasenia')";
		mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
		header("Location: ../index.php?error=9");
	}
	else {
		header("Location: ../registro.php?error=10");
	}
?>