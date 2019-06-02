<?php 
include 'vehiculos.php';
$vhc = new vehiculos();

if (isset($_POST["add"])) {
	$numerose = $_POST["serie"];
	$marca = $_POST["marca"];
	$modelo = $_POST["modelo"];
	$anio = $_POST["anio"];
	$matricula = $_POST["matricula"];
	$kilo = $_POST["kilo"];
	$transmision =$_POST["transmision"];
	$cilindros = $_POST["cilindros"];
	$caballos= $_POST["hp"];
	$caract=$_POST["carac"];
	$precioc=$_POST["precc"];
	$preciov=$_POST["precv"];
	$estado = $_POST["estado"];

		$vhc->addvehiculos($numerose,$marca,$modelo,$anio,$matricula,$kilo,$transmision,$cilindros,$caballos,$caract,$precioc,$preciov,$estado);
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<link rel="stylesheet" type="text/css" href="catest.css">
<form action="" method="POST">

<center>
	<h1>Agregar Vehiculos</h1>
<table border="0px" style="font-size:20px;">
<td style="height:30px;">Numero de serie</td>
<td><input type="text" name="serie"></td>
	<tr>
<td style="height:30px;">Marca</td>
<td><select name="marca">
		<?php 
		echo $vhc->mostrarmarca();
		 ?>
	</select>
	<tr>
<td style="height:30px;">Modelo</td>
<td><input type="text" name="modelo"></td>
	<tr>
<td style="height:30px;">A&ntilde;o del Vehiculo</td>
<td><input type="number" min="1980" max="2020" value="1980" name="anio"></td>
	<tr>
<td style="height:30px;">Matricula</td>
<td><input type="text" name="matricula"></td>
	<tr>
<td style="height:30px;">Kilometraje</td>
<td><input type="number" name="kilo"></td>
	<tr>
<td style="height:30px;">Transmisi&oacute;n</td>
<td><select name="transmision">
	<option value="manual">Manual</option>
	<option value="automatico">Automatico</option>
	</select>
</td>
	<tr>
<td style="height:30px;">Cilindros</td>
<td><input type="number" min="1" max="10" value="3" name="cilindros"></td>
	<tr>
<td style="height:30px;">Caballos de Fuerza</td>
<td><input type="number" min="1" Max="10000" value="100" name="hp"></td>
	<tr>
<td style="height:30px;">Caracteristicas</td>
<td><textarea rows="10" cols="20" wrap="soft" name="carac"></textarea></td>
	<tr>
<td style="height:30px;">Precio de Compra</td>
<td><input type="number" step="0.001" name="precc"></td>
	<tr>
<td style="height:30px;">Precio de Venta</td>
<td><input type="number" step="0.001" name="precv"></td>
	<tr>
<td style="height:30px;">Estado</td>
<td><select name="estado">
	<option value="disponible">Disponible</option>
	<option value="vendido">Vendido</option>
	<option value="enproceso">En proceso</option>	
	<option value="enventa">En Venta</option>	
	<option value="reservado">Reservado</option>
	</select></td>
	<tr>
	<td><input type="submit" name="add"></td>
	<tr><td>Pulsa<a href="?p=aggfotos.php"> aqui</a>para agregar fotos</td>
</table></center>

</form>		
</body>
</html>