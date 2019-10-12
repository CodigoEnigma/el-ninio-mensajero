<?php
	require('config/config.php');
	require('config/db.php');
	
?>
<?php include('inc/header.php'); ?>

    <div class="container">
      <a href="<?=$_SERVER['HTTP_REFERER'] ?>" role = "button" style="float:left; margin:10px;">
         <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
      </a> <br> 
      <h1>Inicio de sesión de usuario</h1>
      <div class="cabecera">
        	<h2>Iniciar sesión</h2>
      </div>

        <form class="login">
            <div class="input-group">
            <label>Usuario</label>
            <input type="text" name="usuario" placeholder="Ingrese usuario">
            <small id="emailHelp" class="form-text text-muted">No se compartira su información.</small>
            </div>
            <div class="input-group">
            <label>Contraseña</label>
            <input type="text" name="password" placeholder="Contraseña">
            <small id="emailHelp" class="form-text text-muted">No comparta su contraseña.</small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
            
        </form>
        
    </div> 