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
			mysqli_close($conn);
			echo '<script>alert("REGISTRO ELIMINADO")</script> ';
			echo "<script>location.href='Administrar.php'</script>";
		}

	?>
