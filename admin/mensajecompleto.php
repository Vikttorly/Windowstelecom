<?php

include("conexion.php");

$idMensaje = $_POST['idMensaje'];

if (isset($_POST['idMensaje'])) {

$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE id=$idMensaje");

while ($res = mysqli_fetch_assoc($consulta)) {
	$id = $res['id'];
	$nombre = $res['nombre'];
	$email = $res['email'];
	$telefono = $res['telefono'];
	$mensaje = $res['mensaje'];
	
	$res2 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT date_format(fecha,' %d %M de %Y') AS fecha_formateada FROM mensajes WHERE id=$id"));
	$fecha = $res2['fecha_formateada'];
}

	?>

		<div class="cuerpoMensaje">

			<legend><?php echo $nombre; ?></legend>
			<table>
				<tr>
					<td width="500"><p align="left"><?php echo '<b>'.$email.'</b><br># '.$telefono; ?></p></td>
					<td width="50%"><p align="right"><?php echo $fecha; ?></p></td>
				</tr>
			</table>

			<legend></legend>

			<div class="col-md-9">
				<?php echo $mensaje; ?>
			</div>

		</div>

	<?php

mysqli_query($conexion,"UPDATE mensajes SET leido=1 WHERE id=$id");

}

?>