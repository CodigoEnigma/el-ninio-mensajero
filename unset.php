<?php
    require('config/config.php');
    session_start();
    session_destroy(); 
    header('Location: '.ROOT_URL.'');
?>

<!--<?php include('inc/header.php'); ?>
  <a href="<?php echo ROOT_URL; ?>Administrar.php" role = "button" style="float:left; margin:10px;">
    <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
  </a><br> 
  <h3>Volver</h3>
  <div class="cabecera">
    <h1>REGISTRAR TIPO DE USUARIO</h1>
  </div>
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="registrar">
    <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorR)) echo $errorR?></small>
    <div class="input-group">
      <label>nombre tipo de usuario</label>
      <input type="text" name="ci" value="<?php if(isset($ciR)) echo $ciR?>" required autofocus>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorCiR)) echo $errorCiR ?></small>
    </div>
    <div class="input-group">
      <label>descrpcion del tipo de usuario</label>
      <input type="text" name="ci" value="<?php if(isset($ciR)) echo $ciR?>" required autofocus>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorCiR)) echo $errorCiR ?></small>
    </div>
  
    <div class="input-group">
      <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
    </div>
  </form>
  <a class="btn btn-primary" href="<?php echo ROOT_URL; ?>Registrar.php" role="button" id = "registrar">Registrar usuario</a>
                    <button class="btn btn-primary" onclick="cerrarSesion()">Cerrar sesion</button>-->