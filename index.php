<?php
	require('config/config.php');
	require('config/db.php');

	session_start();

?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="text-center">
			<div class="contenedorBienvenida">
				<div class="bienvenida">
					<img src="images/icono-bienvenida.png" style="height: 300px; width: 300px;">
				</div>
				<div class="burbuja">
					<img src="images/burbuja-mensaje.png" class="img-fluid" alt="Responsive image" style = "height: 300px; width: 400px; ">
					<div class="texto-encima"></div>
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
		    		<img src="https://i.pinimg.com/564x/50/57/35/5057358a687cf88a6d7c0b01aa753144.jpg" class="btn btn-info btn-lg" alt="Responsive image"  id="iconos">
         		</div>
        	</div>
        
    <!--  	-->
		</div>
	</div> 