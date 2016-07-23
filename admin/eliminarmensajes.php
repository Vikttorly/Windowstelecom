<?php

include("conexion.php");

$service = $_POST['id'];
$accion = $_POST['accion'];

if ($accion == 'Eliminar') {

	mysqli_query($conexion,"UPDATE mensajes SET estado='E' WHERE id=$service");

}elseif ($accion == 'Archivar') {

	mysqli_query($conexion,"UPDATE mensajes SET estado='G' WHERE id=$service");

}elseif ($accion == 'Reciclar') {

	mysqli_query($conexion,"UPDATE mensajes SET estado='S' WHERE id=$service");
}



?>