<?php
include 'vehiculos.php';
$marca = new vehiculos();
if (isset($_POST["ok"])) {
	
		if (is_uploaded_file ($_FILES['fichero']['tmp_name'])){  
				    $tmp_name = $_FILES["fichero"]["tmp_name"]; 
				    $name = "marcas/".$_FILES["fichero"]["name"]; 
				    if (is_file($name)) { 
				      $idUnico=time();//si existe le coloco un nombre unico 
				      $name = "marcas/".$idUnico."-".$_FILES["fichero"]["name"];         
				    		}  
				    	move_uploaded_file($tmp_name,$name);

				 	 }else{ 
				      	echo "No se ha podido subir el fichero\n"; 
				 		} 

				 		$marcas = $_POST["marcas"];	
				 		$marca->addmarcas($marcas,$name);
		}    

?>
<!DOCTYPE html>
<html>
<head>
	<title>Marcas</title>
    </script> 
	<style type="text/css">
		body{
			background-image: url(img/fondo/1.jpg);
			background-attachment: no-repeat;
			background-size: 100%;
		}
		.formulario {
		    width: 450px;
		    margin: auto;
		    background: rgba(247, 91, 80,0.9);
		    padding: 10px 20px;
		    box-sizing: border-box border-box;
		    /* margin-top: 20px; */
		   
		    /* centrado verticalmente */
		    color: white;
		}
		input{
			float: center;
			padding: 10px;
		}
		input[type=submit]{
			border: 0;
			width: 70%;
			padding: 10px;
			color: white;
			background: #f44444;
		}
		input[type=submit]:hover{
			background-color: rgba(51, 100, 255,0.7);
			color: white;
		}
		label {
				font-size: 25px;
                color: white;
                font-weight: bold;
                text-shadow: 0px 0px 1px #132C4D;
            }
        table{
        	color: black;
        	width: 50%;
        	background-color: white;
        }
        td{
        	text-align: center;
        }
	</style>
</head>
<body><center>
	<form method="post" class="formulario" enctype="multipart/form-data">
		<h1 style="font-size: 45px;">Ingreso de Marcas</h1>
		<label>
		Ingrese las Marcas de Vehiculos:</label><br>
		<input type="text" required name="marcas" size="40" title="Las marcas no llevan numeros"><br>
		<label>
		Ingrese una foto de la Marca:</label><br>
		<input type="file" required name="fichero"><br>
		<input type="submit" name="ok" value="Agregar">
	
	<br><br>
	</form>

	<br>
	<table align='center'>
		<tr><th>ID Marca</th><th>Marca</th><th>Foto de Marca</th></tr>
	
	<?php
		echo $marca->mostrarm();
	?>
	</table>
	</center>
</body>
</html>