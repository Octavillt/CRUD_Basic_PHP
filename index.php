<?php 
require_once('conexion.php');

	if(!empty($_POST)){

		$nombre = $_POST['txtnombre'];
		$apellidos = $_POST['txtapellido'];
		$telefono = $_POST['txttelefono'];
		$correo = $_POST['txtemail'];

		if(empty($_POST['txtnombre']) || empty($_POST['txtapellido']) || empty($_POST['txttelefono']) ||
			empty($_POST['txtemail'])){
			echo "<strong> Todos los Campos son Obligtorios</strong> <br><br>";
		}else{
			$sql_query = mysqli_query($conexion,"SELECT email FROM persona WHERE email = '$correo'");

			$result_query = mysqli_num_rows($sql_query);

			if($result_query > 0){
				echo "El correo ya existe.";			
			}else{
				$sql_insert = mysqli_query($conexion,"INSERT INTO persona(nombre, apellido, telefono, email) VALUES ('$nombre','$apellidos',$telefono,'$correo')");

				if($sql_insert == true){
					echo "Usuario Agregado Correctamente";
				}else{
					echo "Error al Agregar al Usuario";
				}

				
			}
		}
	}
 ?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Crud Basico</title>
</head>
<body>
	

<div class="container">
<form method="post">
	
<label for="txtnombre">Nombre(s): </label>
<input type="text" id="txtnombre" name="txtnombre">
<label for="txtapellido">Apellidos: </label>
<input type="text" id="txtapellido" name="txtapellido">
<br>
<br>
<label for="txttelefono">Telefono: </label>
<input type="text" id="txttelefono" name="txttelefono">
<label for="txtemail">Correo: </label>
<input type="text" id="txtemail" name="txtemail">
<br>
<br>
<input type="submit" value="Guardar">
</form>

</div>
</body>
</html>