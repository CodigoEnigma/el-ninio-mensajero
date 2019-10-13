<?php
	require('config/config.php');
	require('config/db.php');
?>

<?php include('inc/header.php'); ?>
  <div class="cabecera">
    <h1>REGISTRAR</h1>
  </div>
  <form>
    <div class="input-group">
      <label>Nombre</label>
      <input type="text" name="nombre" value="">
    </div>
    <div class="input-group">
      <label>Apellido</label>
      <input type="text" name="apellido" value="">
    </div>
    <div class="input-group">
      <label>Tipo de ususario</label>
    </div>
    <div class="input-group">
      <select name="tipo" required>
        <option value="">Elige una opción</option>    
        <option value="psicologo">PSICOLOGO</option>
        <option value="policia">POLICIA</option>
        <option value="defensoria">DEFENSORIA</option>
        <option value="escritor">ESCRITOR</option>
      </select> 
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="">
    </div>
    <div class="input-group">
      <label>Contraseña</label>
      <input type="contraseña" name="password_1">
    </div>
    <div class="input-group">
      <label>Confirmar Contraseña</label>
      <input type="confirmar" name="password_2">
    </div>
    <div class="input-group">
      <button type="submit" class="btn btn-primary" name="registrar">Register</button>
    </div>
    <p>
      ¿Ya está registrado?<a href="<?php echo ROOT_URL; ?>login.php">Iniciar sesion</a>
    </p>
  </form>