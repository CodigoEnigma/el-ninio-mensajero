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
		while ($row=mysqli_fetch_row ($ressql)){
		    	$ci=$row[0];
		    	$nombre=$row[3];
		    	$apellido=$row[4];
		    	$tipo=$row[7];
		    }



		?>

		<form action="ejecutaactualizar.php" method="post">
				CI<br><input type="text" name="ci" value= "<?php echo $ci ?>" readonly="readonly"><br>
				Nombre<br> <input type="text" name="nombre" value="<?php echo $nombre?>"><br>
				Apellido<br> <input type="text" name="apellido" value="<?php echo $apellido?>"><br>
				Tipo<br> <input type="text" name="tipo" value="<?php echo $tipo?>"><br>
				
				<br>
				<input type="submit" value="Guardar" class="btn btn-success btn-primary">
			</form>

				  
		
		
		<div class="span8">
		
		</div>	
		</div>	
		<br/>
		</div>


