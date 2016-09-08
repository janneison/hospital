<?php

class Idioma{

private $id;
private $idioma;
private $iniciales;


function llenarDatos($row){
		$Idioma = new Idioma(); 
		$Idioma->set_id($row["id"]);
		$Idioma->set_idioma(utf8_encode($row["idioma"]) );
		$Idioma->set_iniciales($row["iniciales"]);
			
		return $Idioma;	
}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_idioma(){return $this->idioma;}
function set_idioma($valor){$this->idioma=$valor; }

function get_iniciales(){return $this->iniciales;}
function set_iniciales($valor){$this->iniciales=$valor; }

		/*-----------------------INSERTAR-------------------------------------------------------------*/
			/*function insertar($objeto,$usuario){
			       $c = new Conexion;	$conexion=$c->Conectarse($c); 

			       if(!trim($objeto->get_nombre())){
			       	  $nombre=NULL;
			       }else{
			       	  $nombre="'".$objeto->get_nombre()."'";	
			       }

				   $sql_inserta="INSERT INTO `bodega`(`id`, `nombre`) VALUES ( NULL, ".$nombre.")";			
						
					
					if(mysqli_query($conexion,$sql_inserta) ){	
					   	$respuesta=mysqli_insert_id($conexion);				
					}else{
						 $respuesta=-1;
					}	
					return $respuesta;			
			}*/


		/*-----------------ACTUALIZAR----------------*/
			/*function actualizar($objeto,$usuario){

				if(!trim($objeto->get_nombre())){ 
			       	  $nombre=NULL;
			    }else{
			       	  $nombre="'".$objeto->get_nombre()."'";	
			    }

			   $c = new Conexion;	$conexion=$c->Conectarse($c); 
			   $sql_actualizar="UPDATE `bodega` SET `nombre`=".$nombre." WHERE id='".$objeto->get_id()."' ";
			   if(mysqli_query($conexion,$sql_actualizar) ){	
						$Id_perfil=$objeto->get_id();				
				}else{
						 $Id_perfil=-1;
				}	
			    return $Id_perfil;			
			}*/


		/*------------------CONSULTAS---------------*/

		function consultaPaginada($id,$nombre,$iniciales){
				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT * FROM `idioma` ";
				$condicion=" WHERE ";

				if($id!=""){
					$sql=$sql.$condicion." id=".$id;	
					$condicion=" AND ";
				}

				if($iniciales!=""){
					$sql=$sql.$condicion." iniciales='".$iniciales."'";	
					$condicion=" AND ";
				}

				$resultado=mysqli_query($conexion,$sql);

				if($resultado){
					$registro = mysqli_num_rows($resultado);
					if($registro>0){
						$i = 0;	
						while ($row = mysqli_fetch_assoc($resultado)) {
							   $idioma[$i]=$this->llenarDatos($row);
							   $i++;
						}						
						return 	$idioma;
					}else{
					    return 0;
					}
				}else{
					return 0;
				}
					
		}

		function lista(){
				$idioma=$this->consultaPaginada("","","");
				return $idioma;	
		}
		
		function consultaPorIniciales($iniciales){
			 	 $idioma=$this->consultaPaginada("","",$iniciales);
				 return $idioma[0];	
		}

		






}

?>