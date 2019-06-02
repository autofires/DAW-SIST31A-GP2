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
    	$sqladdv = "insert into vehiculos values('$num_serie','$id_marca','$modelo','$anio','$matricula','$kilometraje','$transmision','$cilidros','$hp','$carac','$preciocompra','$precioventa','$estado')";
    	$this->v->ejecutar($sqladdv);
    	echo "<script>alert('Vehiculo Agregado correctamente');</script>";

    }
    /*Mostrar Vehiculos*/
    public function vervehiculos(){
    	$sql="select * from vehiculos";
    	$res=$this->v->consultar($sql);
    	$m="";
    	$m.="<table>";
    	
    	while ($rep=$res->fetch_assoc()) {
    		$m.="<br><hr>";
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
    	}
    	$m.="</table>";
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
		echo $this->v->ejecutar($sqlaf);
			echo "<script>alert('Foto Agregada correctamente');</script>";
		
	} 

	/*Mostrar Serie*/
	public function mostrarserie(){
		$sql="select Num_serie,id_marca,modelo,anio_vehiculo from vehiculos";
    	$resu = $this->v->consultar($sql);
    	while ($reg=$resu->fetch_assoc()) {
    		$opt.="<option value='$reg[Num_serie]'>".$this->mostrarmarc($reg['id_marca'])." / ".$reg['modelo']." / "."$reg[anio_vehiculo]</option>";
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

}


?>