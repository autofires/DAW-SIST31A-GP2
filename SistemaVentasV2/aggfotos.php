<?php
include 'vehiculos.php';
$fv=new vehiculos();
if (isset($_POST["subir"])) {
				if (is_uploaded_file ($_FILES['fichero']['tmp_name'])){  
				    $tmp_name = $_FILES["fichero"]["tmp_name"]; 
				    $name = "autos/".$_FILES["fichero"]["name"]; 
				    if (is_file($name)) { 
				      $idUnico=time();//si existe le coloco un nombre unico 
				      $name = "autos/".$idUnico."-".$_FILES["fichero"]["name"];         
				    		}  
				    	move_uploaded_file($tmp_name,$name);

				 	 }else{ 
				      	echo "No se ha podido subir el fichero\n"; 
				 		} 

				 	$vehiculo = $_POST["vehiculo"];
				 	$fv->addfotos($vehiculo,$name);

}



?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Fotos Vehiculos</title>
	<style>
		input[type="submit"]:hover {
		color: #fff; border-bottom: 1px solid rgba(0, 0, 0, 0.4); background: linear-gradient(red,green);
		border-radius: 29px;
		}

		input[type="file"]:hover {
		color: #fff; border-bottom: 1px solid rgba(0, 0, 0, 0.4); background: linear-gradient(red,#F4F750);
		border-radius: 29px; font-size:15px;
		}
		label:hover {
		font-size: 40px;
		}
		body{
			background-image: url('img/fondo/14.jpg');
			background-repeat: no-repeat;
			background-size: 100%;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="css/pure-release-1.0.0/forms-min.css">
</head>
<body>
	<center>
	<form method="post" class='pure-forms' enctype="multipart/form-data">
		
	<table style="text-align:center; font-size:45px; font-family:Buxton Sketch; width:50%; height:400px; margin-top:50px;">
			<td><label><b>Seleccione el vehiculo</label></td>
		<tr>
			<td>
				<select name="vehiculo" required="">
					<?php
						echo $fv->mostrarserie();
					?>
				</select>
			</td>
		</tr>
		<tr>	
			<td>
				<label><b>Seleccione una Foto:</label>
			</td>
		</tr>
		<tr>
			<td>
				<input type="file" name="fichero" id="files" required="" style="width:320px;">
			</td>
		</tr>
		<tr>
			<td>
				<br><input type="submit" name="subir" value="Subir Imagen" style="width:100px; height:60px; border-radius:29px;">
			</td>
		</tr>

	</table>
	</form>
	</center>
</body>
</html>