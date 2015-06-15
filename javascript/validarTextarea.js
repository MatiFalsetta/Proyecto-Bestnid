function validarOferta(){
	if ($('#ofertar').val().length < 10) {
		alert("Ingrese una oferta con mas de 10 caracteres.");
        document.crear_oferta.oferta.focus();
        return (false);
	}
	document.crear_oferta.submit();
}