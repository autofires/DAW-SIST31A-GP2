<?php
include 'cn.php';

class clientes
{
	protected $m;
    public function clientes(){
		//Inicializar lo necesario
		$this->m = new Conexion();
	}
    public function agregarcl($dui,$nom,$ape,$correo,$tel,$dir,$nit,$usu){
    	$clmsg="";
    	if ($this->revisarex($usu)==true) {
    		$clmsg.= "<script>alert('Usted ya posee sus datos ingresados a este sitio.');</script>";
    	}else{
	        $sql="insert into clientes values ('$dui','$nom','$ape','$correo','$tel','$dir','$nit','$usu')";
	        $this->m->ejecutar($sql); 
         	$clmsg.="<script>alert('Datos Agregados correctamente a la base de datos');</script>";
        }
    }
    public function revisarex($usu){
    	$sql="select * from clientes where usuario='$usu'";
    	$res=$this->m->consultar($sql);
    	if ($res->num_rows>0) {
    		return true;
    	}else{
    		return false;
    	}
    }
}



?>