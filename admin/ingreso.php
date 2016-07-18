<meta charset="utf-8">

<?php

include("conexion.php");

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

//Comprobando si se envió el formulario

if (isset($_POST['usuario'])) {

	//Comprobando si el usuario o contraseña ingresado es correcto

	$sql = "SELECT * FROM administrador WHERE usuario='$usuario' AND clave='$clave'";
	$consulta = mysqli_query($conexion,$sql);
	$datos = mysqli_fetch_assoc($consulta);

	if ($usuario == $datos['usuario'] and $clave == $datos['clave']) {
		//En caso del usuario y contraseña sea correcto

		session_start();

		$_SESSION['usuario'] = $usuario;

		echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-success"> <i class="fa fa-spinner fa-spin"></i></i> Iniciando Sesión</h1>
    			</div>
  			</div>
		</div>>

		';

		header("Status: 301 Moved Permanently", false, 301);
		header("Location: tablero.php");

	}else{

		//De ser incorrecto el usuario y/o contraseña

		echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-danger"><i class="fa fa-times fa-2x"></i> Usuario y/o Contraseña inválidos </h1>
    				 <div align="center">
    					<a href="/windowstelecom/admin" style="text-decoration:none;"><div class="boton-estandar">INTENTAR DE NUEVO</div></a>
    				</div>
    			</div>
  			</div>
		</div>>

		';

	}

}else{

	/*En caso de que no se halla ingresado por el formulario sino que se halla entrado al documento ingreso.php directamente desde el navegador, se muestra en siguiente error: */	

echo '

		<div class="container">
  			<div class="">
  				<div align="center" style="margin-top: 16%;">
    				<h1 class="text-sm-center text-danger"> <i class="fa fa-chain-broken fa-2x"></i> Error de página</h1>
    				<meta http-equiv="Refresh" content="3;url=/windowstelecom/admin">
    			</div>
  			</div>
		</div>>

	';

}

?>