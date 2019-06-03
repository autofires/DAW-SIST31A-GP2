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

    public function agregaru($usuario,$contra,$tipo,$email){
    	$msg="";
    	if ($this->existe($usuario)==true) {
    		$msg.="<script>alert('El Nombre de Usuario Ingresado está en Uso, Elija Otro');</script>";
    	}elseif($this->existem($email)==true){
    		$msg.="<script>alert('El correo ingresado esta en uso')</script>";
    	}else{
	    	$password = $this->encriptar($contra); 
	    	$sql="INSERT INTO usuario VALUES ('$usuario','$password','$tipo','$email')";
	    	$this->r->ejecutar($sql);
	    	$msg.="<script>alert('Usuario Ingresado con exito');</script>";

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
     
    public function usuarios(){
        $sql="select * from usuario";
        $resul = $this->r->consultar($sql);
        $retorno="";
        while($usu=$resul->fetch_assoc()) {
            $retorno.="<tr><td>$usu[usuario]</td>";
            $retorno.="<td>$usu[tipo_usuario]</td>";
            $retorno.="<td>$usu[email]</td>";
            $retorno.="<form method='post'>";
            $retorno.="<input type='hidden' name='usuario' onlyread value='$usu[usuario]'>";
            $retorno.="<input type='hidden' name='tipo' value='$usu[tipo_usuario]'>";
            $retorno.="<input type='hidden' name='contra' onlyread value='$usu[contra]'>";
            $retorno.="<input type='hidden' name='email' value='$usu[email]'>";
            $retorno.="<td><input type='submit' value='Seleccionar' name='accion'></td>";
            $retorno.="<td><input type='submit' value='Eliminar' name='accion'></td>";
            $retorno.="</form></tr>";


        }
        return $retorno;
    }

    public function actusers($usuario,$contra,$tipo,$email){
    	$password = $this->encriptar($contra);
    	$msg="";
    	$sql="update usuario set contra='$password', tipo_usuario='$tipo', email='$email' where usuario='$usuario'";
    	$this->r->ejecutar($sql);
    	$msg.="<script>alert('Usuario Actualizado con exito');</script>";
    	return $msg;
    }
    public function eliminarus($usuario){
    	$sql="delete from usuario where usuario='$usuario'";
    	$msg="";
    	$this->r->ejecutar($sql);
    	$msg.="<script>alert('Usuario Eliminado con exito');</script>";
    	return $msg;

    }




}



?>