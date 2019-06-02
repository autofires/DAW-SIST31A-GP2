 <?php
include 'cn.php';


class registrar{
   private $r;
   const SALT = 'EstoEsUnSalt';//llave para encriptar
    public function registrar(){
        $this->r=new conexion();
    }

    public function agregar($usuario,$contra,$email){
    	$msg="";
    	if ($this->existe($usuario)==true) {
    		$msg.="<script>alert('El Nombre de Usuario Ingresado está en Uso, Elija Otro');</script>";
    	}elseif($this->existem($email)==true){
    		$msg.="<script>alert('El correo ingresado esta en uso')</script>";
    	}else{
	    	$password = $this->encriptar($contra); 
	    	$sql="INSERT INTO usuario VALUES ('$usuario','$password','cliente','$email')";
	    	$this->r->ejecutar($sql);
	    	$msg.="<script>alert('Usuario Ingresado con exito');</script>";
	    	$msg.="<script>window.location='login.php';</script>";

    	}
    	return $msg;
    }
    public function existe($usuario){
    	$sqlex="SELECT * FROM usuario WHERE usuario='$usuario'";
    	$res = $this->r->consultar($sqlex);
    	if ($res->num_rows > 0) {
    		return true;
    	}else{
    		return false;
    	}
    	
    }
    public function existem($email){
    	$sqlem="SELECT * FROM usuario WHERE email ='$email'";
    	$res = $this->r->consultar($sqlem);
    	if ($res->num_rows > 0) {
    		return true;
    	}else{
    		return false;
    	}
    	
    }

     public static function encriptar($password) { 
        return hash('sha512', self::SALT . $password); 
    } 
     





}



?>