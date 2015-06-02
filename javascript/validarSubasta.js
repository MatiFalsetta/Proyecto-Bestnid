function validarSubasta(){
	if ($('#titulo').val().length < 2 || $('#titulo').val().length > 200) {
		alert("Ingrese un titulo con menos de 200 caracteres.");
        document.subasta.titulo.focus();
        return (false);
	}
	if ($('#descripcion').val().length == 0) {
		alert("Ingrese una descripcion.");
        document.subasta.descripcion.focus();
        return (false);
	}
	$b=0;
	chk=document.getElementsByName("categoria[]")
	for($i=0 ; $i<chk.length ; $i++) {
		if(chk.item($i).checked) {
			$b++;
		}
	}
	if($b == 0) {
		alert("Seleccione al menos una opcion.");
		return false;
	}
	if ($('#imagen').val().length == 0) {
		alert("Ingrese una imagen.");
        return (false);
	}
	if (document.subasta.imagen.files[0].size > 2000000) {
		alert("Ingrese una imagen menor a 2mb.");
        return (false);
	}
	$a = document.getElementById('imagen').value.lastIndexOf(".png");
	$b = document.getElementById('imagen').value.lastIndexOf(".jpg");
	if ($a == -1 && $b == -1) {
		alert('Solo se admite ficheros .jpg o .png')
		return false;
	}
	document.subasta.submit();
}