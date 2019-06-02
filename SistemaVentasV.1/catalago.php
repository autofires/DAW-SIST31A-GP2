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
		.slider {
			width: 100%;
			height:auto;
			overflow: hidden;
		}
		.slider ul {

			display: flex;
			padding: 6px;
			width: 500%;
			animation: cambio 10s infinite alternate linear;
		}

		.slider li {
			width: 90%;
			list-style: none;
		}

		.slider img {
			width: 90%;
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
</head>
<body>


<form>
    <input type='text' >


</form>
<div style="width: 50%;">
<?php
 echo $veh->vervehiculos();
	?>
	</div>
</body>
</html>