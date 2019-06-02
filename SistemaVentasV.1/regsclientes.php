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
		<td>Dui:</td>
		<td> <input type="text" name="dui" pattern="[0-9]{8}" required title="Ingrese el formato de su n° de DUI Ej: 00000000-0"></td>
			</tr>
			
			<tr>
		<td>Nombre:</td>
		<td> <input type="text" name="nombre"></td>
			</tr>
			<tr>
		<td>Apellidos</td>
		<td> <input type="text" name="apellido" > </td>
			</tr>
			<tr>
		<td>Correo electronico</td>
		<td> <input type="text" name="correo"></td>
			</tr>
			<tr>
		<td>Numero de Telefono:</td>
		<td> <input type="text" name="telefono"></td>
			</tr>
			<tr>
		<td>Direccion:</td>
		<td> <textarea name="Transmision"></textarea> </td>
			</tr>
			<tr>
		<td>Nit:</td>
		<td> <input type="text" name="nit"></td>
			</tr>
			
			<tr><td></td><td><input type="submit" name="ok1" value="Enviar"></td></tr>

		</table>

	</form>


</body>
</html>