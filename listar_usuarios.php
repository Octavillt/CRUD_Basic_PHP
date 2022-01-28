<?php require_once('conexion.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	crossorigin="anonymous">
	<title>Lista de Usurios</title>
</head>
<body>
	<div class="container">
		<div class="row shadow-none p-3 mb-5 bg-light rounded justify-content-center">	
			<div class="col-md-9">
				<div class="tile">
					<h3 class="tile-title text-center">Lista de Usuarios</h3>
					<div class="row justify-content-between p-2">	
						<div class="col-sm-25">
							<a href="crear_usuario.php" class="btn btn-info"> Crear Usuario</a>
						</div>	
						<div class="col-sm-45">
							<form class="form-inline my-2 my-lg-0" method="GET" action="buscar_usuarios.php">
								<input class="form-control mr-sm-2" type="text" placeholder="Buscar Usuario"
								name="buscar" id="buscar">
								<button class="btn btn-outline-success my-2 my-sm-0" type="submit">
								Buscar</button>
							</form>
						</div>	
					</div>	
					<table class="table table-striped table-bordered hadow-sm p-3 mb-5 bg-white rounded">
						<thead>
							<tr>
								<th>id</th>
								<th>Nombre(s)</th>
								<th>Apellidos</th>
								<th>Telefono</th>
								<th>Correo Electronico</th>
							</tr>
						</thead>
						<tbody>
							<?php 

							$sql_query = mysqli_query($conexion,"SELECT * FROM persona");
							$result_query = mysqli_num_rows($sql_query);

							if(!empty($result_query)){

								while($row = mysqli_fetch_array($sql_query)){
									?>
									<tr>
										<td><?= $row['id_persona']; ?></td>
										<td><?= $row['nombre']; ?></td>
										<td><?= $row['apellido']; ?></td>
										<td><?= $row['telefono']; ?></td>
										<td><?= $row['email']; ?></td>
									</tr>
									<?php  
								}
							}
							
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>