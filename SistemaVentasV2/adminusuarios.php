<?php
include "registrarse.php";
$users = new registrar();


if (isset($_POST["accion"])) {
	$usuario = $_POST["usuario"];
	$contra = $_POST["contra"];
	$tipous = $_POST["tipo"];
	$email = $_POST["email"];
	$option = $_POST["accion"];
	switch ($option) {
		case 'Agregar':
				echo $users->agregaru($usuario,$contra,$tipous,$email);
			break;
		case 'Actualizar':
				echo $users->actusers($usuario,$contra,$tipous,$email);
			break;
		case 'Eliminar':
				echo $users->eliminarus($usuario);
			break;
		
		default:
			// code...
			break;
	}

}
?>
<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
	<style type="text/css">
		input{
			padding: 7px;
			border:1px solid black;
			margin-top: 7px;
		}
		table{
			background-color: rgba(0,0,0,0.6);
			color: white;
			font-size: 20px;
		}
		body{
			background-image: url('img/fondo/14.jpg');
			background-attachment: no-repeat;
			background-size: 100%;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/pure-release-1.0.0/tables.css">
</head>
<body><center>
	<h1>Modificar Usuario</h1>
<div class="container">
	<table class="pure-table">
<form method="post">
	<tr><td>
	<label>Nombre de Usuario:</label></td><td>
	<input type="text" name="usuario" value="<?php if(isset($usuario)){echo $usuario;}?>" required=""><br></td></tr><tr><td>
	<label>Contraseña:</label></td><td>
	<input type="text" name="contra" required="" value="<?php if(isset($usuario)){echo $contra;}?>"><br></td></tr><tr><td>
	<label>Seleccione Tipo de Cuenta</label></td><td>
	<select name="tipo" required="">
		<option value="admin">Administrador</option>
		<option value="cliente">Cliente</option>
	</select><br></td></tr><tr><td>
	<label>Email:</label></td><td>
	<input type="text" name="email" required="" value="<?php if(isset($usuario)){echo $email;}?>"><br></td></tr><tr><td>
	<input type="submit" name="accion" value="Agregar"></td><td>
	<input type="submit" name="accion" value="Actualizar"></td></tr>

</form>
</table>
</div>
<br>
<div align='center'>
<table border="1px">
	<thead>
	<tr><th>Usuario</th><th>Tipo de Usuario</th><th>Email</th><th colspan="2">Accion</th></tr></thead>
	<?php

		echo $users->usuarios();

	?>
</table>	

</div>
</center>
</body>
</html>