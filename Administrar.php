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
		$sql=("SELECT * FROM usuario");
		$query=mysqli_query($conn,$sql);
		echo "<table border='1'; class='table table-dark';>";
			echo "<tr class='warning'>";
				echo "<td>ID</td>";
				echo "<td>Nombre</td>";
				echo "<td>Apellido</td>";
				echo "<td>Tipo de Usuario</td>";
				echo "<td>Correo</td>";
				echo "<td>Editar</td>";
				echo "<td>Borrar</td>";
			echo "</tr>";
	?>
	
	
	<?php
		while($arreglo=mysqli_fetch_array($query)){
			echo "<tr class='success'>";
				echo "<td>$arreglo[0]</td>";
				echo "<td>$arreglo[3]</td>";
				echo "<td>$arreglo[4]</td>";
				echo "<td>$arreglo[7]</td>";
				echo "<td>$arreglo[5]</td>";
				//echo "<td>$arreglo[5]</td>";
				echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
				echo "<td><a href='Administrar.php?id=$arreglo[0]&idborrar=2'><img src='images/eliminar.png' class='img-rounded'/></a></td>";		
			echo "</tr>";
		}

		echo "</table>";

		extract($_GET);
		if(@$idborrar==2){

			$sqlborrar="DELETE FROM usuario WHERE ID_USUARIO=$id";
			$resborrar=mysqli_query($conn,$sqlborrar);
			echo '<script>alert("REGISTRO ELIMINADO")</script> ';
			echo "<script>location.href='Administrar.php'</script>";
		}

	?>
	<div class="iconos">				
		<div>
			<a class="btn btn-primary" href="<?php echo ROOT_URL; ?>administrar_tipos.php" role="button"
			 id = "registrar">AGREGAR NUEVO TIPO DE USUARIO</a>
		</div>
	</div>
</body>
</html>
