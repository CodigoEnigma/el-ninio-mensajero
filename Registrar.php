<?php
	require('config/config.php');
  require('config/db.php');
  /*session_start();

  $ci = isset($_SESSION['ci']) ? $_SESSION['ci'] : 'Cliente';
  $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No Registrado';*/

  if (isset($_POST['submit'])) {
    
  }

?>

<?php include('inc/header.php'); ?>
  <div class="cabecera">
    <h1>REGISTRAR</h1>
  </div>
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
    <div class="input-group">
      <label>Nombre</label>
      <input type="text" name="nombre" value="" required autofocus>
    </div>
    <div class="input-group">
      <label>Apellido</label>
      <input type="text" name="apellido" value="" required>
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
      <input type="email" name="email" value="" required>
    </div>
    <div class="input-group">
      <label>Contraseña</label>
      <input type="contraseña" name="password_1" required>
    </div>
    <div class="input-group">
      <label>Confirmar Contraseña</label>
      <input type="confirmar" name="password_2" required>
    </div>
    <div class="input-group">
      <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
    </div>
    <p>
      ¿Ya está registrado?<a href="<?php echo ROOT_URL; ?>login.php">Iniciar sesion</a>
    </p>
  </form>