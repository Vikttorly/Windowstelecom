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

error_reporting(0);

include("conexion.php");

$variable = $_POST['variable'];

if ($variable == 'principal') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Bandeja principal</a>
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

		echo '
		<div class="col-md-11 mensajes" id="seleccionar'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-trash eliminar" id="eliminar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-briefcase archivar" id="archivar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td width="300"><b>'.$nombre.'</b></td>
		<td width="40%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		
		</table>
		</div>
		';
		
	}


}elseif ($variable == 'guardados') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mensaje guardados</a>
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

		echo '
		<div class="col-md-11 mensajes" id="seleccionar'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-trash eliminar" id="eliminar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-inbox reciclar" id="reciclar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td width="300"><b>'.$nombre.'</b></td>
		<td width="40%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		
		</table>
		</div>
		';
		
	}

}elseif ($variable == 'eliminados') {

	?>

		<nav class="navbar navbar-default col-md-11" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Mensajes eliminados</a>
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

		echo '
		<div class="col-md-11 mensajes" id="seleccionar'.$id.'">
		<table>
		<td>

		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-briefcase archivar" id="archivar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td>
		<div id="seleccionar'.$id.'" data="'.$id.'"><span class="glyphicon glyphicon-inbox reciclar" id="reciclar'.$id.'" aria-hidden="true"></span></div>
		</td>

		<td width="300"><b>'.$nombre.'</b></td>
		<td width="40%"><i>'.$email.'</i></td>
		<td>'.$fecha.'</td>
		</tr>

		
		</table>
		</div>
		';
		
	}

}

?>



<?php

echo $resultado;

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
</script>

<script type="text/javascript">
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
</script>

<script type="text/javascript">
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

