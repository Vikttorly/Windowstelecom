<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<style type="text/css">
	td{
		padding: 10px;
	}

	.mensajes{
		padding: 2px;
		background-color: #f4f4f4;
		border: 1px solid #e5e5e5;
		cursor: pointer;
	}

</style>

<?php



include("conexion.php");

$variable = $_POST['variable'];

if ($variable == 'principal') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-inbox" aria-hidden="true"></span> Bandeja principal</a>
            </div>
        </nav>

	<?php

	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='S' ORDER BY fecha DESC;");

	if (mysqli_num_rows($consulta) > 0) {
		
	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$leido = $res['leido'];
		
		$res2 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT date_format(fecha,' %d %M de %Y') AS fecha_formateada FROM mensajes WHERE id=$id"));
		$fecha = $res2['fecha_formateada'];

		if ($leido == 0) {
			$nombre = '<b>'.$nombre.'</b>';
		}

		echo '
		<div class="col-md-11" id="seleccionar'.$id.'">
		<div class="mensajes">
		<input type="hidden" value="'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-trash eliminar" id="eliminar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-briefcase archivar" id="archivar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-eye-open verMensaje aria-hidden="true"></span></div>
		</td>

		<td width="300">'.$nombre.'</td>
		<td width="45%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		
		</table>
		</div>
		<div id="mensajeCompleto'.$id.'"></div>
		</div>
		';
		
		}

	}else{
		echo '
		<div align="center" class="col-md-11" style="margin-top:18%;">
			<h1>No hay mensajes para mostrar</h1>
		</div>';
	}

}elseif ($variable == 'guardados') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-briefcase reciclar" aria-hidden="true"></span> Mensaje guardados</a>
            </div>
        </nav>

	<?php

	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='G' ORDER BY fecha DESC");

	if (mysqli_num_rows($consulta) > 0) {

	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$leido = $res['leido'];

		$res2 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT date_format(fecha,' %d %M de %Y') AS fecha_formateada FROM mensajes WHERE id=$id"));
		$fecha = $res2['fecha_formateada'];

		if ($leido == 0) {
			$nombre = '<b>'.$nombre.'</b>';
		}

		echo '
		<div class="col-md-11" id="seleccionar'.$id.'">
		<div class="mensajes">
		<input type="hidden" value="'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-trash eliminar" id="eliminar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-inbox reciclar" id="reciclar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-eye-open verMensaje aria-hidden="true"></span></div>
		</td>

		<td width="300">'.$nombre.'</td>
		<td width="45%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		
		</table>
		</div>
		<div id="mensajeCompleto'.$id.'"></div>
		</div>
		';
		
	}
	
	}else{
		echo '
		<div align="center" class="col-md-11" style="margin-top:18%;">
			<h1>No hay mensajes para mostrar</h1>
		</div>';
	}

}elseif ($variable == 'eliminados') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Mensajes eliminados</a>
            </div>
        </nav>

	<?php
	
	$consulta = mysqli_query($conexion,"SELECT * FROM mensajes WHERE estado='E' ORDER BY fecha DESC");

	if (mysqli_num_rows($consulta) > 0) {

	while ($res = mysqli_fetch_assoc($consulta)) {

        $id = $res['id'];		
		$nombre = $res['nombre'];
		$email = $res['email'];
		$telefono = $res['telefono'];
		$mensaje = $res['mensaje'];
		$leido = $res['leido'];
		
		$res2 = mysqli_fetch_assoc(mysqli_query($conexion,"SELECT date_format(fecha,' %d %M de %Y') AS fecha_formateada FROM mensajes WHERE id=$id"));
		$fecha = $res2['fecha_formateada'];

		if ($leido == 0) {
			$nombre = '<b>'.$nombre.'</b>';
		}

		echo '
		<div class="col-md-11" id="seleccionar'.$id.'">
		<div class="mensajes">
		<input type="hidden" value="'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-briefcase archivar" id="archivar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-inbox reciclar" id="reciclar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-eye-open verMensaje aria-hidden="true"></span></div>
		</td>

		<td width="300">'.$nombre.'</td>
		<td width="45%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		</table>
		</div>
		<div id="mensajeCompleto'.$id.'"></div>
		</div>
		';
		
	}

	}else{
		echo '
		<div align="center" class="col-md-11" style="margin-top:18%;">
			<h1>No hay mensajes para mostrar</h1>
		</div>';
	}

}

?>

<script type="text/javascript">
$(document).ready(function() {

    $('.eliminar').click(function(){
        //Recogemos la id del contenedor padre
        var parent = $(this).parent().attr('id');
        //Recogemos el valor del servicio
        var seleccionar = $(this).parent().attr('data');

        var accion = 'Eliminar';

        $.ajax({
            type: "POST",
            url: "eliminarmensajes.php",
            data: {
            	id:seleccionar,
            	accion:accion
            },
            success: function() {            
                $('#eliminar-ok').empty();
                $('#eliminar-ok').append('<div>Se ha eliminado correctamente el servicio con id='+seleccionar+'.</div>').fadeIn("slow");
                $('#'+parent).remove();
            }
        });
    });                 
});    

$(document).ready(function() {

    $('.archivar').click(function(){
        //Recogemos la id del contenedor padre
        var parent = $(this).parent().attr('id');
        //Recogemos el valor del servicio
        var seleccionar = $(this).parent().attr('data');

         var accion = 'Archivar';

        $.ajax({
            type: "POST",
            url: "eliminarmensajes.php",
            data: {
            	id:seleccionar,
            	accion:accion
            },
            success: function() {            
                $('#archivar-ok').empty();
                $('#archivar-ok').append('<div>Se ha eliminado correctamente el servicio con id='+seleccionar+'.</div>').fadeIn("slow");
                $('#'+parent).remove();
            }
        });
    });                 
});    

$(document).ready(function() {

    $('.reciclar').click(function(){
        //Recogemos la id del contenedor padre
        var parent = $(this).parent().attr('id');
        //Recogemos el valor del servicio
        var seleccionar = $(this).parent().attr('data');

         var accion = 'Reciclar';

        $.ajax({
            type: "POST",
            url: "eliminarmensajes.php",
            data: {
            	id:seleccionar,
            	accion:accion
            },
            success: function() {            
                $('#reciclar-ok').empty();
                $('#reciclar-ok').append('<div>Se ha eliminado correctamente el servicio con id='+seleccionar+'.</div>').fadeIn("slow");
                $('#'+parent).remove();
            }
        });
    });                 
}); 
</script>

<script type="text/javascript">
	 $('.verMensaje').click(function(){
	 	var idMensaje = $(this).parent().attr('data');
	 	 $.ajax({
            type: "POST",
            url: "mensajecompleto.php",
            data: {idMensaje:idMensaje},
            success: function(data) {            
            	$('.mensajes').remove();
            	$("#mensajeCompleto"+idMensaje).html(data);
            }
        });
}); 
</script>

