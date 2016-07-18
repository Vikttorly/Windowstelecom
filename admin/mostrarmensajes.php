<?php

error_reporting(0);

include("conexion.php");

$variable = $_POST['variable'];

if ($variable == 'principal') {

	?>

		<nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Bandeja principal</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Archivar</a></li>
                </ul>
            </div>
        </nav>

	<?php

	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='S' ORDER BY fecha ASC");

	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$fecha = $res['fecha'];

		$resultado .= '<tr><td><input type="checkbox" name="idMensaje" value="'.$id.'"></td><td>'.$nombre.'</td><td>'.$email.'</td><td>'.$telefono.'</td><td>'.$mensaje.'</td><td>'.$fecha.'</td></tr>';
		
	}

}elseif ($variable == 'guardados') {

	?>

		<nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mensaje guardados</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Archivar</a></li>
                </ul>
            </div>
        </nav>

	<?php

	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='G' ORDER BY fecha ASC");

	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$fecha = $res['fecha'];

		$resultado .= '<tr><td><input type="checkbox" name="idMensaje" value="'.$id.'"></td><td>'.$nombre.'</td><td>'.$email.'</td><td>'.$telefono.'</td><td>'.$mensaje.'</td><td>'.$fecha.'</td></tr>';
		
	}

}elseif ($variable == 'eliminados') {

	?>

		<nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mensajes eliminados</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                <li><a href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Eliminar</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> Archivar</a></li>
                </ul>
            </div>
        </nav>

	<?php
	
	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='E' ORDER BY fecha ASC");

	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];		
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$fecha = $res['fecha'];

		$resultado .= '<tr><td><input type="checkbox" name="idMensaje" value="'.$id.'"></td><td>'.$nombre.'</td><td>'.$email.'</td><td>'.$telefono.'</td><td>'.$mensaje.'</td><td>'.$fecha.'</td></tr>';
		
	}

}

?>

<table class="table table-hover">

<?php

echo $resultado;

?>

</table>