<?PHP
	if(isset($_GET['error'])){
		$error=$_GET['error'];
		$a='';
		if ($error > 0) {
			$a='Exito';
		}
		$error=alertar($error);
		echo "<div id='excepcion$a'>";
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
			case 0:
				return("No tiene los permisos suficientes para acceder a ese lugar.");
			break;
			case 1:
				return ("Se ha iniciado sesion exitosamente.");
			break;
			case -1:
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
			case -7:
				return("No se han podido modificar los datos de la cuenta. Ya existe un usuario con el mismo correo electronico.");
			break;
			case 8:
				return("Se ha agregado la subasta exitosamente.");
			break;
			case 9:
				return("Se ha registrado exitosamente.");
			break;
			case -10:
				return("No se ha podido registrar. Ya existe un usuario con el mismo correo electronico.");
			break;
			case -11:
				return("No se ha podido eliminar la categoria. Existen subastas que la contienen.");
			break;
			case -12:
				return("No se ha podido editar la categoria. Ya existe una con el mismo nombre.");
			break;
			case -13:
				return("No se ha podido agregar la categoria. Ya existe una con el mismo nombre.");
			break;
			case 14:
				return("Se le han quitado los permisos de administrador con exito.");
			break;
			case 15:
				return("Se le han otorgado los permisos de administrador con exito.");
			break;
			case 16:
				return("Se ha modificado la oferta con exito.");
			break;
			case -17:
				return("No se ha podido modificar la oferta, intentelo nuevamente.");
			break;
			case 18:
				return("Se ha eliminado la oferta con exito.");
			break;
			case 19:
				return("Se ha eliminado la subasta con exito.");
			break;
			case -20:
				return("No se ha podido eliminar la subasta ya que contiene comentarios u ofertas realizadas.");
			break;
			case 21:
				return("Se ha elegido al ganador de la subasta exitosamente.");
			break;
		}
	}
?>