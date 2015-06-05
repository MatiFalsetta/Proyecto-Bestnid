<?php
	include_once("./conectar.php");
	$conec=conectar();
	$correo=$_POST["correo"];
	$resul=mysqli_query($conec, "SELECT contrasenia FROM usuario WHERE mail='$correo'");
	if(mysqli_num_rows($resul)!=0){
		$usuario=mysqli_fetch_array($resul);
		$mensaje = "Se ha solicitado una recuperacion de clave.\r\clave: $usuario[contrasenia]";
		mail($correo, 'Recuperacion de clave', $mensaje);
	}
	header("Location: ../index.php");
?>