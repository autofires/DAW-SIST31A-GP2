<?php
@session_start();
if (isset($_SESSION["usuario"])) {
	header('location:index.php');
}
include "cn.php";
$l = new conexion();
if(isset($_REQUEST["error"])){       
    echo "<script>alert('datos erroneos');</script>"; 
} 

if (isset($_POST["ok1"])) {
	/*Incluir la conexion*/

	$usuario = $_POST["usuario"];
	$password = $_POST["password"];

	echo $l->login($usuario,$password);	

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>LOG IN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
	<script type="text/javascript" src="js/sweetalert2.min.js"></script>
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Noto Sans', sans-serif;
		}
		.body1{
			display: absolute;
			min-height: 100vh;
			background-image: url("img/fondo/6.jpg");
			background-attachment: fixed;
			background-size: 100%;
		}
		.formulario-login{
			opacity: 0.9;
			margin: auto;
			width: 30%;
			max-width: 450px;
			background:#ff5d3a;
			padding: 30px;
			border-radius: 4px 4px 4px 4px;
			-webkit-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			-moz-box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
			box-shadow: 0px 0px 11px 0px rgba(74,168,163,1);
		}
		.img-login{
			width: 175px;
			height: 175px;
		}
		input{
			border: 0px;
			display: block;
			padding: 10px;
			width: 100%;
			margin: 30px 0;
			font-size: 20px;
			font-weight:750px;
		}
		input[type="text"], input[type="password"]{
		  outline: none;
		  padding: 15px;
		  display: block;
		  width: 350px;
		  border-radius: 3px;
		  border: 1px solid #eee;
		  margin: 20px auto;
		}

		input[type="submit"] {
		  padding: 10px;
		  color: #fff;
		  background: #0098cb;
		  width: 350px;
		  margin: 20px auto;
		  margin-top: 0;
		  border: 0;
		  border-radius: 3px;
		  cursor: pointer;
		}
		input[type="submit"]:hover {
		  background-color: #00b8eb;
		}
		.boton-ingresar{
			border:0px;
			color: white;
			background: rgba(0,0,0,0.3);
			cursor: pointer;
			border-radius: 2px;
			margin-bottom: 0;
		}
		.boton-ingresar:hover{
			color: white;
			background: #ffc300;
		}
		.boton-ingresar:active{
			transform: scale(0.97);
		}
		input:focus{
			border-bottom:2px solid #eee;
		}
		h1{
			text-align: center;
			margin:auto;
			width: 30%;
			color:white;
			border-bottom:8px solid #454845;

		}
		@media (max-width:768px) {
			form{
				width: 75%;
			}
		}
		@media (max-width:480px) {
			form{
				width: 95%;
			}
		}
	</style>
</head>
<body class="body1">
	<br>
	<br>
		<h1>Inicio de Sesi&oacute;n</h1>
	<form  method="POST" class="formulario-login">
		<center><img src="img/menu/imglog.png" class="img-login"></center>
		<input type="text" name="usuario" placeholder="&#129492; Admin/User" value=Usuario onBlur="if(this.value=='')this.value='Usuario'" onFocus="if(this.value=='Usuario')this.value='' " required="" >
		<input type="password" name="password" placeholder="&#128273; 12345" value=Password required="" onBlur= "if(this.value=='') this.value='Password'" onFocus="if(this.value=='Password')this.value='' ">
		<input type="submit" class="boton-ingresar" name="ok1" value="Acceder" id="boton-enviar">
		<p style="color:white; text-decoration: blink;">¿No tienes una cuenta? Crea una <a href="registro.php">Aqu&iacute;</a></p>
	</form>
</body>
</html>
