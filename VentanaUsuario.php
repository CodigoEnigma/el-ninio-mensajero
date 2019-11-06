<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
	
?>

<?php include('inc/header.php'); ?>
	<?php

		echo "<h1>Bienvenido:</h1>";
		//echo '<h2 style="text-align:right">Alertas:</h2>';
		echo '<h2 style="text-align:center">CARTAS ASIGNADAS</h2>';

		$sql=("SELECT * FROM carta_recivida");
		$query=mysqli_query($conn,$sql);
		//echo '<div class="card">';          
		echo '<table border="1"; class="table table-dark" style="margin-left: auto;margin-right: auto;max-width:70%">';
			echo "<tr class='warning'>"; 
				echo "<td>Texto de la carta</td>";
				echo "<td>Fecha de envio de carga</td>";
				echo "<td>Carta Leida</td>";
			//	echo "<td></td>";
			//	echo "<td></td>";

			echo "</tr>";
		//echo "</div>";
	?>
	

	<?php

		while($arreglo=mysqli_fetch_array($query)){	

			echo "<tr class='medio'>";
				echo "<td><a href='carta.php?id=$arreglo[0]'>$arreglo[2]</a></td>";
				echo "<td>$arreglo[8]</td>";
				//echo "<td>$arreglo[5]</td>";
				//echo "<td>$arreglo[]</td>";
				//echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";

				//echo "<td ><a href='Administrar.php?id=$arreglo[0]&idborrar=2 ' ><img src='images/eliminar.png' class='img-rounded'/></a></td>";	
	
			echo "</tr>";

		}

		echo "</table>";
		

		


		extract($_GET);


?>



    <?php 
    if(@$idborrar==2){
    				echo'
<script>
    				$("#myModal").modal("show");
    				</script>';
    			}

    ?>