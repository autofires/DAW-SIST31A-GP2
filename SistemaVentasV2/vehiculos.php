<?php
include 'cn.php';

class vehiculos{
	/*Conexion*/
	protected $v;
    public function vehiculos(){
     	 $this->v = new conexion();  
    }
    /*Agregar Vehiculos*/
    public function addvehiculos($num_serie,$id_marca,$modelo,$anio,$matricula,$kilometraje,$transmision,$cilidros,$hp,$carac,$preciocompra,$precioventa,$estado){
    	$msg="";
    	if ($this->existes($num_serie)==true) {
    		$msg.="<script>alert('El Numero de serie ingresado ya existe');</script>";
    	}elseif($this->existep($matricula)==true){
    		$msg.="<script>alert('La matricula ya existe en el sistema')</script>";
    	}else{
    		$sqladdv = "insert into vehiculos values('$num_serie','$id_marca','$modelo','$anio','$matricula','$kilometraje','$transmision','$cilidros','$hp','$carac','$preciocompra','$precioventa','$estado')";

    		$this->v->ejecutar($sqladdv);
    		$msg.="<script>alert('Vehiculo Agregado correctamente');</script>";
  			}
  		return $msg;

    }
    public function actvehiculos($num_serie,$id_marca,$modelo,$anio,$matricula,$kilometraje,$transmision,$cilidros,$hp,$carac,$preciocompra,$precioventa,$estado){
        $msg="";
        $sqladdv = "update vehiculos set (id_marca='$id_marca',modelo='$modelo',anio_vehiculo='$anio',matricula='$matricula',kilometraje='$kilometraje',transmision='$transmision',cilindros='$cilidros',caballos_fuerza='$hp',caracteristicas='$carac',precio_compra='$preciocompra',precio_venta='$precioventa',estado='$estado') where Num_serie='$num_serie'";
        $this->v->ejecutar($sqladdv);
        $msg.="<script>alert('Vehiculo Actualizado correctamente');</script>";
        return $msg;
        }
        
    
    /*Verificar numero de serie*/
    public function existes($serie){
    	$sqlex="SELECT * FROM vehiculos WHERE Num_serie='$serie'";
    	$res = $this->v->consultar($sqlex);
    	if ($res->num_rows > 0) {
    		return true;
    	}else{
    		return false;
    	}
    	
    }
    /*Verificar si existe placa*/
     public function existep($matricula){
    	$sqlex="SELECT * FROM vehiculos WHERE matricula='$matricula'";
    	$res = $this->v->consultar($sqlex);
    	if ($res->num_rows > 0) {
    		return true;
    	}else{
    		return false;
    	}
    	
    }
    public function elvehiculos($num_serie){
        $sql="delete from vehiculos where Num_serie='$num_serie'";
        $this->v->ejecutar($sql);
        $m="<script>alert('Vehiculo Eliminado Correctamente');</script>";
        return $m;
    }
    /*Mostrar Vehiculos*/
    public function vervehiculos(){
    	$sql="select * from vehiculos";
    	$res=$this->v->consultar($sql);
    	$m="";
    	
    	
    	while ($rep=$res->fetch_assoc()) {
    		$m.="<table>";
    		$m.="<tr>";
    	 	$m.="<td>".$this->fotov($rep['Num_serie'])."</td>";
            $m.="<td style='width:300px;'><b>Marca</b>:".$this->mostrarmarc($rep['id_marca'])."<br>";
            $m.="<br><b>Modelo</b>: $rep[modelo]<br>";
            $m.="<br><b>A&ntilde;o del vehiculo</b>: $rep[anio_vehiculo]<br>";
            $m.="<br><b>Matricula</b>: $rep[matricula]<br>";
            $m.="<br><b>Kilometraje</b>: $rep[kilometraje] km<br>";
            $m.="<br><b>Transmision</b>: $rep[transmision]<br>";
            $m.="<br><b>Cilindros</b>: $rep[cilindros]<br>";
            $m.="<br><b>Caballos de Fuerza</b>: $rep[caballos_fuerza] hp<br>";
            $m.="<br><b>Caracteristicas</b>: $rep[caracteristicas]<br>";
            $m.="<br><h2><b>Precio</b>: $rep[precio_venta]$</h2><br></td>";
            $m.="<td><a href='?p=regsclientes.php'><img src='img/reservar.png' width='40px' height='40px'></a></td>";
            $m.="<td><a href='?p=paypal.php'><img src='img/compra.jpg' width='40px' height='40px'></a></td>";

            $m.="</tr>";  
            $m.="</table>";          
    	}
    	
    	return $m;

    }
    public function vehiculosact(){
                $sql="select * from vehiculos";
                $res=$this->v->consultar($sql);
                $m="";
        
        
        while ($rep=$res->fetch_assoc()) {
            $m.="<tr><td><hr style='backgorund-color:white; border:0;'></td><tr>";
            $m.="<form method='post'>";
            $m.="<td><b>Marca</b>:".$this->mostrarmarc($rep['id_marca'])."<br>";
            $m.="<br><b>Numero de Serie:</b>: $rep[Num_serie]<br>";
            $m.="<br><b>Modelo</b>: $rep[modelo]<br>";
            $m.="<br><b>A&ntilde;o del vehiculo</b>: $rep[anio_vehiculo]<br>";
            $m.="<br><b>Matricula</b>: $rep[matricula]<br></td>";
             $m.="<input type='hidden' name='serie' value='$rep[Num_serie]'>";
              $m.="<input type='hidden' name='modelo' value='$rep[modelo]'>";
            $m.="<input type='hidden' name='marca' value='$rep[id_marca]'>";
            $m.="<input type='hidden' name='anio' value='$rep[anio_vehiculo]'>";
             $m.="<input type='hidden' name='matricula' value='$rep[matricula]'>";
              $m.="<input type='hidden' name='kilo' value='$rep[kilometraje]'>";
              $m.="<input type='hidden' name='transmision' value='$rep[transmision]'>";
              $m.="<input type='hidden' name='cilindros' value='$rep[cilindros]'>";
              $m.="<input type='hidden' name='hp' value='$rep[caballos_fuerza]'>";
              $m.="<input type='hidden' name='carac' value='$rep[caracteristicas]'>";
              $m.="<input type='hidden' name='precc' value='$rep[precio_compra]'>";
              $m.="<input type='hidden' name='precv' value='$rep[precio_venta]'>";
              $m.="<input type='hidden' name='estado' value='$rep[estado]'></td>";
            $m.="<td><input type='submit' value='Seleccionar' name='accion'>&nbsp;";
            $m.="<input type='submit' value='Eliminar' name='accion'></td>";
            $m.="</tr>";        
        }
        return $m;
    }

