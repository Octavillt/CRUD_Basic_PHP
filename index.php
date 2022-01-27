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
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn"
	crossorigin="anonymous">

	<title>Crud Basico</title>
</head>

<body>
	<div class="container">
		<div class="row shadow-none p-3 mb-5 bg-light rounded">	
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<?= isset($alert) ? $alert : ''; ?>
				<div class="tile">
					<div class="tile-body">
						<form class="form shadow p-3 mb-5 bg-white rounded" method="POST">
							<h3 class="tile-title text-center w-75 p-3">Crear Usuario</h3>
							<div class="form-group row">
								<label class="control-label col-md-3" for="txtnombre">Nombre(s):</label>
								<div class="col-md-8">
									<input class="form-control col-md-8" type="text" placeholder="Nombre"
									name="txtnombre" id="txtnombre">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3" for="txtapellido">Apellidos:</label>
								<div class="col-md-8">
									<input class="form-control col-md-8" type="text" placeholder="Apellidos"
									name="txtapellido" id="txtapellido">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3" for="txttelefono">Numero Telefonico:</label>
								<div class="col-md-8">
									<input class="form-control col-md-8" type="number" placeholder="Telefono"
									name="txttelefono" id="txttelefono">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3" for="txtemail">Correo Electrico:</label>
								<div class="col-md-8">
									<input class="form-control col-md-8" type="email" placeholder="Correo Electrico"
									name="txtemail" id="txtemail">
								</div>
							</div>
							<div class="tile-footer text-center">
								<div class="row">
									<div class="col-md-8 col-md-offset-3">
										<input type="submit" class="btn btn-success" value="Guardar Usuario">
									</div>
								</div>
							</div>		
						</form>
					</div>
				</div>		
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>
</html>



