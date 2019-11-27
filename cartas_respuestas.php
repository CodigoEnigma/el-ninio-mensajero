<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
</head>
<body>
   
    <?php include('inc/header.php');
        require('config/config.php');
    require('config/db.php');
    ?>
    
    
    <div class="container"></div>
    
    <a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
    </a> 
    
    <?php
     echo $_SERVER['DOCUMENT_ROOT'];
    
    $consulta='SELECT * FROM carta_recivida where RESPUESTA IS NOT NULL ';
    $carta = mysqli_query($conn,$consulta);
    $res=mysqli_fetch_array($carta,MYSQL_ASSOC);
    echo "<br>".$res['TEXTO_CARTA'];
    echo "<br><br>".$res['RESPUESTA'];
    
    ?>
</body>
</html>