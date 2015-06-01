<?php
	$uploadedfileload = "true";
	$uploadedfile_size = $_FILES['uploadedfile']['size'];
	if ($_FILES['uploadedfile']['size']>2000000) {
		$msg = "El archivo es mayor que 2MB, debes reduzcirlo antes de subirlo";
		$uploadedfileload="false";
	}
	if (!($_FILES['uploadedfile']['type'] == "image/pjpeg" OR $_FILES['uploadedfile']['type'] == "image/jpeg")) {
		$msg = "Tu archivo tiene que ser JPG. Otros archivos no son permitidos";
		$uploadedfileload = "false";
	}
	$img_name = $_FILES['uploadedfile']['name'];
	$add = "imagenes/$img_name";
	if ($uploadedfileload == "true") {
		if (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)) {
			$msg = "Ha sido subido satisfactoriamente";
		}
		else {
			$msg = "Error al subir el archivo. Intente nuevamente.";
		}
	}
	echo $msg;
?>
