<?php
class Noticia{

private $id;
private $titulo;
private $contenido;
private $imagen;
private $activa;
private $fecha;

function llenarDatos($row){
	$noticias = new Noticia(); 
	$noticias->set_id($row["id"]);
	$noticias->set_titulo($row["titulo"]);
	$noticias->set_contenido($row["contenido"]);
	$noticias->set_imagen($row["imagen"]);
	return $noticias;
}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_titulo(){return $this->titulo;}
function set_titulo($valor){$this->titulo=$valor; }

function get_contenido(){return $this->contenido;}
function set_contenido($valor){$this->contenido=$valor; }

function get_imagen(){return $this->imagen;}
function set_imagen($valor){$this->imagen=$valor; }

	function consultaPaginada($id,$titulo,$contenido, $activa){
				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT * FROM noticias";
				$condicion=" WHERE ";

				if($id!=""){
					$sql=$sql.$condicion." id=".$id;	
					$condicion=" AND ";
				}

				if($titulo!=""){
					$sql=$sql.$condicion." titulo='".$titulo."'";	
					$condicion=" AND ";
				}

				if($contenido!=""){
					$sql=$sql.$condicion." contenido='".$contenido."'";	
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
							   $noticias[$i]=$this->llenarDatos($row);
							   $i++;
						}						
						return 	$noticias;
					}else{
					    return 0;
					}
				}else{
					return 0;
				}
					
	}

	function lista(){
			$noticias=$this->consultaPaginada("","","","");
			return $noticias;	
	}

	function consultaPorId($id){
		 	 $noticias=$this->consultaPaginada($id,"","", "");
			 return $noticias[0];	
	}	
		
	function consultaPorcontenido($contenido){
		 	 $noticias=$this->consultaPaginada("","",$contenido, "");
			 return $noticias;	
	}

	function consultaActivas($activas){
		 	 $noticias=$this->consultaPaginada("","","", $activas);
			 return $noticias;	
	}

}

?>