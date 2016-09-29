<?php
class Glosario{

private $id;
private $concepto;
private $descripcion;
private $fuente;
private $activa;
private $fecha;

function llenarDatos($row){
	$glosario = new Glosario(); 
	$glosario->set_id($row["id"]);
	$glosario->set_concepto($row["concepto"]);
	$glosario->set_descripcion($row["descripcion"]);
	$glosario->set_fuente($row["fuente"]);
	return $glosario;
}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_concepto(){return $this->concepto;}
function set_concepto($valor){$this->concepto=$valor; }

function get_descripcion(){return $this->descripcion;}
function set_descripcion($valor){$this->descripcion=$valor; }

function get_fuente(){return $this->fuente;}
function set_fuente($valor){$this->fuente=$valor; }

	function consultaPaginada($id,$concepto,$descripcion, $activa){
				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT * FROM glosario";
				$condicion=" WHERE ";

				if($id!=""){
					$sql=$sql.$condicion." id=".$id;	
					$condicion=" AND ";
				}

				if($concepto!=""){
					$sql=$sql.$condicion." concepto='".$concepto."'";	
					$condicion=" AND ";
				}

				if($descripcion!=""){
					$sql=$sql.$condicion." descripcion='".$descripcion."'";	
					$condicion=" AND ";
				}

				if($activa!=""){
					$sql=$sql.$condicion." activa=".$activa."";	
				}

				$resultado=mysqli_query($conexion,$sql);

				if($resultado){
					$registro = mysqli_num_rows($resultado);
					if($registro>0){
						$i = 0;	
						while ($row = mysqli_fetch_assoc($resultado)) {
							   $glosario[$i]=$this->llenarDatos($row);
							   $i++;
						}						
						return 	$glosario;
					}else{
					    return 0;
					}
				}else{
					return 0;
				}
					
	}

	function lista(){
			$glosario=$this->consultaPaginada("","","","");
			return $glosario;	
	}

	function consultaPorId($id){
		 	 $glosario=$this->consultaPaginada($id,"","", "");
			 return $glosario[0];	
	}	
		
	function consultaPordescripcion($descripcion){
		 	 $glosario=$this->consultaPaginada("","",$descripcion, "");
			 return $glosario;	
	}

	function consultaActivas($activas){
		 	 $glosario=$this->consultaPaginada("","","", $activas);
			 return $glosario;	
	}

}

?>