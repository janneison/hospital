<?php

class conexion{

var $Servidor; 		// 1. Host de la Base de datos
  var $nombreBD; 	// 2. Nombre de la Base de datos
  var $usuario; 	// 3. Usuario para la conexión de la BD
  var $clave; 		// 4. Clave para la conexión con la BD

 // 1. Funciones para obtener los datos de un objeto conexión
  function obtenerHost(){
    return $this->Servidor;
  }

  function obtenerNombreBD(){
    return $this->nombreBD;
  }

  function obtenerUsuario(){
    return $this->usuario;
  }

  function obtenerClave(){
    return $this->clave;
  }


  // 2. Funciones para establecer los datos de un objeto conexión
  function establecerHost($Servidor){
    $this->Servidor = $Servidor;
  }

  function establecerNombreBD($nombreBD){
    $this->nombreBD = $nombreBD;
  }
  
  function establecerUsuario($usuario){
    $this->usuario = $usuario;
  }

  function establecerClave($clave){
    $this->clave = $clave;
  }  

  // 3. Función para la conexión con la BD
  function Conectarse($conexion){
   
		// Se establecen los parámetros del objeto de tipo Conexion con los parámetros de conexión de la BD
		$conexion->establecerHost("localhost");
		$conexion->establecerNombreBD("hospital");
		$conexion->establecerUsuario("root");
		$conexion->establecerClave("root");
   
		// Se obtienen los datos del objeto conexion
		$Servidor = $conexion->obtenerHost();
		$nombreBD = $conexion->obtenerNombreBD();
		$usuario = $conexion->obtenerUsuario();
		$clave = $conexion->obtenerClave();
		
         $link = new mysqli($Servidor,$usuario,$clave,$nombreBD);
        //Si sucede algún error la función muere e imprimir el error
        if(mysqli_connect_errno()){
            printf("Conexión fallida: %s\n", mysqli_connect_error());
			exit();
        }
        //Si nada sucede retornamos la conexión		

    return $link;
		
	}
	
	
  // 4. Función que cierra la conexión con la Base de Datos
  function Desconectarse($link){
    mysqli_close($link);
  }




}



?>