<?php
	require('config/config.php');
	require('config/db.php');

	session_start();
	

?>

<?php include('inc/header.php'); ?>
	<div class="container">
			<div class="contenedorBienvenida">
				<div class="bienvenida">
					<img src="images/icono-bienvenida.png" style="height: 300px; width: 300px;">
				</div>
				<div class="burbuja">
					<img src="images/burbuja-mensaje.png" class="img-fluid" alt="Responsive image" style = "height: 300px; width: 400px; ">
					<div class ="centrado"><h5><strong>¡HOLA AMIGUITO MENSAJERO! <br>Aqui podras contarnos tus aventuras y leer las aventuras de otros mensajeros</strong></h5></div>
				</div>
			</div>
			<div class="iconos">	
            	<div>
					<p class="cartasParrafo"><strong>CUENTANOS TUS AVENTURAS</strong> </p>
					<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>carta.php?id=chico" role="button" id = "iconos">
              			<img class="imgCarta" src="images/ICONO_ENVIAR_CARTA.png" class="img-fluid" alt="Responsive image">
           			</a>
            	</div>
            	<div>
					<p class="cartasParrafo"><strong>LEE LAS CARTTITAS DE OTROS NIÑOS</strong></p>
            		<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>respuestas.php" role="button" id = "iconos">
						<!---->
              			<img class="imgCarta" src="images/icono_leer_carta.png" class="img-fluid" alt="Responsive image">
           			</a>
				</div>
				<div>
					<p class="cartasParrafo"><strong>BOLETINES</strong></p>
            		<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>boletin.php" role="button" id = "iconos">
						<!---->
              			<img class="imgCarta" src="images/boletin.jpg" class="img-fluid" alt="Responsive image">
           			</a>
				</div>
				
        	</div>
	</div> 

