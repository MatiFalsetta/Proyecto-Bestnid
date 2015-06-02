<?php
	include_once("./conectar.php");
	session_start();
	$conectar=conectar();
	$idUsuario = $_SESSION['usuario'];
	$titulo=$_POST["titulo"];
	$descripcion=$_POST["descripcion"];
	$fechaFin=$_POST["fechafin"];
	$fechaInicio=date('Y-m-d');
	$imagenNombre=$_FILES['imagen']['name'];
	$imagen="imagenes/$imagenNombre";
	move_uploaded_file($_FILES['imagen']['tmp_name'], "../".$imagen);
	$sql= "INSERT INTO subasta (titulo, descripcion, foto, fechaInicio, fechaFin, idUsuario) VALUES ('$titulo', '$descripcion', '$imagen', '$fechaInicio', '$fechaFin', '$idUsuario')";
	mysqli_query($conectar,$sql) or die('Error: ' . mysqli_error($con));
	$idSubasta=mysqli_insert_id($conectar);
	$categorias=$_POST["categoria"];
	$count = count($categorias);
    for ($i = 0; $i < $count; $i++) {
        mysqli_query($conectar,"INSERT INTO subastacategoria (idSubasta, idCategoria) VALUES ('$idSubasta', '$categorias[$i]')") or die('Error: ' . mysqli_error($con));
    }
	header("Location: ../index.php?");
?>