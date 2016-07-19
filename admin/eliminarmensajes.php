<?php

include("conexion.php");

if ($_POST['enviar']) {
	
	foreach ($_POST['idMensaje'] as $idMensaje) {
		
		mysqli_query($conexion,"UPDATE mensajes SET estado= 'E' WHERE id=$idMensaje");

	}
}

?>