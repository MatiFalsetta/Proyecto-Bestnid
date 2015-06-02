function valida(){
	if (!validarCorreo($('#emailmenu').val())) {
		document.iniciarsesion.usermenu.focus();
		return false;
	}
	if ($('#passmenu').val().length < 4 || $('#passmenu').val().length > 50) {
		alert("Ingrese una contraseña con mas de 4 y menos de 50 caracteres.");
        document.iniciarsesion.passmenu.focus();
        return (false);
	}
	if (!(tiene_numeros($('#passmenu').val())) || !(tiene_letras($('#passmenu').val()))) {
		alert("Ingrese una contraseña con numeros y caracteres.");
        document.iniciarsesion.passmenu.focus();
        return (false);
	}
	document.iniciarsesion.submit();
}

var numeros="0123456789";
var letras="abcdefghijklmnñopqrstuvwxyz";

function tiene_numeros(texto){
   for(i=0; i<texto.length; i++){
      if (numeros.indexOf(texto.charAt(i),0)!=-1){
         return true;
      }
   }
   return false;
}

function tiene_letras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}

function validarRegistro(){
	if (!validarCorreo($('#email').val())) {
		document.registro.user.focus();
		return false;
	}
	if ($('#pass').val().length < 4 || $('#pass').val().length > 50) {
		alert("Ingrese una contraseña con mas de 4 y menos de 50 caracteres.");
        document.registro.pass.focus();
        return (false);
	}
	if (!(tiene_numeros($('#pass').val())) || !(tiene_letras($('#pass').val()))) {
		alert("Ingrese una contraseña con numeros y caracteres.");
        document.registro.pass.focus();
        return (false);
	}
	if ($('#nombre').val().length < 2 || $('#nombre').val().length > 50) {
		alert("Ingrese un nombre valido.");
        document.registro.nombre.focus();
        return (false);
	}
	if ($('#apellido').val().length < 2 || $('#apellido').val().length > 50) {
		alert("Ingrese un apellido valido.");
        document.registro.apellido.focus();
        return (false);
	}
	if ($('#dni').val().length < 6 || $('#dni').val().length > 11) {
		alert("Ingrese un DNI valido.");
        document.registro.DNI.focus();
        return (false);
	}
	if ($('#tarjeta').val().length < 5 || $('#tarjeta').val().length > 50) {
		alert("Ingrese una Tarjeta de Credito valida.");
        document.registro.tarjeta.focus();
        return (false);
	}
	document.registro.submit();
}

function validarCorreo(email) {
	var regex = /[\w-\.]{2,}@([\w-]{2,}\.)*([\w-]{2,}\.)[\w-]{2,4}/;
	if(regex.test(email.trim())) {
		return true;
	}
	else {
		alert('La direccion de correo no es valida');
		return false;
	}
}