    public function fotov($Num_serie){
    	$sql="select * from fotos where Num_serie='$Num_serie'";
    	$resultado = $this->v->consultar($sql);
    	$tab="";
        $tab.="<div class='separ'>";						
        $tab.="<div class='slider'>";
        $tab.="	<ul>";
    	while ($no = $resultado->fetch_array()) {    
            $tab.="<li>"; 
    	    $tab.="<img src='$no[foto]' alt=''";
    	    $tab.="</li>";      
    	}
        $tab.="</ul>";
        $tab.="</div>";
        $tab.="</div>";
    	return $tab;
    }
    /*Eliminar Vehiculos*/



	/*Fotos de autos add*/
	public function addfotos($num_serie,$foto){
		$sqlaf="insert into fotos values('$num_serie','$foto')";
		$this->v->ejecutar($sqlaf);
		echo "<script>alert('Foto Agregada correctamente');</script>";
		
	} 

	/*Mostrar Serie*/
	public function mostrarserie(){
		$sql="select Num_serie,id_marca,modelo,anio_vehiculo from vehiculos";
    	$resu = $this->v->consultar($sql);
    	while ($reg=$resu->fetch_assoc()) {
    		$opt.="<option value='$reg[Num_serie]'>".$this->mostrarmarc($reg['id_marca'])." / ".$reg['modelo']." / "."$reg[anio_vehiculo] / Serie:$reg[Num_serie]</option>";
    	}
    	return $opt;
	}
	/*Mostrar Nombre Marca*/
	public function mostrarmarc($id){
    	$sql="select marca from marcas where id_marca='$id'";
    	$resu = $this->v->consultar($sql);
        $opt="";
    	while ($reg=$resu->fetch_array()) {
    		$opt.="$reg[marca]";
    	}
    	return $opt;
    }

