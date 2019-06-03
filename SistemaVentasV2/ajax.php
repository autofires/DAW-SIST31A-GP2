<?php
include 'vehiculos.php';
$veh = new vehiculos();
if (isset($_GET["vehiculo"])) {
    $vehiculo = $_GET["vehiculo"];
	 echo $veh->busquedafiltrada($vehiculo);
}
?> 