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
	
<h2> Administración de usuarios registrados</h2>
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

				echo "<td ><a href='Administrar.php?id=$arreglo[0]&idborrar=2 ' ><img src='images/eliminar.png' class='img-rounded'/></a></td>";	
	
			echo "</tr>";

		}

		echo "</table>";
		

		


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
 
		$sqlborrar="DELETE FROM usuario WHERE ID_USUARIO=$id";
		$resborrar=mysqli_query($conn,$sqlborrar);
		echo '<script>alert("REGISTRO ELIMINADO")</script> ';
		echo "<script>location.href='Administrar.php'</script>";


	}	 ?>

</form>
         <button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>

        </div>
      </div>
      
    </div>
  </div>
  
</div>




    <?php 
    if(@$idborrar==2){
    				echo'
<script>
    				$("#myModal").modal("show");
    				</script>';
    			}

    ?>