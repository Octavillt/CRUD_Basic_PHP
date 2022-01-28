<?php 
require_once('conexion.php');

if(!empty($_POST)){

	$alert = "";
	$nombre = $_POST['txtnombre'];
	$apellidos = $_POST['txtapellido'];
	$telefono = $_POST['txttelefono'];
	$correo = $_POST['txtemail'];

	if(empty($_POST['txtnombre']) || empty($_POST['txtapellido']) || empty($_POST['txttelefono']) ||
		empty($_POST['txtemail'])){	
		$alert = '<div class="alert alert-warning text-center">
	Todos los Campos son Obligatorios.
	</div>';
}else{

	$sql_query = mysqli_query($conexion,"SELECT email FROM persona WHERE email = '$correo'");

	$result_query = mysqli_num_rows($sql_query);
	if($result_query > 0){
		$alert = '<div class="alert alert-info text-center">
		El Correo ya esta Registrado.
		</div>';		
	}else{
		$sql_insert = mysqli_query($conexion,"INSERT INTO persona(nombre, apellido, telefono, email) VALUES ('$nombre','$apellidos',$telefono,'$correo')");

		if($sql_insert == true){
			$alert = '<div class="alert alert-success text-center">
			Registro Guardado Correctamente.
			</div>';
		}else{
			$alert = '<div class="alert alert-danger text-center">
			Error al Guardar el Registro, intentelo más tarde.
			</div>';
		}
	}
}
}
?> 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	crossorigin="anonymous">

	<title>Crud Basico</title>
</head>

<body>
	<div class="container">
		<div class="row shadow-none p-3 mb-5 bg-light rounded justify-content-center">	
			<div class="col-md-9">
				<?= isset($alert) ? $alert : ''; ?>
				<div class="card form shadow p-3 mb-5 bg-white rounded">
					<div class="card-header text-center">
						<strong>Crear</strong> Usuario
					</div>
					<div class="card-body card-block">
						<form action="" method="post" class="">
							<div class="form-group">
								<label for="txtnombre" class="form-control-label">Nombre(s):</label>
								<input type="text" id="txtnombre" name="txtnombre" placeholder="Nombre" class="form-control col-md-7">
							</div>
							<div class="form-group">
								<label for="txtapellido" class="form-control-label">Apellidos:</label>
								<input type="text" id="txtapellido" name="txtapellido" placeholder="Apellidos" class="form-control col-md-7">
							</div>
							<div class="form-group">
								<label for="txttelefono" class="form-control-label">Telefono:</label>
								<input type="number" id="txttelefono" name="txttelefono" placeholder="Telefono" class="form-control col-md-5">
							</div>
							<div class="form-group">
								<label class="control-label col-md-5" for="txtemail">
								Correo Electronico:</label>
								<input class="form-control col-md-7" type="email" placeholder="Correo Electronico"
								name="txtemail" id="txtemail">
							</div>
							<div class="text-center align-items-center justify-content-center">
									<div class="col-auto">
										<input type="submit" class="btn btn-success" value="Guardar Usuario">
									</div>
							</div>
						</form>
					</div>
				</div>	
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</html>


