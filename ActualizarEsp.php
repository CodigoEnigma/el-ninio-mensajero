<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
	
?>


<?php include('inc/header.php'); ?>

<a href="<?=$_SERVER['HTTP_REFERER'] ?>" role = "button" style="float:left; margin:10px;">
         	<img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
		  </a>
		  <br><h2>Volver</h2>
		  <br>

	<?php
		$sql=("SELECT * FROM especialidad");
		$query=mysqli_query($conn,$sql);
		echo '<div class="cabecera">';
		echo "<table border='1'; class='table table-dark';>";
			echo "<tr class='warning'>";
			//	echo "<td>ID</td>";
				echo "<td>Especialidad</td>";
				echo "<td>Editar</td>";
				echo "<td>Eliminar</td>";
			echo "</tr>";
		echo '</div>';
	?>

	
<h2> Administración de especialidades</h2>
	

	<?php

				//echo "<table>";

		while($arreglo=mysqli_fetch_array($query)){


			echo "<tr class='success'>";
				echo "<td>$arreglo[1]</td>";
				echo "<td><a href='carta.php'> editar </a></td>";
				echo "<td><a href='ActualizarEsp.php?id=$arreglo[0]&idborrar=2 ' > eliminar </a></td>";


			//	echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";

			//	echo "<td ><a href='Administrar.php?id=$arreglo[0]&idborrar=2 ' ><img src='images/eliminar.png' class='img-rounded'/></a></td>";	
	
			echo "</tr>";

		}
		//echo </table>";
		

		


		extract($_GET);


?>

<div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Esta seguro de que quiere eliminar</h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">

        	 <form method="post">


          <button type="submit" class="btn btn-default" name = "aceptar">aceptar</button>
          <?php 	if(isset($_POST["aceptar"]))
 {
 
		$sqlborrar="DELETE FROM especialidad WHERE ID_ESPECIALIDAD=$id";
		$resborrar=mysqli_query($conn,$sqlborrar);
		echo '<script>alert("REGISTRO ELIMINADO")</script> ';
		echo "<script>location.href='ActualizarEsp.php'</script>";


	}	 ?>

	</form>
         <button type="button" class="btn btn-default" data-dismiss="modal">cancelar</button>

        </div>
      </div>
      
    </div>
  </div>
  
</div>



    <?php 
    if(@$idborrar==2){
    				$sqlborrar="DELETE FROM especialidad WHERE ID_ESPECIALIDAD = $id";
    				$resborrar=mysqli_query($conn,$sqlborrar);
    				echo '<script>alert("ESPECIALIDAD ELIMINADA")</script> ';
    			}

    ?>