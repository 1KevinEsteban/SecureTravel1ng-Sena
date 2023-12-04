<?php
	$mysqli = new mysqli('localhost', 'root', '', 'SecureTravel1ng_Base', '3306');
	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);	
	}
?>