<?php 
include 'cn.php';

class empleados{
    private $e;
    public function empleados(){
        $this->e = new conexion();
    }
	public function addempleados($dui,$DUI_empleado,$nom_e,$ape_e,$tipo_e,$tel_e,$sexo_e,$fecha_i,$fecha_nac,$direccion){
    	$sql="insert into empleados values ('$dui','$DUI_empleado','$nom_e','$ape_e','$tipo_e','$tel_e','$sexo_e','$fecha_i','$fecha_nac','$direccion')";
    	$this->e->ejecutar($sql);


    }



}


 ?>