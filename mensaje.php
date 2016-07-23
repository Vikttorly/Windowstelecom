<?php

include("conexion.php");

 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $telefono = $_POST['telefono'];
 $mensaje = $_POST['mensaje'];

 if (isset($_POST['nombre'])) {

 	mysqli_query($conexion,"INSERT INTO mensajes(nombre,email,telefono,mensaje,leido,estado,fecha) VALUES ('$nombre','$email',$telefono,'$mensaje',0,'S',NOW())");

 	?>
				<br><br><br><br>
				<div align="center" class="cargando"><img src="images/cargando.gif"/><br><center>Enviado...</center></div>
				<div align="center" class="mensaje" style="display:none;"><h4 class="feature_sub"> Gracias por contactarnos, tu mensaje ha sido enviado, por favor se paciente y espera nuestra llamada</h4></div>

				<script type="text/javascript">
					$(document).ready(function() {
    					setTimeout(function() {
        				$(".cargando").fadeOut(800);
    					},1000);
					});

					$(document).ready(function() {   
   			 			setTimeout(function() {
        				$(".mensaje").fadeIn(1200);
    					},2000);
					});
				</script>

	<?php

 }

?>