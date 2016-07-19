<?php

ob_start();
session_start();
$usuario = $_SESSION['usuario'];

if ($_SESSION['usuario']) {
    
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de administrador</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <center><img src="/windowstelecom/images/logo3.png" alt="" class="img-responsive" width="150" style="margin-top:5%;"></center>
                </li>
                <li>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </li>
                <li>
                    <a href="#" id="bandejaPrincipal">Bandeja principal</a>
                </li>
                <li>
                    <a href="#" id="mensajesGuardados">Mensajes guardados</a>
                </li>
                <li>
                    <a href="#" id="mensajesEliminados">Mensajes eliminados</a>
                </li>
                <li>
                    <a href="#">Estadísticas</a>
                </li>
                <li>
                    <a href="javascript:cerrarSesion()">Cerrar sesion</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

                 <script> 
                    function cerrarSesion(){ 
                    document.cerrar_sesion.submit() 
                    } 
                </script>

                <form method="post" action="tablero.php" name="cerrar_sesion">
                    <input type="hidden" name="cerrar" value="1">
                </form>

        <!-- Page Content -->
        <div id="page-content-wrapper">
               
            <div class="container" id="mostrarMensajes">
               
            </div>

<form id="principal">
    <input type="hidden" name="variable" value="principal">
</form>

<form id="guardados">
    <input type="hidden" name="variable" value="guardados">
</form>

<form id="eliminados">
    <input type="hidden" name="variable" value="eliminados">
</form>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <script>   

            $("#bandejaPrincipal").click(function() {  

                var url = "mostrarmensajes.php"; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#principal").serialize(), 
                    success: function(data)
                    {
                        $("#mostrarMensajes").html(data); 
                    }
                    });
            });  


            $("#mensajesGuardados").click(function() {  

                var url = "mostrarmensajes.php"; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#guardados").serialize(), 
                    success: function(data)
                    {
                        $("#mostrarMensajes").html(data); 
                    }
                    });
            });  

            $("#mensajesEliminados").click(function() {  

                var url = "mostrarmensajes.php"; 
                $.ajax({
                    type: "POST",
                    url: url,
                    data: $("#eliminados").serialize(), 
                    success: function(data)
                    {
                        $("#mostrarMensajes").html(data); 
                    }
                    });
            }); 

        </script>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>
</html>

<?php

}else{
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: index.php");
}

if (isset($_POST['cerrar'])) {
    session_destroy();
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: index.php");
}

?>