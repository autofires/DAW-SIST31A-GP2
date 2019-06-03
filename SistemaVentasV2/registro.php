<?php
@session_start();
include 'registrarse.php';
$regs= new registrar();

if (isset($_POST["ok"])) {
	
	/*Recibir los datos*/
	$user = $_POST["user"];
	$clave1 = $_POST["clave1"];
	$email = $_POST["email"];
	echo $regs->agregar($user,$clave1,$email);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Registrarse</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/css/themes/semantic.min.css">
	<link href="css/dist/sweetalert2.css" rel="stylesheet">
    <script src="css/dist/sweetalert2.min.js"></script> 
    <script> 
      	function aler(titulo,mensaje){ 
	       Swal.fire({   
	       	type: 'error',    
	       	title: titulo,    
	       	text: mensaje }) 
	   		}
    </script> 
	<script type="text/javascript">     
      	function checkForm(form){     
      	if(form.user.value == "") {       
      		msg="Error: El nombre de usuario no puede estar vacio!";   
      		tit="Error!!!";
      		aler(tit,msg);        
      		form.user.focus();       
      		return false;     }    
      		 re = /^\w+$/;     
      	if(!re.test(form.user.value)) {       
      		msg="Error: Nombre de usuario debe tener solo letras, numeros y guiones!";   
      		tit="Error!!!";
      		aler(tit,msg);       
      		form.user.focus();       
      		return false;     }       
      	if(form.clave1.value != "" && form.clave1.value == form.clave2.value) {     
      		if(form.clave1.value.length < 6) { 
      		msg="Error: La clave debe tener un minimo de 6 caracteres!";   
      		tit="Error!!!";  
      		aler(tit,msg);          
      		form.clave1.focus();          
      		return false;       }       
      	if(form.clave1.value == form.user.value) {  
      		msg="Error: La clave debe ser diferente al nombre del usuario!";   
      		tit="Error!!!";  
      		aler(tit,msg);          
      		form.clave1.focus();         
      		return false; 
         }       re = /[0-9]/;       
         if(!re.test(form.clave1.value)) {         
         	msg="Error: la clave debe tener almenos un digito (0-9)!";
         	tit="Error!!!";        
         	aler(tit,msg);         
         	return false;       }       
         	re = /[a-z]/;
         	if(!re.test(form.clave2.value)) {         
         	msg="Error: la clave debe tener almenos un digito (0-9)!";
         	tit="Error!!!";        
         	aler(tit,msg);          
         	form.clave2.focus();         
         	return false;       }       
         	re = /[a-z]/;       
         	if(!re.test(form.clave1.value)) {  
         		msg="Error: La clave debe tener al menos una letra minuscula (a-z)!";   
         		tit="Error!!!";  aler(tit,msg);  form.clave1.focus();          
         		return false;       }       
         		re = /[A-Z]/;       
         		if(!re.test(form.clave1.value)) {  
         			msg="Error: La clave debe tener al menos una letra mayuscula (A-Z)!";   
         			tit="Error!!!";  aler(tit,msg);           
         			form.clave1.focus();          
         			return false;       
         		} } else {  
         			msg="Error: las claves no son iguales!";         
         			tit="Error!!!";   
         			aler(tit,msg);        
         			form.clave1.focus();        
         			return false;     
         		}
            }
      </script>   
<style type="text/css">
	*{
		padding: 0px;
		margin: 0px;
	}
	.seccion{
		padding: 15px;
		background-color: rgba(153,165,103,0.3);
		width: 30%;
		box-shadow: 0px 0px 2px 2px rgba(102,102,102,0.6);
	}
	.bodyr{
		min-height: 100vh;
		display: absolute;
		background-image: url("img/fondo/8.jpg");
		background-attachment: fixed;
		background-size: 100%;
	}
	input{
		margin-bottom: 10px;
		margin-top: 10px;
		padding: 8px;

	}
	form{
		opacity: 0.9;
		padding-top: 15px;
		padding-bottom: 15px;
		margin-top: 5px;
		color: rgb(224,159,85,1);
		background-color: rgb(52,61,70);
		font-size: 20px;

	}
	h1{
		font-size: 30px;
		text-shadow: 0px 0px 5px rgb(255, 241, 68);
		margin:10px 0;
		padding-bottom:10px;
		width:100%;
		color:#78788c;
		border-bottom:3px solid #78788c
	}
	input[type=submit]:hover{
		border: none;
		color:white;
		background: black;

	}
	input[type=submit]{
		border: none;
		background: white; 
		width: 80%;
	}
	.aqui{
		color: white;

	}
	.aqui > a{
		color: white;
	}
	.aqui > a:hover{
		color: black;
	}
	</style>
</head>
<body class="bodyr">
	<center>
		<br>
	<br><br>
	<br>
	<div class="seccion">
	 	<h1>Registro</h1>
	 	<br>
	 	<form method="POST" onsubmit="return checkForm(this);">
		 	Usuario*: <br>
			<input type="text" name="user" size="40"  value="Usuario" required=""  onBlur="if(this.value=='')this.value='Usuario'"  onFocus="if(this.value=='Usuario')this.value=''"/>
		 	<p>
		 	Email*: <br>
			<input type="text" name="email" size="40"  value="Alguien@ejemplo.com" required=""  onBlur="if(this.value=='')this.value='Alguien@ejemplo.com'"  onFocus="if(this.value=='Alguien@ejemplo.com')this.value=''"/>
		 	<p>
		 	Contrase&ntilde;a*: <br>
		 	<input type="password" name="clave1" size="40" placeholder="clave" value="password" required="" onBlur="if(this.value=='')this.value='password'"   onFocus="if(this.value=='password')this.value='' "/>
		 	<p>
			Repita la Contrase&ntilde;a*: <br>
		 	<input type="password" name="clave2" size="40" placeholder="repetir clave" value="password" required="" onBlur="if(this.value=='')this.value='password'" onFocus="if(this.value=='password')this.value='' "/>
		 	<p>
			<input type="submit" name="ok" value="Registrar"  size="45" />
			<br>

			<b class="aqui">Ingresa al sitio: <a href="login.php">Aqu&iacute;</a><b>
		</form>
	</div>
	</center>
</body>
</html>