    /*Marcas de Autos add*/
    public function addmarcas($marca,$foto){
    	$sql="insert into marcas (marca, marcaf) values ('$marca','$foto')";
    	$this->v->ejecutar($sql);
    }
    /*Mostrar Marca*/
    public function mostrarm(){
    	$sql="select * from marcas";
    	$resu = $this->v->consultar($sql);
    	$tab="";
    	while ($reg=$resu->fetch_assoc()) {
    	    $tab.="<tr>";
    	    $tab.="<td>$reg[id_marca]</td>";
    	    $tab.="<td>$reg[marca]</td>";
    	    $tab.="<td><img src='".$reg['marcaf']."' width='50px' height='50px'></td></tr>";   
    	}
    	$tab.="</table>";
    	return $tab;
    }
    /*Select con las Marcas*/
    public function mostrarmarca(){
    	$sql="select * from marcas";
    	$resu = $this->v->consultar($sql);
    	while ($reg=$resu->fetch_array()) {
    		$opt.="<option value='$reg[id_marca]'>$reg[marca]</option>";
    	}
    	return $opt;
    }
    public function eliminarm($id){
    	foreach ($id as $el) {
    		$sql="delete from marcas where id_marca='$el'";
    			$this->v->ejecutar($sql); 
    	}
    	echo "<script>alert('Registros eliminados correctamente');</script>";

    	
    }


    public function busquedafiltrada($vehiculo){
			$sql  = "select  * from vehiculos where modelo like '$vehiculo%'";
			$rs   = $this->v->consultar($sql);
				$m="";
			if ($rs->num_rows==0) {
				$m.="No hay resultados!";
			}else{
				$m.="<table>";
			    while ($rep = $rs->fetch_assoc()) {

							$m.="<table>";
		    		$m.="<br><tr><td><hr></td></tr>";
		    		$m.="<tr>";
		    	 	$m.="<td>".$this->fotov($rep['Num_serie'])."</td>";
		            $m.="<td style='width:400px;'><b>Marca</b>:".$this->mostrarmarc($rep['id_marca'])."<br>";
		            $m.="<br><b>Modelo</b>: $rep[modelo]<br>";
		            $m.="<br><b>A&ntilde;o del vehiculo</b>: $rep[anio_vehiculo]<br>";
		            $m.="<br><b>Matricula</b>: $rep[matricula]<br>";
		            $m.="<br><b>Kilometraje</b>: $rep[kilometraje] km<br>";
		            $m.="<br><b>Transmision</b>: $rep[transmision]<br>";
		            $m.="<br><b>Cilindros</b>: $rep[cilindros]<br>";
		            $m.="<br><b>Caballos de Fuerza</b>: $rep[caballos_fuerza] hp<br>";
		            $m.="<br><b>Caracteristicas</b>: $rep[caracteristicas]<br>";
		            $m.="<br><h2><b>Precio</b>: $rep[precio_venta]$</h2><br></td>";
		            $m.="</tr>";  
		            $m.="</table>";        
					}
					$m.="</table>";

			}
			return $m;
    }

    public function comprobardisp($num_serie){
        $msg="";
        $sql="select estado from vehiculos where Num_serie='$num_serie'";
        $res = $this->v->consultar($sql);
        while ($dp = $res->fetch_assoc()) {
            if ($dp['estado']=='disponible') {
                return true;
            }elseif($dp['estado']=='reservado'){
                return false;
            }
        }
    }
    public function reservar($num_serie,$dui_cliente,$fecha,$fechaexp){
            $mensajito="";
        if ($this->comprobardisp($num_serie)==true) {
            $sql="insert into reservacion values ('$num_serie','$dui_cliente','$fecha','$fechaexp')";
            $this->v->ejecutar($sql);
            $sqlac="update vehiculos set estado='reservado' where Num_serie='$num_serie'";
            $this->v->ejecutar($sqlac);
            $mensajito.="<script>alert('Reservacion Agregada correctamente tienes 5 dias para ir o se cancelara la reservacion');</script>";  
        }else{
            $mensajito.="<script>alert('Este Vehiculo se encuentra reservado o en venta');</script>";
        }
        return $mensajito;
    }

}


?>