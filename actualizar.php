<?php
	require('config/config.php');
	require('config/db.php');

	session_start();
	if(!isset($_COOKIE)){
		header('Location: '.ROOT_URL.'');
	} else {
		if($_COOKIE['roll'] != 'administrador'){
			$queryEspec = 'SELECT * FROM especialidad';
      		$resultEspec = mysqli_query($conn,$queryEspec);
			$especs = mysqli_fetch_all($resultEspec, MYSQLI_ASSOC);
			header('Location: '.ROOT_URL.'');
		} else {

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
		}
	}
?>

<?php include('inc/header.php'); ?>
<div class="container">

	 <a href="<?php echo ROOT_URL; ?>Administrar.php" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
            </a> 
  

	

	<hr class="soft">
        <div class="cabeceraSesion">
        	<h2>EDICION DE USUARIOS</h2>
        </div>


	<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post"  class="login">
		CI<br>
		<div class="input-group">
			<input type="text" name="ci" value= "<?php echo $row[0] ?>" ><br>
		</div>
			Nombre<br>
		<div class="input-group">
			 <input type="text" name="nombre" value="<?php echo $row[3];?>">
		</div>
			Apellido<br> 
		<div class="input-group">
			<input type="text" name="apellido" value="<?php echo $row[4];?>">
		</div>
			Tipo<br> 
		<div class="input-group">
			<select name="especialidad" required>
				<option value="">Elige una opción</option>    
				<?php foreach($especs as $espec) : ?>
				<option value="<?php echo $espec['ID_ESPECIALIDAD']; ?>"><?php echo $espec['NOMBRE_ESPECIALIDAD']; ?></option>
				<?php endforeach;?>
			</select> 
		</div>
			<br>
			<a href="<?php echo ROOT_URL; ?>Administrar.php" name="cancel" style="margin-right: 70px; margin-left:10px" class="btn btn-success btn-primary">Cancelar</a>
			<button type="submit" name="editar" class="btn btn-success btn-primary">Guardar</button>
		</form>
	</hr>
	</div>
	


</body>
</html>
