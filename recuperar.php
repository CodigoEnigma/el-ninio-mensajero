<?php
	require('config/config.php');
    require('config/db.php');
    
  ?>
<?php include('inc/header.php'); ?>

    <div class="container">
           <a href="<?php echo ROOT_URL; ?>login.php" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
		  </a> 
        <br> 
    
        <div class="cabeceraSesion">
        	<h2>RECUPERAR CONTRASEÑA</h2>
        </div>
        
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="login">
            <div class="input-group">
                <label>Ingrese su correo:</label>
                <input type="email" name="email" value="">
            </div>
            <div class="input-group">
                <label>Ingrese su CI:</label>
                <input type="text" name="ci" placeholder="Cédula de identidad" value="">

            </div>
            
            <button type="submit" class="btn btn-primary btn-block" name="recuperar_datos">ENVIAR</button>
            <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) echo $error ?></p>
        </form>
        
        <?php
        
            
    
        ?>
        
    </div> 