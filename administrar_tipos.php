<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
	require('config/config.php');
	require('config/db.php');
	session_start();
    //$query = "SELECT * FROM especialidad";
	//$resultado = mysqli_query($conn , $query) ;
   // $tipos = mysqli_fetch_array($resultado, MYSQL_ASSOC);
    include('inc/header.php');?>
   
   <div class="contenedor" >
        <a href="<?php echo ROOT_URL; ?>Administrar.php" role = "button" style="float:left; margin:10px;">
            <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
        </a> 
    </div>
    <div style="float:right">
                <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>crearEspecialidad.php" role="button" id ="crearEspecialidad" style="margin:20px;">Crear Especialidad</a>
            </div>
	
	<br>
		<table border='1'; class='table table-dark'>
		    <tr class='warning'>
				<td>ID</td>
				<td>Especialidad</td>
				<td>Leer cartas</td>
				<td>Responder cartas</td>
				<td>Derivar cartas</td>
				<td>Postular cartas a boletin</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?php
            $query = "SELECT * FROM especialidad";
	        $resultado = mysqli_query($conn , $query) ;
           
            while($arreglo = mysqli_fetch_array($resultado, MYSQL_ASSOC)){
                echo "<tr class ='success' >" ;
                echo "<td >". $arreglo['ID_ESPECIALIDAD']. "</td>";
                echo "<td >". $arreglo['NOMBRE_ESPECIALIDAD']. "</td>" ;
                
                $leer = $arreglo['LEER'] ;
                if(!isset($leer) || $leer == 'no'){
                    echo "   <td align='center'><img class='imgCarta' src='images/no.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                }else {
                     echo "   <td align='center'><img class='imgCarta' src='images/leido.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                    
                }
                
                 $responder = $arreglo['RESPONDER'] ;
                 if(!isset($responder) || $responder == 'no'){
                      echo "   <td align='center'><img class='imgCarta' src='images/no.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }else{
                      echo "   <td align='center'><img class='imgCarta' src='images/leido.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }
                
                 $postular = $arreglo['POSTULAR'] ;
                 if(!isset($postular) || $postular == 'no'){
                     echo "   <td align='center'><img class='imgCarta' src='images/no.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }else{
                      echo "   <td align='center'><img class='imgCarta' src='images/leido.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }
                 
                 $derivar = $arreglo['DERIVAR'] ;
                 if(!isset($derivar) || $derivar == 'no'){
                     echo "   <td align='center'><img class='imgCarta' src='images/no.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }else{
                      echo "   <td align='center'><img class='imgCarta' src='images/leido.png' class='img-sluid' alt='Responsive image' style ='width:50px; height:50px;'></td>" ;
                 }
                 
                
                echo "<td><a href='". ROOT_URL ."actualiza_datos_tipo_user.php?id=".$arreglo['ID_ESPECIALIDAD']."'><img class='imgCarta' src='images/ICONO_ACTUALIZAR.png' class='img-sluid' alt='Responsive image' style = 'width:50px; height:50px;'></td>";

				echo "<td><a href='". ROOT_URL ."administrar_tipos.php?id=".$arreglo['ID_ESPECIALIDAD']."&idborrar=2'><img class='imgCarta' src='images/ICONO_ELIMINAR.png' class='img-sluid' alt='Responsive image' style = 'width:50px; height:50px;'></td>";	
	
                echo "</tr>" ;
            }
            ?>
            </table>
		
		
		
</body>
</html>