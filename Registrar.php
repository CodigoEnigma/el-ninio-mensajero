<?php
	require('config/config.php');
  require('config/db.php');
  /*session_start();

  $ci = isset($_SESSION['ci']) ? $_SESSION['ci'] : 'Cliente';
  $nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No Registrado';*/

  $queryEspec = 'SELECT * FROM especialidad';
  $resultEspec = mysqli_query($conn,$queryEspec);
  $especs = mysqli_fetch_all($resultEspec, MYSQLI_ASSOC);

  if (isset($_POST['registrar'])) {
    $nombreR = $_POST['nombre'];
    $ApellidoR = $_POST['apellido'];
    $tipoR = $_POST['tipo'];
    $emailR = $_POST['email'];
    $passR1 = $_POST['password_1'];
    $passR2 = $_POST['password_2'];

    
  }

?>

<?php include('inc/header.php'); ?>
  <a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
    <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
  </a><br> 
  <h3>Página principal</h3>
  <div class="cabecera">
    <h1>REGISTRAR USUARIO</h1>
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
        <?php foreach($especs as $espec) : ?>
          <option value="<?php echo $espec['NOMBRE_ESPECIALIDAD']; ?>"><?php echo $espec['NOMBRE_ESPECIALIDAD']; ?></option>
        <?php endforeach;?>
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
      ¿Ya está registrado?. Inicie sesion<a href="<?php echo ROOT_URL; ?>login.php">AQUI</a>
    </p>
  </form>