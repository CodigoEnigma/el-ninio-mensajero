<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
    extract($_GET);

		if(!isset($_COOKIE)){
		header('Location: '.ROOT_URL.'');
	} else {
		if($_COOKIE['roll'] != 'administrador'){
			header('Location: '.ROOT_URL.'');
		}
	}
 include('inc/header.php');
?>
    
    
    
		<table border='1'; class='table table-dark';>
			<tr class='warning'>
				<td>ID</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Especialidad</td>
				<td>Correo</td>
				<td>Editar</td>
				<td>Borrar</td>
			</tr>
	

	<br>
<h2><strong>Administración de usuarios registrados</strong> </h2>
    
    
    <?php require('config/db.php');
                $query=mysqli_query($conn,"SELECT * FROM usuario");
                $especs= mysqli_fetch_all($query,MYSQLI_ASSOC);
                mysqli_close($conn);   
                foreach($especs as $espec) : ?>
                    <tr class='success'>
                        <td><?php echo $espec['ID_USUARIO'];?></td>
                        <td><?php echo $espec['NOMBRE_USUARIO'];?></td>
                        <td><?php echo $espec['APELLIDOS_USUARIO'];?></td>
                        <td><?php $esp = $espec['ID_ESPECIALIDAD'];
                                require('config/db.php');
                                $consulta = mysqli_query($conn, "SELECT NOMBRE_ESPECIALIDAD FROM especialidad WHERE ID_ESPECIALIDAD = '$esp'");
                                $resultado_especialidad = mysqli_fetch_array($consulta,MYSQL_ASSOC);
                                 mysqli_close($conn); 
                                 echo $resultado_especialidad['NOMBRE_ESPECIALIDAD'] ;
                                 
                            ?></td>
                        <td><?php echo $espec['CORREO_USUARIO'];?></td>                       
                        <td><a href="<?php echo ROOT_URL ;?>actualizar.php?id=<?php echo $espec['ID_USUARIO'];?>"><img class='imgCarta' src='images/ICONO_ACTUALIZAR.png' class='img-sluid' alt='Responsive image' style = 'width:50px; height:50px;'></a></td>                     <td><a href="<?php echo ROOT_URL ;?>Administrar.php?id=<?php echo $espec['ID_USUARIO'];?>&idborrar=2"><img class='imgCarta' src='images/ICONO_ELIMINAR.png' class='img-sluid' alt='Responsive image' style = 'width:50px; height:50px;'></a></td>	
	
			        </tr>  
                        
                 <?php endforeach;?>  


	
   
    <div class="modal" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Esta seguro de que quiere eliminar al usuario: 
           <?php 
              require('config/db.php');
              $sql=("SELECT * FROM usuario");
		      $query=mysqli_query($conn,"SELECT * FROM usuario WHERE ID_USUARIO = '$id'");
              $res = mysqli_fetch_array($query,MYSQL_ASSOC);
               mysqli_close($conn);
              echo $res['NOMBRE_USUARIO']." ".$res['APELLIDOS_USUARIO'] ;
              ?></h4>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">

        	 <form method="post">


          <button type="submit" class="btn btn-success btn-primary" name = "aceptar">Aceptar</button>
          
          <?php 	if(isset($_POST["aceptar"])){
          require('config/db.php');
		$sqlborrar="DELETE FROM usuario WHERE ID_USUARIO=$id";
		$resborrar=mysqli_query($conn,$sqlborrar);
        mysqli_close($conn);
        if($resborrar){
               echo '<script type="text/javascript">
                                    alert("EL USUARIO FUE ELIMINADO CORRECTAMENTE");
                                    window.location.href="'. ROOT_URL .'Administrar.php";
                                    </script>';
        }else{
             echo '<script type="text/javascript">
                                    alert("EL USUARIO NO SE PUDO ELIMINAR. ASEGURECE QUE NO TENGA CARTAS ASIGNADAS");
                                    window.location.href="'. ROOT_URL .'Administrar.php";
                                    </script>';
            }
        }	 ?>

</form>
         <button type="button" class="btn btn-success btn-primary" data-dismiss="modal">Cancelar</button>

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
