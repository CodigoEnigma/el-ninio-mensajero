<?php
	require('config/config.php');
	require('config/db.php');
	/*session_start();

	$ci = isset($_SESSION['ci']) ? $_SESSION['ci'] : 'Cliente';
	$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No Registrado';*/
?>

<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="text-center">
        	<h1>BIENVENIDO NIÑO MENSAJERO</h1>
        	<h4>Aca podras escribir tus experiencias, historias, curiosidades o lo que prefieras compartir a tu cartero.</h4>
			<div class="iconos">
            	<div>
            		<a class="btn btn-primary btn-lg" href="<?php echo ROOT_URL; ?>carta.php" role="button" id = "iconos">
						Escribe tu cartita
              			<img src="https://image.flaticon.com/icons/svg/138/138801.svg" class="img-fluid" alt="Responsive image">
           			</a>
            	</div>
            	<div>
            		<a class="btn btn-primary btn-lg" href="<?php echo ROOT_URL; ?>respuestas.php" role="button" id = "iconos">
						Cartas respondidas
              			<img src="https://image.flaticon.com/icons/svg/138/138701.svg" class="img-fluid" alt="Responsive image">
           			</a>
            	</div>
        	</div>
        
        	<div class="boletin">
		    	<img src="https://i.pinimg.com/564x/50/57/35/5057358a687cf88a6d7c0b01aa753144.jpg" class="img-fluid" alt="Responsive image" id = "cartaBoletin">
         	</div>
		</div>
	</div> 