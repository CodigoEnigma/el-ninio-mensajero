<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
   <?php
	require('config/config.php'); 
	require('config/db.php');
	$query = 'SELECT * FROM carta_recivida where RESPUESTA IS NOT NULL ORDER BY ID_CARTA_RECIVIDA ASC';
	$result = mysqli_query($conn, $query);
	$cartas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	mysqli_free_result($result);

	mysqli_close($conn);
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
        </a> 

          <br>
		  <br>
		<h1 style ="margin-right: 90px; " align="center"><strong>Cartas respondidas</strong></h1>
		<br>
		<br>
		
		<?php foreach($cartas as $carta) : ?>
		
       
		
		
		
		
		<div class = "contenidoCarta">
                <div class="imagenCarta" style="float:left">
							
			    <img src="data:image/png;base64,<?php echo base64_encode($carta['IMAGEN_AVATAR']) ?>" height="100" width="100">				
		        </div>
                <div align = "center">
						<div class="burbuja">
							<h5><strong>Enviado <?php echo $carta['FECHA_RECEPCION']; ?></strong></h5>
						
						</div>
                        <div class = "imagen">
                             <?php
                            $imagen = $carta['IMAGEN'];
                            if(!is_null($imagen)){
                                echo "<div align='center'>" ;
                                echo "<h5><strong>Imagen adjuntada a la carta</strong></h5>" ;
                                echo "<img src='data:image/jpeg;base64,". base64_encode($imagen)."' height='125' width='125'>" ;
                                echo "</div>" ;
                            }
							?>
						</div>
						<div class="burbujaRespuesta">
							<h5><strong>Respuesta</strong></h5>
							<?php echo $carta['RESPUESTA']; ?>
						</div>
						
                </div>
				
				    
		</div>
		
		
			<!--?php echo '<img src="data:image/png;base64,' . base64_encode($carta['IMAGEN']) . '">'; ?-->
        
		<?php endforeach; ?>
	</div>

    
</body>
</html>

