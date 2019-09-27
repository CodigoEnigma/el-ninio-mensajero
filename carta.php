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

		if(mysqli_query($conn, $query)){
			header('Location: '.ROOT_URL.'');
		} else {
			echo 'ERROR: '. mysqli_error($conn);
		}
	}
?>

<?php include('inc/header.php'); ?>
    <div class="container">
        <div class="alert alert-danger" role="alert">
            <h4><strong>RECUERDA! Por tu seguridad no utilices nombres, ubicaciones, y demas que podrian ponerte en riesgo.</strong></h4>
        </div>
        <h1>Escribir carta</h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="form-group">
				<textarea name="TEXTO_CARTA" class="form-control" style="height: 20rem;"></textarea><br>
				<input type="file" name="imagen" id="imagenExaminada" size="20"> <br><br>
				<input type="submit" name="submit" value="Enviar carta" class="btn background-color: transparent">
			</div>
    </div>