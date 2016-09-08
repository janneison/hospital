<?php

class Grupo_diccionario{

private $id;
private $nombre;


function llenarDatos($row){

		$Grupo_diccionarioVO = new Grupo_diccionario(); 

		$Grupo_diccionarioVO->set_id($row["id"]);
		$Grupo_diccionarioVO->set_nombre($row["nombre"]);
		
		return $Grupo_diccionarioVO;
	}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_nombre(){return $this->nombre;}
function set_nombre($valor){$this->nombre=$valor; }

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

		private function consultaPaginada($id){
				$c = new Conexion; $conexion=$c->Conectarse($c);
				$sql = "SELECT * FROM `grupo_diccionario`";

				$condicion=" WHERE ";
				if($id!=""){
					$sql=$sql.$condicion." id=".$id;
					$condicion = ' AND ';
				}

				
				$resultado=mysqli_query($conexion,$sql);
				$registro = mysqli_num_rows($resultado);

				if($registro>0){
					$i = 0;	
					while ($row = mysqli_fetch_assoc($resultado)) {
						   $grupo[$i]=$this->llenarDatos($row);
						   $i++;
					}						
					return 	$grupo;
				}else{
				    return 0;
				}
		}


		function consultaPorId($id){
			$data=$this->consultaPaginada($id);
			return $data[0];
		}



		









}

?>