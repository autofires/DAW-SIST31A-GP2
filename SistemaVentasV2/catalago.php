<?php  
include 'vehiculos.php';
$veh = new vehiculos();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Catalago</title>
	<style>
		body{
			background-image: url("img/fondo/4.jpg");
			background-repeat: no-repeat;
			background-size: 100%;
		}
		input{
			padding: 5px;
		}
		.slider {
			width: 100%;
			margin: auto;
			overflow: hidden;
		}

		.slider ul {
			display: flex;
			padding: 0;
			width: 200%;
			
			animation: cambio 20s infinite alternate linear;
		}

		.slider li {
			width: 100%;
			list-style: none;
		}

		.slider img {
			width: 100%;
		}

		@keyframes cambio {
			0% {margin-left: 0;}
			20% {margin-left: 0;}
			
			25% {margin-left: -100%;}
			45% {margin-left: -100%;}
			
			50% {margin-left: -200%;}
			70% {margin-left: -200%;}
			
			75% {margin-left: -300%;}
			100% {margin-left: -300%;}
		}

		b{
			font-size: 17px;
		}
	</style>
	<script type="text/javascript">
		function convertir(){ 
		    var texto=document.getElementById("vehiculo").value; 
		      
		    if(window.XMLHttpRequest){ 
		         objetoAjax=new XMLHttpRequest(); 
		    } 
		    objetoAjax.onreadystatechange=function(){ 
		         if(objetoAjax.readyState==4 && objetoAjax.status==200){ 
		             document.getElementById("respuesta").innerHTML=objetoAjax.responseText; 
		         } 
		    } 

		    objetoAjax.open("GET","ajax.php?vehiculo="+texto); 
		    objetoAjax.send(); 
		} 
	</script>	
</head>
<body>
<center>
	<div style='width: 60%;'>
		<form method='get'>
			<h2>Busqueda filtrada por Nombre de Modelo:</h2><br>
			<input type=text' id='vehiculo' name='vehicu' onkeydown='convertir()' required><br>
		</form>
		<br>
		<?php
			echo $veh->vervehiculos();
			
			?>
	<div>
<form method="post">
	<div style='width: 60%;'>
	<div id=respuesta></div> 
	</div>
	</div>
</form>
</center>
</body>
</html>
