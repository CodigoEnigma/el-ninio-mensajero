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

		$sql="SELECT * FROM login WHERE id=$id";
	//la variable  $mysqli viene de connect_db que lo traigo con el require("connect_db.php");
		$ressql=mysqli_query($conn,$sql);
		while ($row=mysqli_fetch_row ($ressql)){
		    	$email=$row[4];

		    }



		?>

		<form action="ejecutaactualizar.php" method="post">
				EMAIL<br><input type="text" name="email" value= "<?php echo $email?>">
				<br>
				NUEVO EMAIL<BR>
				      <input type="contraseña" name="password_1"><br>
				INGRESE CONTRASEÑA<BR>
				      <input type="contraseña" name="password_1"><br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>

				  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		</div>

