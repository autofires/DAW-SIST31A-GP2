<?php 
include 'vehiculos.php';
$vhc = new vehiculos();

if (isset($_POST["accion"])) {
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
	$accion = $_POST["accion"];

		switch ($accion) {
			case 'Agregar':
					echo $vhc->addvehiculos($numerose,$marca,$modelo,$anio,$matricula,$kilo,$transmision,$cilindros,$caballos,$caract,$precioc,$preciov,$estado);
				break;
			case 'Actualizar':
					echo $vhc->actvehiculos($numerose,$marca,$modelo,$anio,$matricula,$kilo,$transmision,$cilindros,$caballos,$caract,$precioc,$preciov,$estado);
				break;
			case 'Eliminar':
					echo $vhc->elvehiculos($numerose);
				break;
			
			default:
				// code...
				break;
		}
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Vehiculos</title>
	<style type="text/css">

		.formula {
			color: white;
		    font-family: monospace;
		    width: 550px;
		    background: rgba(0,0,0,0.4);
		    border-radius: 7px;
		    margin-left: 80px;
		}

		h2 {
		    color: #fff;
		    text-align: center;
		    margin: 0;
		    font-size: 30px;
		    margin-bottom: 20px;
		}

		input {
			padding: 5px;
		}
		input[type=submit] {
			padding: 5px;
			width: 50%;
			float: center;
		}

		#boton{
		    background: #31384A;
		    color: #fff;
		    padding: 20px;
		}

		#boton:hover {
		    cursor: pointer;
		}


		@media (max-width:480px) {
		    form{
		        width: 100%;
		    }
		}

		h1 {
		    text-align: center;
		    color: #fff;
		    font-size: 40px;
		    background: rgba(0,0,0,0.4);
		}
		h2{
			text-align: center;
		    color: #fff;
		    font-size: 40px;
		    background: rgba(0,0,0,0.4);
		}
		body{
			background-image: url(img/fondo/13.jpg);
			background-attachment: no-repeat;
			background-size: 100%;
		}
		a{
			color: white;
		}
		.add{
			background: rgba(0,0,0,0.4);
			float: left;
			width: 450px;
		}
		.ver{
			background-color: rgba(0,0,0,0.6);
			color: white;
			float: left;
			width: 500px;
			margin-left: 100px;
			text-align: center;
			font-size: 20px;
		}
</style>
<link rel="stylesheet" type="text/css" href="css/pure-release-1.0.0/buttons-min.css">
</head>
<body>
	
<form action="" method="POST" class="formula">

<div class="add">
	<h1>Agregar Vehiculos</h1>
	<table border="0px" style="font-size:20px;">
		<td style="height:30px;">Numero de serie</td>
		<td><input type="text" name="serie" required value="<?php if(isset($numerose)){echo $numerose;}?>"></td>
			<tr>
		<td style="height:30px;">Marca</td>
		<td><select name="marca">
				<?php 
				echo $vhc->mostrarmarca();
				 ?>
			</select>
			<tr>
		<td style="height:30px;">Modelo</td>
		<td><input type="text" name="modelo" required value="<?php if(isset($modelo)){echo $modelo;}?>"></td>
			<tr>
		<td style="height:30px;">A&ntilde;o del Vehiculo</td>
		<td><input type="number" min="1980" required max="2020" value="1980" name="anio" value="<?php if(isset($anio)){echo $anio;}?>"></td>
			<tr>
		<td style="height:30px;">Matricula</td>
		<td><input type="text" name="matricula" required value="<?php if(isset($matricula)){echo $matricula;}?>"></td>
			<tr>
		<td style="height:30px;">Kilometraje</td>
		<td><input type="number" name="kilo" required value="<?php if(isset($kilo)){echo $kilo;}?>"></td>
			<tr>
		<td style="height:30px;">Transmisi&oacute;n</td>
		<td><select name="transmision">
			<option value="manual">Manual</option>
			<option value="automatico">Automatico</option>
			</select>
		</td>
			<tr>
		<td style="height:30px;">Cilindros</td>
		<td><input type="number" min="1" required max="10" value="3" name="cilindros" value="<?php if(isset($cilindros)){echo $cilindros;}?>"></td>
			<tr>
		<td style="height:30px;">Caballos de Fuerza</td>
		<td><input type="number" min="1" required Max="10000" value="100" name="hp" value="<?php if(isset($caballos)){echo $caballos;}?>"></td>
			<tr>
		<td style="height:30px;">Caracteristicas</td>
		<td><textarea rows="10" cols="20"  required wrap="soft" name="carac"> <?php if(isset($caract)){echo $caract;}?></textarea></td>
			<tr>
		<td style="height:30px;">Precio de Compra</td>
		<td><input type="number" step="0.001" required name="precc" value="<?php if(isset($precioc)){echo $precioc;}?>"></td>
			<tr>
		<td style="height:30px;">Precio de Venta</td>
		<td><input type="number" step="0.001" required name="precv" value="<?php if(isset($preciov)){echo $preciov;}?>"></td>
			<tr>
		<td style="height:30px;">Estado</td>
		<td><select name="estado">
			<option value="disponible">Disponible</option>
			<option value="vendido">Vendido</option>
			<option value="enproceso">En proceso</option>	
			<option value="enventa">En Venta</option>	
			<option value="reservado">Reservado</option>
			</select></td></tr>
			<tr>
			<td align="center"><input type="submit" name="accion" class="pure-button" value="Agregar"></td><td><input type="submit" name="accion" value="Actualizar" class="pure-button" width="100px"></td>
			<tr><td>&nbsp;</td></tr>
			<tr><td colspan="2">Pulsa <a href="?p=aggfotos.php">aqui</a> para agregar fotos</td>
	</table>
</div>
</form>	
<form method="post">
<div class="ver">
	<h2>Vehiculos</h2>
	<table style="width: 500px;">

		<tr><th>Informacion</th><th>Acciones</th></tr>
<?php 
echo $vhc->vehiculosact();
 ?>
 	</table>
	</div>
	</form>
</body>
</html>