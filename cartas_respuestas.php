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
    <br>
    <br>
    <h1 style ="margin-right: 90px; " align="center"><strong>Cartas respondidas</strong></h1>
    <div class="imagenCarta" >
				
                    <?php
                        $consulta='SELECT * FROM carta_recivida where RESPUESTA IS NOT NULL ';
                        $carta = mysqli_query($conn,$consulta);
                         while($arreglo = mysqli_fetch_array($carta, MYSQL_ASSOC)){
                             echo '<img src="data:image/png;base64,'.base64_encode($arreglo['IMAGEN_AVATAR']).'" height="100" width="100" align="left">' ;
                         }
                ?>			
			   				
		</div>

        

        <div class="burbuja">
            <h5><strong>Enviado</strong></h5>
            <?php
            $consulta='SELECT * FROM carta_recivida where RESPUESTA IS NOT NULL ';
            $carta = mysqli_query($conn,$consulta);
            $res=mysqli_fetch_array($carta,MYSQL_ASSOC);
            echo "<br>".$res['TEXTO_CARTA'];
            echo "<br><br>".$res['RESPUESTA'];
            $imagen = $res['IMAGEN'];
                                    if(!is_null($imagen)){
                                        echo "<div align='center'>" ;
                                        echo "<h5><strong>Imagen adjuntada a la carta</strong></h5>" ;
                                        echo "<img src='data:image/jpeg;base64,". base64_encode($imagen)."' height='125' width='125'>" ;
                                        echo "</div>" ;
                                    }
            
            ?>

        </div>
        
            
     		
        <div class="burbujaRespuesta">
            <h5><strong>Respuesta</strong></h5>
            <h1><strong>HOLA COMO ESTAS</strong></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus per
            spiciatis quis voluptas recusandae.
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            </p>
        </div>
						
</body>
</html>