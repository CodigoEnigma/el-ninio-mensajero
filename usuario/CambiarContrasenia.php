<?php
	require('config/config.php');
	require('config/db.php');
?>

 <?php include('inc/header.php'); ?>

		<h2> Administración de usuarios registrados</h2>	
		<div class="well well-small">
		<hr class="soft"/>
		<h4>Edición de usuarios</h4>
		<div class="row-fluid">
		
		<?php
		extract($_GET);

		$sql="SELECT * FROM usuario WHERE ID_USUARIO=$id";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($conn,$sql);
		?>

		<form action="ejecutaactualizar.php" method="post">

				INGRESE ANTIGUA CONTRASEÑA<BR>
				      <input type="contraseña" name="password_1"><br>
				INGRESE NUEVA CONTRASEÑA<BR>
				      <input type="contraseña" name="password_2"><br>
				CONFIRMAR CONTRASEÑA				<br>
				      <input type="contraseña" name="password_3">
				
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>

				  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		</div>