<?php
	/*Conectar base de datos*/
	include "credenciales.php";

	class conexion{
     
    protected $conn;
    const SALT = 'EstoEsUnSalt';//llave para encriptar

    public function conexion(){  
     $this->conn=new mysqli(SERVIDOR,USUARIO,CONTRA,BASEDATOS);
    	}

    public function desconectar(){  
          $this->conn->close();  
    	}  
    public function consultar($sql){  
          $this->Conexion();  
          $res = $this->conn->query($sql);            
          $this->desconectar();  
          return $res;  
    	}  
    public function ejecutar($sql){  
          $this->Conexion();  
          $this->conn->query($sql);            
          $this->desconectar();  
          return true;  
    	} 

    public function login($usuario, $password) { 
        // el uso de declaraciones preparadas evita las 
        // inyecciones sql.    
        $sql="SELECT  
                    usuario,contra,tipo_usuario,email 
                FROM  
                    usuario  
                WHERE  
                    usuario = ? LIMIT 1"; 
        $password = $this->encriptar($password);  
                      
        if ($stmt = $this->conn->prepare($sql)) { 
          
             
            $stmt->bind_param('s', $usuario); 
            $stmt->execute();// ejecutamos la consulta. 
            $stmt->store_result(); 
            // obtenomos las variables del resultado 
            //bind_result recomendado cuando solo es un registro 
            $stmt->bind_result($usuario, $contra, $tipo_usuario,$email); 
            $stmt->fetch(); 
            
            if ($stmt->num_rows == 1) { 
                // si el usuario existe verificamos si la cuenta 
                // esta bloqueada por fuerza bruta 
                if ($this->checkbrute($usuario) == true) { 
                    // bloquear la cuenta  
                    // enviar notificacion del bloqueo . 
                    echo "<script>alert('Cuenta cerrada temporalmente intente dentro de 2 horas');</script>"; 
                     
                    return false; 
                } else { 
                    // verificamos que las claves sean iguales. 
                     
                    if ($contra == $password) { 
                        // la clave fue correcta 
                        // obtenomos el navegador del cliente 
                        $user_browser = $_SERVER['HTTP_USER_AGENT']; 

                        // XSS protection as we might print this value 
                        $usuario = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $usuario); 

                        $_SESSION['usuario']["tipo_usuario"] = $tipo_usuario; 
                        $_SESSION['usuario']["nombre"] = $usuario;
                        $_SESSION['usuario']["email"] = $email;
                        echo "<script>alert('Ingreso correcto');</script>"; 
                        header("Location:index.php"); 

                        // ingreso al sistema  
                        return true; 
                    } else { 
                        // la clave fallo 
                        // almacenamos este falso ingreso en la base de datos  
                        $now = time(); 
                        if ($this->conn->query("INSERT INTO login_attempts (usuario, tiempo)  
                                        VALUES ('$usuario', '$now')")) { 
                                             
                            echo "<script>alert('Datos erroneos');</script>"; 
                            header("Location: login.php?error"); 
                            exit(); 
                        } 
                        return false; 
                    } 
                } 
            } else { 
                // El usuario no existe.  
                return false; 
            } 
        } else { 
            // error con la base de datos
            echo ("Location: ../error.php?err=Database error: cannot prepare statement");
            exit(); 
        } 
    } 

    public function checkbrute($usuario) { 
        // obtenemos la hora del sistema  
        $now = time(); 
        // Consultamos todos los falsos ingresos en las ultimas  
        // 2 horas.  
        $valid_attempts = $now - (2 * 60 * 60);  
        $sqlAtentados="SELECT tiempo FROM login_attempts WHERE usuario = ? AND tiempo > '$valid_attempts'"; 
        if ($stmt = $this->conn->prepare($sqlAtentados)){ 
            $stmt->bind_param('i', $usuario); 
            // ejecutamos la consulta preparada.  
            $stmt->execute(); 
            $stmt->store_result(); 
            // si hay mas de 5 intentos devolvemos true  
            if ($stmt->num_rows > 5){ 
                return true; 
            } else { 
                return false; 
            } 
        } else { 

            // Error con la base de datos 
           echo ("Location: ../error.php?err=Database error: cannot prepare statement");

            exit(); 
        } 
         
    }

    public function SQLsegura($strVar){ 
        $banned = array("select", "drop","|","'", ";", "--", "insert","delete", "xp_");      
        $vowels = $banned; 
        $no = str_replace($vowels, "", $strVar); 
        $final = str_replace( "'","",$no); 
        return $final; 
    }//End Function 

    public static function encriptar($password) { 
        return hash('sha512', self::SALT . $password); 
    } 
     
     
    public static function verificar($password, $hash) { 
        return ($hash == self::hash($password)); 
    } 



	}
?>