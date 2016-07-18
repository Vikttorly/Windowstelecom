<?php

  error_reporting(0);
  session_start();

  if ($_SESSION['usuario']) {
    header("Status: 301 Moved Permanently", false, 301);
    header("Location: tablero.php");
  }

?>

<!DOCTYPE html>
<html>
<head>
  <title>WindowsTelecom - Inicio</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">
  <link href="css/red.css" rel="stylesheet">
</head>
<body>
<br><br><br><br><br>
<center>
<img src="/windowstelecom/images/logo3.png" width="300">
      <div class="container">
             <div class="contact_full ingreso">
                  <form action="ingreso.php" method="post">
                      <div class="form-level">
                          <input name="usuario" placeholder="usuario" id="usuario"  value="" type="text" class="input-block" required>
                          <span class="form-icon fa fa-user"></span>
                      </div>
                      <div class="form-level">
                          <input name="clave" placeholder="clave" id="clave" class="input-block" value="" type="password" required>
                          <span class="form-icon fa fa-envelope-o"></span>
                      </div>
                <div class="col-md-12 text-center">
                    <button class="btn btn-main featured">Enviar</button>
                </div>
                  </form>
            </div>
      </div>
</center>
</body>
</html>