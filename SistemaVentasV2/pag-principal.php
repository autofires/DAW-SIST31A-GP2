<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	<style type="text/css">
		.seccion{
			margin-left: 80px;
			float: left;
			background-color: yellow;
			opacity: 0.8;	
			width: 700px;
			height: 500px;
			-webkit-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			-moz-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
		}

		.bodyp{
			min-height: 100vh;
			background-image: url("img/fondo/9.jpg");
			background-attachment: fixed;
			background-size: 100%;
		}
		.h1-auto{
			font-size: 45px;
			text-shadow: 1px 1px #fff;
		}
		.imag{
			-webkit-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			-moz-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			box-shadow: 0px 0px 11px 0px rgba(74,168,163,1); 
		}
		.emp{
			font-size: 40px;
		}
		.as{
			margin-right: 80px;
			margin-left: 20px;
			float: right;
			width: 400px;
			height: 400px;
		}
		h2{
			margin-left: 20px;
		}
		aside{
			margin-top: 20px;
		}
	</style>
</head>
<body class="bodyp">
<center>
<div class="seccion">
<br><br><br><br>
<h1 class="h1-auto">Bienvenido a AUTOFIRE</h1>
<br>
<br>
<br><br>
<h1 class="h1-auto"><?php if(isset($_SESSION['usuario'])){echo $_SESSION["usuario"]["nombre"];}else{echo "USUARIO";}?></h1>
<br><br><br>
<img src="img/logo.png" class="imag">
<br>
<br>
<br>
<p class="emp">Empresa en Formaci&oacute;n</p>
</div>
</center>
<aside><center><h2 style="color: white;">MAPA</h2></center><br><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1935.9288999792816!2d-89.75563069949702!3d13.967068546833842!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDU4JzAxLjQiTiA4OcKwNDUnMTcuOSJX!5e0!3m2!1ses-419!2ssv!4v1557106265803!5m2!1ses-419!2ssv" width="600" height="450" frameborder="0" style="border:0" allowfullscreen width="50px" height="50px" class="as"></iframe></aside>
</body>
</html>