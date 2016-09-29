<?php

class NombreFoto{

private $id;
private $nombre;
private $titulo;


function llenarDatos($row){

		$nombreFoto = new NombreFoto(); 

		$nombreFoto->set_id($row["id"]);
		$nombreFoto->set_nombre($row["nombre"]);
		$nombreFoto->set_titulo($row["titulo"]);

		return $nombreFoto;
	}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_nombre(){return $this->nombre;}
function set_nombre($valor){$this->nombre=$valor; }

function get_titulo(){return $this->titulo;}
function set_titulo($valor){$this->titulo=$valor; }


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
				$sql = "SELECT * FROM nombre_foto";

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

		function consulta(){
			$data=$this->consultaPaginada('');
			return $data;
		}

}

?>