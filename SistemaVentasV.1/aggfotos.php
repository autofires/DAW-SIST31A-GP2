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
</head>
<body>
		
<form method="post" enctype="multipart/form-data">
	Seleccione el vehiculo
	<select name="vehiculo" required="">
		<?php
			echo $fv->mostrarserie();
		?>
	</select>
	<br>
	Foto:
	<input type="file" name="fichero" required="">
	<input type="submit" name="subir">



</form>


</body>
</html>