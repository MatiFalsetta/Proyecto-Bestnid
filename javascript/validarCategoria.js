function validar(){
	if ($('#categoria').val().length < 2 || $('#categoria').val().length > 50) {
		alert("Ingrese una categoria con mas de 1 y menos de 50 caracteres.");
        document.categoria.categoria.focus();
        return (false);
	}
	document.categoria.submit();
}