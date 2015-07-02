<?php
	include_once('./sistema/conectar.php');
	$conec=conectar();
	if(!isset($_SESSION)){
		session_start();
	}
	if(isset($_SESSION['usuario'])) {
		$idUsuario=$_SESSION['usuario'];
		$hoy=date("Y-m-d H:i:s");
		$resul=mysqli_query($conec,"SELECT * FROM subasta INNER JOIN oferta ON (subasta.idSubasta = oferta.idSubasta) WHERE subasta.fechaFin < '$hoy' AND subasta.idUsuario = $idUsuario AND subasta.idOfertaGanadora = -1");
		if(mysqli_num_rows($resul)!=0){
?>
			<a href="./ver_mis_subastas.php"><div style="background-color: #FDFD55;" class="boton_aside">Elegir Ganador!</div></a>
<?php
		}
		$resul=mysqli_query($conec,"SELECT * FROM subasta INNER JOIN oferta ON (subasta.idOfertaGanadora = oferta.idOferta) WHERE subasta.fechaFin < '$hoy' AND oferta.IdUsuario = $idUsuario AND subasta.pago = 0");
		if(mysqli_num_rows($resul)!=0){
?>
			<a href="./ver_mis_ofertas.php"><div style="background-color: #FDFD55;" class="boton_aside">Ha ganado una subasta!</div></a>
<?php
		}
	}
?>