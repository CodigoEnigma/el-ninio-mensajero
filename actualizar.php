<?php
	require('config/config.php');
	require('config/db.php');

	session_start();

	extract($_GET);

		$sql="SELECT * FROM usuario WHERE ID_USUARIO=$id";
		$ressql=mysqli_query($conn,$sql);
		$row=mysqli_fetch_row ($ressql);

	if (isset($_POST['editar'])) {
		$ciR = mysqli_real_escape_string($conn, $_POST['ci']);
		$tipoR = substr(mysqli_real_escape_string($conn, $_POST['tipo']),0,3);
		$nombreR = mysqli_real_escape_string($conn, $_POST['nombre']);
		$apellidoR = mysqli_real_escape_string($conn, $_POST['apellido']);

	$query = "UPDATE usuario SET ID_ESPECIALIDAD='$tipoR', NOMBRE_USUARIO='$nombreR', APELLIDOS_USUARIO='$apellidoR' WHERE ID_USUARIO=$ciR";
	if(mysqli_query($conn, $query)){
		mysqli_close($conn);
		header('Location: '.ROOT_URL.'Administrar.php');
	}
		$error = "No se pudieron guardar sus cambios.";
	}
?>

<?php include('inc/header.php'); ?>

	<h2> Administración de usuarios registrados</h2>	
	<div class="well well-small">
	<hr class="soft"/>
	<h4>Edición de usuarios</h4>
	<div class="row-fluid">

	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
			CI<br><input type="text" name="ci" value= "<?php echo $row[0] ?>" readonly="readonly"><br>
			Nombre<br> <input type="text" name="nombre" value="<?php echo $row[3];?>"><br>
			Apellido<br> <input type="text" name="apellido" value="<?php echo $row[4];?>"><br>
			Tipo<br> <input type="text" name="tipo" value="<?php echo $row[7];?>" readonly="readonly"><br>
			
			<br>
			<button type="submit" name="editar" class="btn btn-success btn-primary">Guardar</button>
		</form>
	
	<div class="span8">
	
	</div>	
	</div>	
	<br/>
</div>


