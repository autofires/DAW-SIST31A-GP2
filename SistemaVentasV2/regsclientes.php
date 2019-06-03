<?php
@session_start();
include 'clientes.php';
$cls=new clientes();
if (isset($_SESSION['usuario']['dui'])) {
	if ($_SESSION['usuario']['dui']=="") {
		echo "<script>alert('Por favor Agregue los campos')</script>";	
	}else{
	header('location:?p=reservacion.php');
	}
}

if (isset($_POST['ok1'])) {
	$DUI=$_POST['dui'];
	$nom=$_POST['nombre'];
	$ape=$_POST['apellido'];
	$correo=$_POST['correo'];
	$tel=$_POST['tel'];
	$dir=$_POST['direccion'];
	$NIT=$_POST['nit'];
	echo $cls->agregarcl($DUI,$nom,$ape,$correo,$tel,$dir,$NIT,$_SESSION['usuario']['nombre']);
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>registro de clientes</title>
</head>
<body>

	<form method="post">
		<table>
			<th colspan="2">Informacion de cliente</th>
			<tr>
		<td>DUI:</td>
		<td> <input type="text" name="dui" pattern="[0-9]{8}" required title="Ingrese el formato de su n° de DUI Ej: 00000000-0"></td>
			</tr>
			
			<tr>
		<td>Nombre:</td>
		<td> <input type="text" name="nombre" required></td>
			</tr>
			<tr>
		<td>Apellidos</td>
		<td> <input type="text" name="apellido" required> </td>
			</tr>
			<tr>
		<td>Correo electronico</td>
		<td> <input type="text" name="correo" value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario']['email'];}?>" required></td>
			</tr>
			<tr>
		<td>Numero de Telefono:</td>
		<td> <input type="text" name="tel" required></td>
			</tr>
			<tr>
		<td>Direccion:</td>
		<td> <textarea name="direccion" required></textarea> </td>
			</tr>
			<tr>
		<td>NIT:</td>
		<td> <input type="text" required name="nit"></td>
			</tr>
			
			<tr><td></td><td><input type="submit" name="ok1" value="Enviar"></td></tr>
			<tr><td>Si ya tienes estos datos agregados por favor Clic <a href="?p=reservacion.php">Aqui</a></td></tr>

		</table>

	</form>


</body>
</html>