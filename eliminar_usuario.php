<?php 
require_once('conexion.php');
$alert = '';

if(!empty($_POST)){

	$idpersona = $_REQUEST['id'];

	$sql_delete = mysqli_query($conexion,"UPDATE persona SET status = 0 WHERE id_persona = $idpersona");
	mysqli_close($conexion);

	if($sql_delete){
		header('Location: listar_usuarios.php');
	}else{
		$alert = '<div class="lert alert-danger text-center">
		Error al Actualizar el Registro.
		</div>';
	}

}

$idpersona = $_REQUEST['id'];

$sql_query = mysqli_query($conexion,"SELECT id_persona, nombre, apellido, email, status FROM persona
	WHERE id_persona = $idpersona AND status != 0");

$result_query = mysqli_num_rows($sql_query);

if(empty($result_query)){
	header('Location: listar_usuarios.php');
}else{

	while($data = mysqli_fetch_array($sql_query)){
		$personaid = $data['id_persona'];
		$nombre = $data['nombre'];
		$apellidos = $data['apellido']; 
		$correo = $data['email'];
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
				<div class="card">
					<div class="card-header">Eliminar Usuario</div>
					<div class="card-body">
						<div class="card-title">
							<h4 class="text-center title-2">¿Esta Seguro de Eliminar al Siguiente Usuario?</h4>
						</div>
						<hr>
						<?= isset($alert) ? $alert : ''; ?>
						<div class="form-group">
							<p><strong>Nombre: </strong> <?= $nombre;?> <?= $apellidos; ?> </p>
						</div>
						<div class="form-group">
							<p><strong>Correo Electronico: </strong> <?= $correo;?> </p>
						</div>
						<form action="" method="post" >
							<input type="hidden" name="idpersona" id="idpersona"
							value="<?= $personaid; ?>">
							<div class="card-footer">
								<button type="submit" class="btn btn-warning btn-sm">
									<i class="fa fa-dot-circle-o"></i> Eliminar 
								</button>
								<a href="listar_usuarios.php" class="btn btn-danger btn-sm">
								Cancelar</a>
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


