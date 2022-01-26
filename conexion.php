<?php 

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'crud_basic';

$conexion = mysqli_connect($host, $user, $password, $db);

if(mysqli_connect_error($conexion)){
	echo "Error en la Conexión: ".mysqli_connect_errno();
	exit();
}else{
	//echo "Conexión Exitosa.";
}




 ?>