<?php
	require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
		$body = $_POST['TEXTO_CARTA'];
		date_default_timezone_set('America/La_Paz');
		$fecha = date("Y-m-d H:i:s");
		//$img = $_POST['imagen'];
		//$image = addslashes(file_get_contents($_POST['imagen']['tmp_name']));
		$nombre_imagen = $_FILES['imagen']['name'];
    	$tipo_imagen=$_FILES['imagen']['type'];
		$tamanio_imagen=$_FILES['imagen']['size'];
		
		if($tamanio_imagen<=20000000){
			if($tipo_imagen=="image/jpeg" || $tipo_imagen=="image/jpg" || $tipo_imagen=="image/png" ||
				$tipo_imagen=="image/gif"){ 
				$carpeta_destino=$_SERVER['ROOT_URL'];
				
					move_uploaded_file($_FILES['imagen']['tmp_name'],$nombre_imagen);
					//echo "exito";
	
			} //else {echo "Solo se pueden subir imagenes" ;} 
		}  //else {echo "tamaño muy grande de la imagen" ;}

		$archivo_objetivo=fopen($nombre_imagen,"r");

    	$contenido=fread($archivo_objetivo,$tamanio_imagen); 
	
	    $contenido=addslashes($contenido);

    	fclose($archivo_objetivo);

		$query = "INSERT INTO carta_recivida (TEXTO_CARTA, FECHA_RECEPCION, IMAGEN) VALUES('$body', '$fecha', '$contenido')";

		mysqli_close($conn);

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
			
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
	
?>

<?php include('inc/header.php'); ?>


    <div class="contenedor">
	<script type="text/javascript">
		/*function abrir(){
			alert('Su carta ha sido enviada con exito :)');
		}*/
	</script>
        <div class="alert alert-danger" role="alert">
			<div class="icono-advertencia">
				<img src="images/icono-advertencia.png" style="height: 100px; width: 100px;">
			</div>
            <h4><strong>RECUERDA AMIGUITO! Tu seguridad es muy importante para nosotros. Por favor no utilices tus nombres o apellidos, el nombre de tu escuela, el lugar donde vives, el nombre de tus padres o numero de telefono.</strong></h4>
		</div>
		<a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
		  </a> 
         <div  style="float:right">
              <p class="cartasParrafo"><strong>Escoje un pesonaje</strong></p>
            		<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>avatares.php" role="button" id = "iconos">
              			<img class="imgCarta" src="emojis/<?php extract($_GET);echo $id;?>.png" class="img-fluid" alt="Responsive image">
           			</a>
         </div>
      
        <h1 align="center"><Strong>¡Cuentanos cómo estas!</Strong></h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="form-group" align="center">
				<textarea name="TEXTO_CARTA" class="form-control" style = 'width:750px; height:350px;'></textarea><br>
			
				<input type="file" name="imagen" id="imagen" size="20" class="btn btn-info"> 
			
				<input type="submit" name="submit" id="enviar" value="Enviar carta" class="btn">
			</div>			
    </div>	
</body>
</html>