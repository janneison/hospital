<?php

class Dependencia{

private $id;
private $nombre;

function llenarDatos($row){

		$dependencia = new Dependencia(); 

		$dependencia->set_id($row["id"]);
		$dependencia->set_nombre($row["nombre"]);
		
		return $dependencia;
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

		function consultaPaginada(){

				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT id,nombre FROM dependencia ORDER BY id ASC ";

				$resultado=mysqli_query($conexion,$sql);
				$registro = mysqli_num_rows($resultado);

				if($registro>0){
					$i = 0;	
					while ($row = mysqli_fetch_assoc($resultado)) {
						   $dependencia[$i]=$this->llenarDatos($row);
						   $i++;
					}						
					return 	$dependencia;
				}else{
				    return 0;
				}
		}
		/**
		 * [llenar llenar datos]
		 * @param  [type] $id [codigo]
		 */
		function llenar($id){

				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT id,nombre FROM dependencia where id='".$id."' ";

				$resultado=mysqli_query($conexion,$sql);
				$registro = mysqli_num_rows($resultado);

				if($registro>0){
					$row = mysqli_fetch_assoc($resultado);
					$this->set_id($row["id"]);
					$this->set_nombre($row["nombre"]);
					
				}
		}


}

?>