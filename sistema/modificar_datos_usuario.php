<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$correo=$_POST["user"];
	$contrasenia=$_POST["pass"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$DNI=$_POST["DNI"];
	$tarjeta=$_POST["tarjeta"];
	$fecha=$_POST["fecha"];
	//$fecha=$fecha[6].$fecha[7].$fecha[8].$fecha[9].'-'.$fecha[3].$fecha[4].'-'.$fecha[0].$fecha[1];
	$idUsuario = $_SESSION['usuario'];
	$resul=mysqli_query($conectar, "SELECT mail FROM usuario WHERE idUsuario='$idUsuario'");
	$resultado=mysqli_query($conectar, "SELECT mail FROM usuario WHERE mail='$correo'");
	$usuario=mysqli_fetch_array($resul);
	if(mysqli_num_rows($resultado)==0 || $usuario['mail']==$correo){
		$sql= "UPDATE usuario SET fechaNac='$fecha', mail='$correo', nombre='$nombre', apellido='$apellido', DNI='$DNI', tarjetaCredito='$tarjeta', contrasenia='$contrasenia' WHERE idUsuario=$idUsuario";
		mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	}
	header("Location: ../index.php");
?>