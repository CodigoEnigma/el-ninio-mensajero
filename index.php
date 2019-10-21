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
					<div class ="centrado"><h5>HOLA AMIGUITO MENSAJERO AQUÍ PODRAS CONTARNOS TUS AVENTURAS Y LEER LAS AVENTURAS DE OTROS MESAJEROS</h5></div>
				</div>
			</div>
			<div class="iconos">	
            	<div>
					<p class="cartasParrafo"> CUENTANOS TUS AVENTURAS</p>
					<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>carta.php" role="button" id = "iconos">
              			<img class="imgCarta" src="images/ICONO_ENVIAR_CARTA.png" class="img-fluid" alt="Responsive image">
           			</a>
            	</div>
            	<div>
					<p class="cartasParrafo">LEE LAS CARTTITAS DE OTROS NIÑOS</p>
            		<a class="btn btn-info btn-lg" href="<?php echo ROOT_URL; ?>respuestas.php" role="button" id = "iconos">
						<!---->
              			<img class="imgCarta" src="images/icono_leer_carta.png" class="img-fluid" alt="Responsive image">
           			</a>
				</div>
				<div class="boletin" >
					<p class="cartasParrafo">BOLETINES</p>
		    		<img src="images/boletin-icono.jpg" class="btn btn-info btn-lg" alt="Responsive image"  id="iconos">
         		</div>
        	</div>
        	
		  <!--	<h3><?php print_r($_SESSION) ;?></h3> -->
			
        	
    <!--  	-->
	</div> 