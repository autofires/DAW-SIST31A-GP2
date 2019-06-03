<?php
@session_start();
if(isset($_REQUEST["cerrar"])){       
    session_destroy();       
    header("Location:login.php");  
}  
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>AUTO FIRE</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
		<link rel="stylesheet" type="text/css" href="css/sweetalert2.min.css">
  		<script type="text/javascript" src="js/sweetalert2.min.js"></script>
	</head>
	<body>
		<nav>
	<?php
		if (isset($_SESSION['usuario'])) {
			if ($_SESSION["usuario"]["tipo_usuario"] == "admin") {
		 		require_once("menuadmin.php");
		 	}else{
		 		require_once("menucliente.php");
		 		}
		  }else{
		  	header('location:login.php');
		  }
		echo "<br>";
		echo "<br>";
	
		if (isset($_GET['p'])) {
			require_once($_GET['p']);
		}
	?>
	
	

	
	</body>
</html>
