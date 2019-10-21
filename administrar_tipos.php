<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
	
?>

<?php include('inc/header.php'); ?>
	<?php
	
		echo "<table border='1'; class='table table-dark';>";
			echo "<tr class='warning'>";
				echo "<td>ID</td>";
				echo "<td>Nombre tipo usuario</td>";
				echo "<td>descripcion</td>";
				echo "<td>Editar</td>";
				echo "<td>Borrar</td>";
			echo "</tr>";
	?>
	
	
	<?php
	
			echo "<tr class='success'>";
				echo "<td>1</td>";
				echo "<td>Terror</td>";
				echo "<td>este tipo de usuario se dedica a todo lo relacionado con terror</td>";
				
				echo "<td><a href='actualiza_datos_tipo_user.php?id=0'><img src='images/actualizar.gif' class='img-rounded'></td>";
				echo "<td><a href='Administrar.php?id=0&idborrar=2'><img src='images/eliminar.png' class='img-rounded'/></a></td>";		
			echo "</tr>";
		

		echo "</table>";

	?>
	
	</div>



</body>
</html>
