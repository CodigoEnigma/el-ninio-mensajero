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
   </div>
</body>
</html>