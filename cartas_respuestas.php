<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
    <style>
        body{
            background-color: #f0f0f0;
        }
        .comentarios{
            width: 400px;
        }
        .comentarios .comentario{
            width: 100%;
            margin: 20px;
        }
        .comentarios .comentario p{
            margin: 0 0 10px 0;
        }
        .burbuja{
            position: relative;
            background: #fff;
            padding: 20px;
            color: #222;
            border-radius: 3px;
            margin-left: 20px;
        }
        .burbuja:after{
            content: "";
            display: block;
            position: absolute;
            
            top: 15px;
            margin-left: -35px;
                
            
            width: 0;
            height: 0;
            border-top: 8px solid transparent ;
            border-bottom: 8px solid transparent ;
            border-right: 15px solid #fff;
        }
    </style>
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
    $imagen = $res['IMAGEN'];
                            if(!is_null($imagen)){
                                echo "<div align='center'>" ;
                                echo "<h5><strong>Imagen adjuntada a la carta</strong></h5>" ;
                                echo "<img src='data:image/jpeg;base64,". base64_encode($imagen)."' height='125' width='125'>" ;
                                echo "</div>" ;
                            }
    
    ?>
    <div class="imagenCarta" style="float:left">
							
			    <img src="data:image/png;base64,<?php echo base64_encode($res['IMAGEN_AVATAR']) ?>" height="100" width="100">				
		        </div>
		
     		
    <div class="comentarios" >
        <div class="comentario burbuja" >
            <h1><strong>HOLA COMO ESTAS</strong></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus per
            spiciatis quis voluptas recusandae.
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            orem ipsum dolor sit amet, consectetur adipisicing elit. Sit quod dolore fugit, cum autem veniam. Alias quidem dolorum sunt, iste reiciendis. Libero, doloremque dolore harum minus perspiciati
            </p>
        </div>
    </div>
</body>
</html>