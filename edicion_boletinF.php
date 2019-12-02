
<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
	
?>
<?php include('inc/header.php'); ?>


<br>
<h1 align="center"><Strong>Edicion De Boletin</Strong></h1>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="form-group" align="center">
				<textarea name="TEXTO_CARTA" class="form-control" style = 'width:750px; height:350px;'></textarea><br>
			
				<input type="submit" name="submit" id="enviar" value="Cancelar" class="btn">
			
				<input type="submit" name="submit" id="enviar" value="Confirmar" class="btn">
            </div>	
        </form>		