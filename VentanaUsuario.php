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
    if(!isset($_COOKIE)){
		header('Location: '.ROOT_URL.'');
	}else{
        $nombre = $_COOKIE['nombreUsuario'];
        $id = $_COOKIE['id_usuario'];
        $rol = $_COOKIE['roll'];
    } 
?>

	<?php include('inc/header.php');

		echo "<h1>Bienvenido: ". $nombre . " </h1>";
		
		//echo '<h2 style="text-align:right">Alertas:</h2>';
		echo '<h2 style="text-align:center"><strong>CARTAS ASIGNADAS</strong></h2>'; 
    	require('config/db.php');
		$sql=("SELECT * FROM carta_recivida WHERE ID_USUARIO='$id'");
		$query=mysqli_query($conn,$sql);
        
          
		echo '<table border="1"; class="table table-dark" style="margin-left: auto;margin-right: auto;max-width:70%">';
			echo "<tr class='warning'>"; 
				echo "<td>Fecha de recepcion</td>";
				echo "<td>Leer carta</td>";
				echo "<td>Carta Leida</td>";
                echo "<td>Carta Respondida</td>";
                 echo "<td>Postulada a Boletin</td>";
			
			echo "</tr>";

		while($arreglo = mysqli_fetch_array($query, MYSQL_ASSOC)){	
            
			echo "<tr class='medio'>";
                echo "<td>". $arreglo['FECHA_RECEPCION']."</td>";
                
                echo "<div style='float:center'>
                    <td><a href=leer_carta.php?id=". $arreglo['ID_CARTA_RECIVIDA']. "><img class='imgCarta' src='images/leer.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>
                    </div>";
                $leida = $arreglo['LEIDA'] ;
                if($leida == "si"){
                    echo "<div style='float:center'>
                    <td><img class='imgCarta' src='images/leido.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>
                    </div>";
                }
                $resp = $arreglo['RESPUESTA'] ;
                if(isset($resp)){
                    echo "<div style='float:center'>
                    <td><img class='imgCarta' src='images/respuesta.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>
                    </div>";
                }
            
                $fav = $arreglo['POSTULACION_BOLETIN'] ;
                if($fav == "si"){
                    echo "<div style='float:center'>
                    <td><img class='imgCarta' src='images/favoritos.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>
                    </div>";
                }
                
				
				//echo "<td><a href='carta.php?id=$arreglo[0]'>$arreglo[2]</a></td>";
				//echo "<td>$arreglo[8]</td>";
				//echo "<td>$arreglo[5]</td>";
				//echo "<td>$arreglo[]</td>";
				//echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";

				//echo "<td ><a href='Administrar.php?id=$arreglo[0]&idborrar=2 ' ><img src='images/eliminar.png' class='img-rounded'/></a></td>";	
	           echo "</tr>";

		}
        mysqli_close($conn);

		echo "</table>";

		extract($_GET);


?>



    <?php 
    if(@$idborrar==2){
    				echo'
<script>
    				$("#myModal").modal("show");
    				</script>';
    			}

    ?>
    
</body>
</html>