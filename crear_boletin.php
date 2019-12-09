



<?php

require('config/config.php');
	require('config/db.php');
	session_start();

 include('inc/header.php');
?>


<a href="<?php echo ROOT_URL; ?>editor_boletin.php" role = "button" style="float:left; margin:10px;">
            <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
        </a> 
        <br><br><br>
<?php
	
 		echo "<br>";
 		echo '<div class="row">';
 		echo '<table border="1"; class="table table-dark" style="margin-left:30px;max-width:40%">';

		//echo "<table border='1'; class='table table-dark';>";
			echo "<tr class='warning'>";
				echo "<td>Texto carta</td>";
				echo "<td>Fecha de envio</td>";
				echo "<td>Selecionar</td>";
			echo "</tr>";
			//echo "<h2><strong>Administración de usuarios registrados</strong> </h2>"


	?>


<button type="button" class="btn btn-default" href=''></button>

	<?php
        $sql=("SELECT * FROM carta_recivida");
		$query=mysqli_query($conn,$sql);
        while($arreglo=mysqli_fetch_array($query)){	
			echo "<tr class='success'>";
            echo "<td>$arreglo[2]</td>";
            echo "<td>$arreglo[7]</td>";
            echo '<td><label><input type="checkbox" id="cbox1" value="first_checkbox"></label></td>';
			echo "</tr>";


		}

		echo "</table>";
		 mysqli_close($conn);
		// echo '<div class="warning">';
		 //echo '<button type="button" class="btn btn-success btn-primary" data-dismiss="modal" style="margin-left: 50px;">Crear Boletin</button>'; 
		 //echo "</div>";
		


		extract($_GET);


?>


<div class = "boletin_der">

<h2 style="margin-left: 250px;"><strong>Vista previa boletin</strong> </h2>

<div class="card text-white bg-secondary mb-3" style="max-width: 50rem; margin-left: 60px;">
  <div class="card-header" style="margin-left: auto;margin-right: auto;">BOLETIN</div>
  <div class="card-body">
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
</div>

