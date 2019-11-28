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
    ?>
    
    <div class="contenedor" >
        <a href="<?php echo ROOT_URL; ?>lectura_carta.php?id=<?php echo $id; ?>" role = "button" style="float:left; margin:10px;">
            <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
        </a> 
    </div>
    
</body>
</html>