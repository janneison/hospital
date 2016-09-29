<?php

class Pregunta{

private $id;
private $pregunta;
private $respuesta;


function llenarDatos($row){

		$pregunta = new Pregunta(); 

		$pregunta->set_id($row["id"]);
		$pregunta->set_pregunta($row["pregunta"]);
		$pregunta->set_respuesta($row["respuesta"]);

		return $pregunta;
	}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_pregunta(){return $this->pregunta;}
function set_pregunta($valor){$this->pregunta=$valor; }

function get_respuesta(){return $this->respuesta;}
function set_respuesta($valor){$this->respuesta=$valor; }


		/*-----------------------INSERTAR-------------------------------------------------------------*/
			/*function insertar($objeto,$usuario){
			       $c = new Conexion;	$conexion=$c->Conectarse($c); 

			       if(!trim($objeto->get_pregunta())){
			       	  $pregunta=NULL;
			       }else{
			       	  $pregunta="'".$objeto->get_pregunta()."'";	
			       }

				   $sql_inserta="INSERT INTO `bodega`(`id`, `pregunta`) VALUES ( NULL, ".$pregunta.")";			
						
					
					if(mysqli_query($conexion,$sql_inserta) ){	
					   	$respuesta=mysqli_insert_id($conexion);				
					}else{
						 $respuesta=-1;
					}	
					return $respuesta;			
			}*/


		/*-----------------ACTUALIZAR----------------*/
			/*function actualizar($objeto,$usuario){

				if(!trim($objeto->get_pregunta())){ 
			       	  $pregunta=NULL;
			    }else{
			       	  $pregunta="'".$objeto->get_pregunta()."'";	
			    }

			   $c = new Conexion;	$conexion=$c->Conectarse($c); 
			   $sql_actualizar="UPDATE `bodega` SET `pregunta`=".$pregunta." WHERE id='".$objeto->get_id()."' ";
			   if(mysqli_query($conexion,$sql_actualizar) ){	
						$Id_perfil=$objeto->get_id();				
				}else{
						 $Id_perfil=-1;
				}	
			    return $Id_perfil;			
			}*/


		/*------------------CONSULTAS---------------*/

		private function consultaPaginada($id,$activa){
				$c = new Conexion; $conexion=$c->Conectarse($c);
				$sql = "SELECT * FROM preguntas";

				$condicion=" WHERE ";
				if($id!=""){
					$sql=$sql.$condicion." id=".$id;
					$condicion = ' AND ';
				}

				if($activa!=""){
					$sql=$sql.$condicion." activa=".$activa;
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
			$data=$this->consultaPaginada($id,'');
			return $data[0];
		}

		function consultaActivas(){
			$data=$this->consultaPaginada('',1);
			return $data;
		}

}

?>