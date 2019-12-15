
<?php
    require('config/config.php');
    require('config/db.php');
	session_start();
	include('inc/header.php');
    date_default_timezone_set('America/La_Paz');
    $fecha = date("Y-m-d H:i:s");
     $nombre = $_COOKIE['nombreUsuario'];
    extract($_GET);
 
if(!$conn)
{
	die(mysqli_error());
}
 
if(isset($_POST['submit']))
{
	$textareaValue = trim($_POST['content']);
	 
	$sql = "INSERT INTO boletin (TEXTO_BOLETIN, AUTORES, FECHA_CREACION) VALUES ('$textareaValue','$nombre', '$fecha')";
	$rs = mysqli_query($conn, $sql);
	$affectedRows = mysqli_affected_rows($conn);
	
	if($affectedRows == 1)
	{
		 echo'<script type="text/javascript">
                                    alert("Boletin creado con éxito");
                                    window.location.href="'.ROOT_URL.'edicion_boletin.php";
                                    </script>';
	}
}
?>
            <a href="<?php echo ROOT_URL; ?>edicion_boletin.php" role = "button" style="float:left; margin:10px;">
                <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'> </a>
           
           
		  <br>

	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/editor.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/editor.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script type="text/javascript">
		$(document).ready(function(){
			$('#txt-content').Editor();
			$('#txt-content').Editor('setText', ['<p style="color:black;">Hola me llamo favio y esta es mi historia</p>']);
			$('#btn-enviar').click(function(e){
				e.preventDefault();
				//var texto = $('#txt-content').Editor('getText');
				//$('#texto').html(texto);
				//$('#txt-content').text($('#txt-content').Editor('getText'));
				//$('#frm-test').submit();				
			});
		});	
	</script>

<br>
<h1 align="center"><Strong>Edicion De Boletin</Strong></h1>
<body>
		<?php 
		if(isset($successMsg))
		{
			echo "<div class='success-msg'>";
			print_r($successMsg);
			echo "</div>";
		}
	?>
	<div class="container">


						<form  method="post">
 
						<label>Textarea:</label>
						<div>
						<textarea id="ckeditor" class = "ckeditor" name="content"> 
							<?php 
							  //$Laid = $_GET['id'];
							 if( $id != ""){
							 	
							     $query = "SELECT * FROM boletin WHERE ID_BOLETIN = '$id'";
   								 $resultado = $conn->query($query);
    									  if ($resultado->num_rows > 0) {
        								  while ($row = $resultado -> fetch_assoc()) {
        								  echo $row["TEXTO_BOLETIN"];
        		                # code...
                                
        							  }
        							}
                                 $borrar = mysqli_query($conn, "DELETE FROM `boletin` WHERE `boletin`.`ID_BOLETIN` = '$id'");
        						}
							 ?>

						</textarea>
					</div>
					<input type="submit" name="submit" value="Submit"></form>
					
				


	</div>

		<?php
		$sql=("SELECT * FROM carta_recivida WHERE POSTULACION_BOLETIN = 'si' ");
		$query=mysqli_query($conn,$sql);
		echo '<div class="cabecera">';
		echo "<table border='1'; class='table table-dark';>";
			echo "<tr class='warning'>";
				echo "<td>Cartas Para Boletin</td>";
				//echo "<td>Revizar</td>";
			echo "</tr>";
		echo '</div>';
		while($arreglo=mysqli_fetch_array($query)){
			echo "<tr class='success'>";
				echo "<td>$arreglo[2]</td>";
				//echo "<td><a href='edicion_boletinF.php'><img class='imgCarta' src='images/ICONO_ACTUALIZAR.png' class='img-sluid' alt='Responsive image' style = 'width:50px; height:50px;'></td>";
                
	
			//	echo "<td><a href='actualizar.php?id=$arreglo[0]'><img src='images/actualizar.gif' class='img-rounded'></td>";
			//	echo "<td ><a href='Administrar.php?id=$arreglo[0]&idborrar=2 ' ><img src='images/eliminar.png' class='img-rounded'/></a></td>";	
	
			echo "</tr>";
		}
		//echo </table>";
		
		
		extract($_GET);
	?>

</body>