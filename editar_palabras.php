<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
</head>
<body>
    <?php 
        require('config/config.php');
    session_start();
include('inc/header.php'); 
 extract($_GET);
$query = "SELECT * FROM especialidad WHERE ID_ESPECIALIDAD='$id'" ;
require('config/db.php');
$cons = mysqli_query($conn, $query);
$valores = mysqli_fetch_array($cons, MYSQL_ASSOC);
$nombre_especialidad = $valores['NOMBRE_ESPECIALIDAD'];
$leer = $valores['LEER'];
$responder  = $valores['RESPONDER'];
$derivar = $valores['DERIVAR'];
$postular =  $valores['POSTULAR'];
$nombre = $valores['NOMBRE_ESPECIALIDAD'] ;
mysqli_close($conn);
?>  

<div class="container"> 
   
    <a href="<?php echo ROOT_URL; ?>actualiza_datos_tipo_user.php?id=<?php echo $id; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
            </a> 
   <br><br><br>
    <h1 align="center"><Strong>¡Cuentanos cómo estas!</Strong></h1>
   <div style="float:center">
       <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
			<div class="form-group" align="center">
				<textarea name="TEXTO_CARTA" class="form-control" style = 'width:750px; height:350px;' >HOLA COMO ESTAS \n MUY BIEN Y TU</textarea><br>
				<input type="submit" name="submit" id="enviar" value="Guardar" class="btn">
            </div>	
        </form>		
   </div>   </div>

</body>
</html>