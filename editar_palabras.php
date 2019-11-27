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

<div class="container"> 
   
    <a href="<?php echo ROOT_URL; ?>actualiza_datos_tipo_user.php?id=<?php echo $id; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
            </a> 
               <div class="cabeceraSesion">
                    <h2>AÑADIR O ELIMINAR PALABRAS CLAVE</h2>
                </div>
                <form class="login" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="input-group">
                        <label>Escribe la palabra clave</label>
                        <input type="text" name="palabra" placeholder="Escribe un palabra"> 
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="añadir">Añadir palabra</button>
                    <br>
                    <button type="submit" class="btn btn-primary btn-block" name="eliminar">Eliminar palabra</button>
                    <br>
                </form>
   </div>
   
   <?php 
    
    $query = "SELECT * FROM especialidad WHERE ID_ESPECIALIDAD='$id'" ;
    require('config/db.php');
    $cons = mysqli_query($conn, $query);
    $valores = mysqli_fetch_array($cons, MYSQL_ASSOC);
    $nombre_especialidad = $valores['NOMBRE_ESPECIALIDAD'];
    mysqli_close($conn);

    $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/xampp/el-ninio-mensajero/palabras/'.$nombre_especialidad.".txt";
    echo $carpeta_destino ;
    $archivo = fopen("$carpeta_destino","r") or die ("PROBLEMAS AL ABRIR EL ARCHIVO TXT") ;
        while(!feof($archivo)){
            $traer = fgets($archivo);
            $salto_de_linea = nl2br($traer);
            echo $salto_de_linea ;
        }
    if(isset($_POST['añadir'])){
        $texto = fopen("$carpeta_destino","a") or die ("problemas");
        fwrite($texto, "\n");
        fwrite($texto,$_POST['palabra']);
        
    }
    
    if(isset($_POST['eliminar'])){
        $archivo =  fopen("$carpeta_destino","a") or die ("problemas");
        $borrado = 0 ;
        
    }
    
    ?>


</body>
</html>