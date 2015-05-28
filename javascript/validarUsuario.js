function valida(){
    if (document.iniciarsesion.user.value.length < 4 || document.iniciarsesion.user.value.length > 50) {
        alert("Ingrese un correo valido");
        document.iniciarsesion.user.focus();
        return false;
    }
    else if (document.iniciarsesion.pass.value.length < 4 || document.iniciarsesion.pass.value.length > 50) {
        alert("Ingrese una contrase\u00F1a valida");
        document.iniciarsesion.pass.focus();
        return (false);
    }
    else if (tiene_numeros(document.iniciarsesion.pass.value) && tiene_letras(document.iniciarsesion.pass.value)) {
        document.iniciarsesion.action="./sistema/iniciarsesion.php";
        document.iniciarsesion.submit();
    }
    else {
		alert("Ingrese una contrase\u00F1a con caracteres y numeros");
		document.iniciarsesion.pass.focus();    
		return (false);
    }
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
	if (document.registro.user.value.length < 4 || document.registro.user.value.length > 50) {
		alert("Ingrese un correo valido");
        document.iniciarsesion.user.focus();
        return (false);
	}
}