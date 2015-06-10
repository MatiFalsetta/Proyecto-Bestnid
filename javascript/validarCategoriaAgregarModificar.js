function validaragregar(){
	if ($('#categoria').val().length < 2 || $('#categoria').val().length > 50) {
		alert("Ingrese una categoria con mas de 1 y menos de 50 caracteres.");
        document.categoria.categoria.focus();
        return (false);
	}
	document.categoria.submit();
}

function validarmodificar(){
	if ($('#edit_categoria').val().length < 2 || $('#edit_categoria').val().length > 50) {
		alert("Ingrese una categoria con mas de 1 y menos de 50 caracteres.");
        document.edit_categoria.edit_categoria.focus();
        return (false);
	}
	document.edit_categoria.submit();
}