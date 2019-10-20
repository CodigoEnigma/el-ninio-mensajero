<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="text-center">
			<p></p>
        	<h1>Carta del niño</h1>
			<p></p>
			<br>

			<div class="iconos">
            	<div>
            		<br>
            		<br>
            		<br>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1">ARCHIVAR
           			</a>
            	</div>
            	<div>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1">DESCARTAR
           			</a>
            	</div>

            	<div>
            		<br><br><br><br>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1"
            		href="<?php echo ROOT_URL; ?>index.php">REGRESAR
           			</a>
            	</div>
        	</div>
        
		<div class="card" >
  		<img src="..." class="card-img-top" alt="...">
 		 <div class="card-body">
   		 <h5 class="card-title">CARTA</h5>

  		  <p class="card-text">Por este conducto, me permito manifestar que mi gremio de artesanos del estado de Hidalgo, quiere formar parte de esta asociación, teniendo la intención formal de ingresar a la asociación de artesanos de México S.C. y formar parte de esta asociación y así contribuir con nuestras aportaciones y recibir los beneficios que esta asociación nos obsequia.

			Esperamos recibir de esta gran asociación la capacitación para el comercio, la fabricación y la adquisición de materiales, que nos son necesarios para realizar las artesanías.

		Esperamos cumplir todos los requisitos que nos sean establecidos y formar parte de esta asociación en el mejor tiempo.

Yo  Francisco Terreros Zapata, como representante de los artesanos del estado de Hidalgo he sido seleccionado como representante legal y mandaré los documentos necesarios para entrar en la asociación y traer en un momento dado los propios productos.

Agradeciendo su atención le reiteramos nuestros respetos.</p>
   		 <a href="<?php echo ROOT_URL; ?>CartaRespuesta.php" class="btn btn-primary">responder</a>
		  </div>
		</div>
    	</div>
	</div>
</body>
</html>
<?php
	require('config/config.php');
	require('config/db.php');
	session_start();

	$ci = isset($_SESSION['ci']) ? $_SESSION['ci'] : 'Cliente';
	$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No Registrado';
?>

<!--<?php include('inc/header.php'); ?>
	<div class="container">
		<div class="text-center">
			<p></p>
        	<h1>Carta del niño</h1>
			<p></p>
			<br>

			<div class="iconos">
            	<div>
            		<br>
            		<br>
            		<br>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1">ARCHIVAR
           			</a>
            	</div>
            	<div>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1">DESCARTAR
           			</a>
            	</div>

            	<div>
            		<br><br><br><br>
            		<a class="btn btn-primary btn-lg"role="button" id = "iconos1"
            		href="<?php echo ROOT_URL; ?>index.php">REGRESAR
           			</a>
            	</div>
        	</div>
        
		<div class="card" >
  		<img src="..." class="card-img-top" alt="...">
 		 <div class="card-body">
   		 <h5 class="card-title">CARTA</h5>

  		  <p class="card-text">Por este conducto, me permito manifestar que mi gremio de artesanos del estado de Hidalgo, quiere formar parte de esta asociación, teniendo la intención formal de ingresar a la asociación de artesanos de México S.C. y formar parte de esta asociación y así contribuir con nuestras aportaciones y recibir los beneficios que esta asociación nos obsequia.

			Esperamos recibir de esta gran asociación la capacitación para el comercio, la fabricación y la adquisición de materiales, que nos son necesarios para realizar las artesanías.

		Esperamos cumplir todos los requisitos que nos sean establecidos y formar parte de esta asociación en el mejor tiempo.

Yo  Francisco Terreros Zapata, como representante de los artesanos del estado de Hidalgo he sido seleccionado como representante legal y mandaré los documentos necesarios para entrar en la asociación y traer en un momento dado los propios productos.

Agradeciendo su atención le reiteramos nuestros respetos.</p>
   		 <a href="<?php echo ROOT_URL; ?>CartaRespuesta.php" class="btn btn-primary">responder</a>
		  </div>
		</div>
    	</div>
	</div>-->
</body>
</html>
</body>
</html>