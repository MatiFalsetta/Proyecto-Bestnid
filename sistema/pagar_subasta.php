<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idUsuario=$_SESSION['usuario'];
	$pais=$_POST["pais"];
	$tarjeta=$_POST["tarjeta"];
	$tipoTarjeta=$_POST["tipoTarjeta"];
	$email=$_POST["user"];
	$clave=$_POST["pass"];
	$clave2=$_POST["pass2"];
	$DNI=$_POST["DNI"];
	$idSubasta=$_POST["idSubasta"];
	$resultado=mysqli_query($conectar,"SELECT * FROM usuario WHERE idUsuario = $idUsuario AND tarjetaCredito = $tarjeta AND mail = '$email' AND contrasenia = '$clave' AND dni = $DNI");
	if($clave == $clave2 && mysqli_num_rows($resultado) != 0){
		$sql= "UPDATE subasta SET pago='1' WHERE idSubasta='$idSubasta'";
		mysqli_query($conectar,$sql);
		header("Location: ../ver_mis_ofertas.php?error=22");
	}
	else{
		header("Location: ../pagar_subasta.php?id=$idSubasta&error=-23");
	}
?>