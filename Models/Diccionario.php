<?php
class Diccionario{

private $id;
private $nombre;
private $id_idioma;
private $id_grupo;

function llenarDatos($row){
		$Diccionario = new Diccionario(); 
		$Diccionario->set_id($row["id"]);
		$Diccionario->set_nombre($row["nombre"]);
		$Diccionario->set_id_idioma($row["id_idioma"]);
		$Diccionario->set_id_grupo($row["id_grupo"]);
		return $Diccionario;
	}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_nombre(){return $this->nombre;}
function set_nombre($valor){$this->nombre=$valor; }

function get_id_idioma(){return $this->id_idioma;}
function set_id_idioma($valor){$this->id_idioma=$valor; }

function get_id_grupo(){return $this->id_grupo;}
function set_id_grupo($valor){$this->id_grupo=$valor; }

	function consultaPaginada($id,$nombre,$id_idioma, $id_grupo){
				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT * FROM `diccionario`";
				$condicion=" WHERE ";

				if($id!=""){
					$sql=$sql.$condicion." id=".$id;	
					$condicion=" AND ";
				}

				if($nombre!=""){
					$sql=$sql.$condicion." nombre='".$nombre."'";	
					$condicion=" AND ";
				}

				if($id_idioma!=""){
					$sql=$sql.$condicion." id_idioma='".$id_idioma."'";	
					$condicion=" AND ";
				}

				if($id_grupo!=""){
					$sql=$sql.$condicion." id_grupo='".$id_grupo."'";	
					$condicion=" AND ";
				}

				$resultado=mysqli_query($conexion,$sql);

				if($resultado){
					$registro = mysqli_num_rows($resultado);
					if($registro>0){
						$i = 0;	
						while ($row = mysqli_fetch_assoc($resultado)) {
							   $diccionario[$i]=$this->llenarDatos($row);
							   $i++;
						}						
						return 	$diccionario;
					}else{
					    return 0;
					}
				}else{
					return 0;
				}
					
	}

	function lista(){
			$diccionario=$this->consultaPaginada("","","","");
			return $diccionario;	
	}

	function consultaPorId($id){
		 	 $diccionario=$this->consultaPaginada($id,"","", "");
			 return $diccionario[0];	
	}	
		
	function consultaPorId_idioma($id_idioma){
		 	 $diccionario=$this->consultaPaginada("","",$id_idioma, "");
			 return $diccionario;	
	}

	function consultaPorId_idiomaIdgrupo($id_idioma, $id_grupo){
		 	 $diccionario=$this->consultaPaginada("","",$id_idioma, $id_grupo);
			 return $diccionario[0];	
	}









}

?>