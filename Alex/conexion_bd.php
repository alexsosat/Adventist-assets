<?php 
	$hostname ='localhost';
	$database = 'advassets';
	$username = 'root';
	$password = '';

	$conexion = new mysqli($hostname,$username,$password,$database);

	if($conexion->connect_errno){
		echo "Error de conexión, revise los parametros de la cadena de conexión";
	}
	
 ?>