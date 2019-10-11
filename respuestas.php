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
		<h1>Cartas respondidas</h1>
		<?php foreach($cartas as $carta) : ?>
		<div class = "contenidoCarta">
				<ul class="list-group">
					
						<li class="list-group-item" id = "enviado">	
							<p><small>Enviado <?php echo $carta['FECHA_RECEPCION']; ?></small><br></p>
							<?php echo $carta['TEXTO_CARTA']; ?><br><br>
						</li>	
												
						<li class="list-group-item" id="respuesta">
							<p><small>Respuesta</small></p>
							<?php echo $carta['RESPUESTA']; ?>
						</li>
					
					
					
					<!--a href="descarga.php?id=?php echo $carta['ID_CARTA_RECIVIDA'] ?>" class="btn btn-primary">Descargar</a-->
					<!--a download="img.jpg" [href]="/" title="ImgName"-->
					<!--/a-->
				</ul>
		</div>
		<div class="imagenCarta">
							<img src="data:image/jpeg;base64,<?php echo base64_encode($carta['IMAGEN']) ?>"/ height="125" width="125">
		</div>
			<!--?php echo '<img src="data:image/png;base64,' . base64_encode($carta['IMAGEN']) . '">'; ?-->
				

		<?php endforeach; ?>
	</div>