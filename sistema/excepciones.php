<?PHP
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		$error=alertar($error);
		echo '<div id="excepcion">';
		try{
			throw new Exception($error);
		}
		catch(Exception $e){
			echo $e->getMessage();
		}
		echo '</div>';
	}
			
	function alertar($error){
		switch($error){
			case -1:
				return("No tiene los permisos suficientes para acceder a ese lugar.");
			break;
			case 0:
				return ("Se ha iniciado sesion exitosamente.");
			break;
			case 1:
				return("Usuario o contraseña incorrectas. Intente ingresar nuevamente los datos.");
			break;
			case 2:
				return("Se ha cerrado sesion exitosamente.");
			break;
			case 3:
				return("Se ha agregado una nueva categoria.");
			break;
			case 4:
				return("Se ha editado la categoria exitosamente.");
			break;
			case 5:
				return("Se ha eliminado la categoria exitosamente.");
			break;
			case 6:
				return("Se han modificado los datos de la cuenta exitosamente.");
			break;
			case 7:
				return("No se han podido modificar los datos de la cuenta. Ya existe un usuario con el mismo correo electronico.");
			break;
			case 8:
				return("Se ha agregado la subasta exitosamente.");
			break;
			case 9:
				return("Se ha registrado exitosamente.");
			break;
			case 10:
				return("No se ha podido registrar. Ya existe un usuario con el mismo correo electronico.");
			break;
		}
	}
?>