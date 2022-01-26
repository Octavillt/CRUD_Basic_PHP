<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lista de Usurios</title>
</head>
<body>

	<table method="get">
		<thead>
		<tr>
			
			<td>id</td>
			<td>Nombre</td>
			<td>Apellidos</td>
			<td>Telefono</td>
			<td>Email</td>

		</tr>
		</thead>
		<tbody>
			<tr>
				
				<?php 
				require_once("conexion.php");
				$sqli_query = mysqli_query($conexion,"SELECT * FROM persona");

				$result_query = mysqli_fetch_array($sqli_query);
				print_r($result_query);


				 ?>

			</tr>

		</tbody>

	</table>

	
</body>
</html>