<?php
	session_start();
	include_once './conectar.php';
	$conec=conectar();
	$user=$_POST['usermenu'];
	$pass=$_POST['passmenu'];
	$resul=mysqli_query($conec, "SELECT * FROM usuario WHERE mail='$user' AND contrasenia='$pass'");
	if(mysqli_num_rows($resul)!=0){
		$usuario = mysqli_fetch_array($resul);
		$_SESSION['usuario'] = $usuario['idUsuario'];
		$_SESSION['admin'] = $usuario['administrador'];
		$_SESSION['nombre'] = $usuario['nombre'];
		header("Location: ../index.php?error=0");
	}
	else{
		header("Location: ../index.php?error=1");
	}
	mysqli_close($conec);
?>