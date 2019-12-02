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
        echo "<br>";

		echo "<h1><strong>Bienvenido: ". $nombre . "</strong> </h1>";
		echo '<h2 style="text-align:center"><strong>CARTAS ASIGNADAS</strong></h2>'; 
    	require('config/db.php');
		$sql=("SELECT * FROM carta_recivida WHERE ID_USUARIO='$id'");
		$query=mysqli_query($conn,$sql);
        $permisos = "SELECT * FROM especialidad WHERE ID_ESPECIALIDAD='$rol'" ;
        $obten_permisos = mysqli_query($conn, $permisos);
        $permisos_obtenidos = mysqli_fetch_array($obten_permisos, MYSQL_ASSOC);
        $leer = $permisos_obtenidos['LEER'];
        $responder = $permisos_obtenidos['RESPONDER'];
        $postular = $permisos_obtenidos['POSTULAR'];
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
</head>
    <body>

        <table border="1"; class="table table-dark" style="margin-left: auto;margin-right: auto;max-width:70%">
			<tr class='warning'>
				<td>Texto de la carta</td>
                <td>Fecha de envio de carta</td>
				<td>Leidos</td>
                <td>Favoritos</td>
             </tr>
    </body>
</html>