<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
</head>
<body>
   <?php 
   
    include('inc/header.php'); 
     require('config/config.php');
  require('config/db.php');


     ?>
	<div class="container">
		<a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
        </a> 

        <br><br>
		<h1 align="center"><strong>Boletín</strong></h1>
		<br><br>

       <!--
         <form name="formulario">
  
        <textarea placeholder="Escribe aquí el texto..." name="texto"
            cols="80" rows="10">en este espacio va el texto de todas las cartas 
            pe......pd:no le doy a fa funcionalidad :'(</textarea>
        </form>
      -->
        <head>
	
<body align="center">
	<div class="estilo_boletin"style = 'width:750px; height:350px;'align="center">
		<div class="card">
  <div class="card-body">
    <?php  
    $Laid = $_GET['carta'];
     $query = "SELECT * FROM boletin WHERE ID_BOLETIN = '$Laid'";
     $resultado = $conn->query($query);

      if ($resultado->num_rows > 0) {
          while ($row = $resultado -> fetch_assoc()) {
            echo $row["TEXTO_BOLETIN"];
                        # code...
          }

      }

    ?>
  </div>
</div>
  </div>
  <br>

</body>

  <!--PAGINACION LA VARIABLE NUMERO DE CARTAS DEBERIA DE OBTENERSE DE TODAS LAS CARTAS QUE TENGAMOS DIVIDIDA ENTRE LA 
  CANTIDAD DE CARTAS QUE QUISIERAMOS QUE SE MUESTRE EN CADA "PAGINA"  -->
  <div>
  <section class="pagination">
    <li class="page-item
    <?php echo $_GET['carta']<= 1 ? 'disabled':''?>
    "><a class="page-link" 
	href="boletin.php?carta= <?php echo $_GET['carta']-1 ?>">Anterior</a></li>
	   <!--CARTAS ES EL NUMERO TOTAL DE CARTAS QUE EXISTAN PARA EL BOLETIN-->
	<?php
   $numero_cartas = 7 ; 
	 for($i = 0; $i < $numero_cartas; $i++): ?>
    <li class="page-item <?php echo $_GET['carta']==$i+1 ? 'active' : '' ?>">
    <a class="page-link" href="boletin.php?carta=<?php echo $i+1 ?>">
	<?php echo $i+1 ?></a></li>
	<?php endfor?>

	<li class="page-item 
          <?php echo $_GET['carta']>= $numero_cartas? 'disabled':''?>
      "><a class="page-link" 
	    href="boletin.php?carta= <?php echo $_GET['carta']+1 ?>">Siguiente</a></li>
      </div>
  </ul>
</nav>
   </div>
</body>
</html>