<?php

class conexion{

var $Servidor; 		// 1. Host de la Base de datos
  var $nombreBD; 	// 2. Nombre de la Base de datos
  var $usuario; 	// 3. Usuario para la conexi�n de la BD
  var $clave; 		// 4. Clave para la conexi�n con la BD

 // 1. Funciones para obtener los datos de un objeto conexi�n
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


  // 2. Funciones para establecer los datos de un objeto conexi�n
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

  // 3. Funci�n para la conexi�n con la BD
  function Conectarse($conexion){
   
		// Se establecen los par�metros del objeto de tipo Conexion con los par�metros de conexi�n de la BD
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
        //Si sucede alg�n error la funci�n muere e imprimir el error
        if(mysqli_connect_errno()){
            printf("Conexi�n fallida: %s\n", mysqli_connect_error());
			exit();
        }
        //Si nada sucede retornamos la conexi�n		

    return $link;
		
	}
	
	
  // 4. Funci�n que cierra la conexi�n con la Base de Datos
  function Desconectarse($link){
    mysqli_close($link);
  }




}



?>