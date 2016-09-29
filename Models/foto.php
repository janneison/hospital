<?php

class Foto{

private $id;
private $ruta;
private $id_nombre;


function llenarDatos($row){

		$foto = new Foto(); 

		$foto->set_id($row["id"]);
		$foto->set_ruta($row["ruta"]);
		$foto->set_id_nombre($row["id_nombre"]);

		return $foto;
	}

function get_id(){return $this->id;}
function set_id($valor){$this->id=$valor; }

function get_ruta(){return $this->ruta;}
function set_ruta($valor){$this->ruta=$valor; }

function get_id_nombre(){return $this->id_nombre;}
function set_id_nombre($valor){$this->id_nombre=$valor; }


		/*-----------------------INSERTAR-------------------------------------------------------------*/
			/*function insertar($objeto,$usuario){
			       $c = new Conexion;	$conexion=$c->Conectarse($c); 

			       if(!trim($objeto->get_ruta())){
			       	  $ruta=NULL;
			       }else{
			       	  $ruta="'".$objeto->get_ruta()."'";	
			       }

				   $sql_inserta="INSERT INTO `bodega`(`id`, `ruta`) VALUES ( NULL, ".$ruta.")";			
						
					
					if(mysqli_query($conexion,$sql_inserta) ){	
					   	$respuesta=mysqli_insert_id($conexion);				
					}else{
						 $respuesta=-1;
					}	
					return $respuesta;			
			}*/


		/*-----------------ACTUALIZAR----------------*/
			/*function actualizar($objeto,$usuario){

				if(!trim($objeto->get_ruta())){ 
			       	  $ruta=NULL;
			    }else{
			       	  $ruta="'".$objeto->get_ruta()."'";	
			    }

			   $c = new Conexion;	$conexion=$c->Conectarse($c); 
			   $sql_actualizar="UPDATE `bodega` SET `ruta`=".$ruta." WHERE id='".$objeto->get_id()."' ";
			   if(mysqli_query($conexion,$sql_actualizar) ){	
						$Id_perfil=$objeto->get_id();				
				}else{
						 $Id_perfil=-1;
				}	
			    return $Id_perfil;			
			}*/


		/*------------------CONSULTAS---------------*/

		private function consultaPaginada($id,$id_nombre){
				$c = new Conexion; $conexion=$c->Conectarse($c);
				$sql = "SELECT * FROM fotos ";

				$condicion=" WHERE ";
				if($id!=""){
					$sql=$sql.$condicion." id=".$id;
					$condicion = ' AND ';
				}

				if($id_nombre!=""){
					$sql=$sql.$condicion." id_nombre=".$id_nombre;
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
			$data=$this->consultaPaginada($id,"");
			return $data[0];
		}

		function consultaPorNombre($id_nombre){
			$data=$this->consultaPaginada("",$id_nombre);
			return $data;
		}

}

?>