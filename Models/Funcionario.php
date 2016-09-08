<?php

class Funcionario{

public $id;
public $nombre;
public $apellido;
public $correo;
public $dependencia;

function llenarDatos($row){

		$funcionario = new Funcionario(); 

		$funcionario->id=$row["id"];
		$funcionario->nombre=$row["nombre"];
		$funcionario->apellido=$row["apellido"];
		$funcionario->correo=$row["correo"];
		
		return $funcionario;
	}




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
		/**
		 * [consultaPaginada traer funcionario]
		 * @return [type] [description]
		 */
		function consultaPaginada(){

				$c = new Conexion; 
				$conexion=$c->Conectarse($c);

				$sql = "SELECT id, nombre, apellido, correo,dependecia FROM 
				funcionario ORDER BY id ASC ";

				$resultado=mysqli_query($conexion,$sql);
				$registro = mysqli_num_rows($resultado);

				if($registro>0){
					$i = 0;	
					while ($row = mysqli_fetch_assoc($resultado)) {
						   $funcionario[$i]=$this->llenarDatos($row);
						   $i++;
					}						
					return 	$funcionario;
				}else{
				    return 0;
				}
		}

}

?>