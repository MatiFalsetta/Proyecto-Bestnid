function validarOferta(){
	if ($('#ofertar').val().length < 10) {
		alert("Ingrese una oferta con mas de 10 caracteres.");
        document.crear_oferta.oferta.focus();
        return (false);
	}
	if ($('#peso0').val() < 1) {
		alert("Debe ofertar al menos el valor de $1.");
        document.crear_oferta.pesos.focus();
        return (false);
	}
	document.crear_oferta.submit();
}

function validarOfertaMod(){
	if ($('#ofertar0').val().length < 10) {
		alert("Ingrese una oferta con mas de 10 caracteres.");
        document.modificar_oferta.oferta.focus();
        return (false);
	}
	if ($('#peso1').val() < 1) {
		alert("Debe ofertar al menos el valor de $1.");
        document.modificar_oferta.pesos.focus();
        return (false);
	}
	document.modificar_oferta.submit();
}