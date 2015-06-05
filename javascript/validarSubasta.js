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
	if(!validarFormatoFecha($('#fechafin').val())){
		alert('Ingrese un formato de fecha valido. (aaaa-mm-dd)');
		return false;
	}
	if(!existeFecha($('#fechafin').val())){
		alert('La fecha ingresada no es correcta.');
		return false;
	}
	if(!validarFechaMenorActual($('#fechafin').val())){
		alert('La fecha de finalizacion debe ser mayor a la fecha actual.');
		return false;
	}
	document.subasta.submit();
}

function validarFormatoFecha(campo) {
      var RegExPattern = /^\d{2,4}\-\d{1,2}\-\d{1,2}$/;
      if ((campo.match(RegExPattern)) && (campo!='')) {
            return true;
      } else {
            return false;
      }
}

function existeFecha (fecha) {
        var fechaf = fecha.split("-");
        var d = fechaf[2];
        var m = fechaf[1];
        var y = fechaf[0];
        return m > 0 && m < 13 && y > 0 && y < 32768 && d > 0 && d <= (new Date(y, m, 0)).getDate();
}

function validarFechaMenorActual(date){
      var x=new Date();
      var fecha = date.split("-");
      x.setFullYear(fecha[0],fecha[1]-1,fecha[2]);
      var today = new Date();
 
      if (x > today)
        return true;
      else
        return false;
}