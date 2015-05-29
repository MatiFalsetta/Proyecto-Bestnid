<?php
	function conectar(){
		$con=mysqli_connect("LocalHost","root","rootpas","proyectobestnid") or die ("ERROR".mysqli_error($conexion));
		return $con;
	}
?>