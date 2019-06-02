<?php
@session_start();
if(isset($_REQUEST["cerrar"])){       
        @session_destroy();       
        header("Location:login.php");  
                    }  
?>
<link rel="stylesheet" type="text/css" href="css/estilos-menu.css">
<div class="container1">
            <ul id="navi">
                <li><a href="?p=pag-principal.php"><i><img src="img/menu/home.png" width="30px" height="25px" class="imagen-menu"></i>Inicio</a></li>
                <li><a href="?p=mision.php"><i><img src="img/menu/quien.png" width="30px" height="25px" class="imagen-menu"></i>¿Qui&eacute;nes Somos?</a></li>
                <li><a href="?p=catalago.php"><i><img src="img/menu/cata.png"  width="30px" height="25px" class="imagen-menu"></i>Cat&aacute;logo de Autos</a></li>
                <li><a href="?p=Promocion.php"><i><img src="img/menu/preg-frec.png" width="30px" height="25px" class="imagen-menu"></i>Promociones</a></li>
                <li><a href="?p=paypal.php"><i><img src="img/menu/preg-frec.png" width="30px" height="25px" class="imagen-menu"></i>Pagos</a></li>
                <li><?php
                	if (isset($_SESSION["usuario"])) {
                		echo "<a href='?cerrar=true'><i><img src='img/menu/cerrar.png'  width='30px' height='25px' class='imagen-menu'></i>Cerrar sesion</a>";
                	}
                ?></a></li>             
            </ul>
	</div>
    <br><br>
    <br><br>
    <br><br>
    <br><br>