<?php
	require('config/config.php');
  require('config/db.php');

  session_start();
  if(!isset($_COOKIE)){
    header('Location: '.ROOT_URL.'');
  } else {
    if($_COOKIE['roll'] == 'administrador'){
      $queryEspec = 'SELECT * FROM especialidad';
      $resultEspec = mysqli_query($conn,$queryEspec);
      $especs = mysqli_fetch_all($resultEspec, MYSQLI_ASSOC);

      if (isset($_POST['registrar'])) {
        $ciR = mysqli_real_escape_string($conn, $_POST['ci']);
        $ciAdmin = mysqli_real_escape_string($conn, $_SESSION['ci']);
        $tipoR = mysqli_real_escape_string($conn, $_POST['tipo']);
        $nombreR = mysqli_real_escape_string($conn, $_POST['nombre']);
        $apellidoR = mysqli_real_escape_string($conn, $_POST['apellido']);
        $emailR = mysqli_real_escape_string($conn, $_POST['email']);
        $passR1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $passR2 = mysqli_real_escape_string($conn, $_POST['password_2']);

        if(!empty($ciR) &&!empty($nombreR) && !empty($apellidoR) && !empty($tipoR) && !empty($emailR) && !empty($passR1) && !empty($passR2)){

          if (filter_var($ciR, FILTER_VALIDATE_INT)) {
            if(strlen($ciR) < 5){
              $errorCiR = "La cédula de identidad debe tener entre 5 y 10 numeros.";
            } else if (strlen($ciR) > 10) {
              $errorCiR = "La cédula de identidad debe tener entre 5 y 10 numeros.";
            }
          } else {
            $errorCiR = "Solo se permiten numeros.";
          }

          if (!filter_var($nombreR, FILTER_VALIDATE_EMAIL)) {
            if(!filter_var($nombreR, FILTER_VALIDATE_URL)){
              if(strlen($nombreR) < 1 && strlen($nombreR) > 15){
                $errorNombreR = "El nombre no puede tener mas de 15 caracteres.";
              }
            } else {
              $errorNombreR = "No se permite ese tipo de contenido.";
            }
          } else {
            $errorNombreR = "No se permite ese tipo de contenido.";
          }

          if (!filter_var($apellidoR, FILTER_VALIDATE_EMAIL)) {
            if(!filter_var($apellidoR, FILTER_VALIDATE_URL)){
              if(strlen($apellidoR) < 1 && strlen($apellidoR) > 15){
                $errorApellidoR = "El apellido no puede tener mas de 15 caracteres.";
              }
            } else {
              $errorApellidoR = "No se permite ese tipo de contenido.";
            }
          } else {
            $errorApellidoR = "No se permite ese tipo de contenido.";
          }

          if (!filter_var($passR1, FILTER_VALIDATE_EMAIL)) {
            if(!filter_var($passR1, FILTER_VALIDATE_URL)){
              if(strlen($passR1) < 8 || strlen($passR1) > 15){
                $errorPassR1 = "Introduzca un valor entre 8 y 15 caracteres.";
              }
            } else {
              $errorPassR1 = "No se permite ese tipo de contenido.";
            }
          } else {
            $errorPassR1 = "No se permite ese tipo de contenido.";
          }

          if ($passR2 != $passR1) {
            $errorPassR2 = "Las contraseñas no coinciden.";
          }

          if (empty($errorCiR) && empty($errorNombreR) && empty($errorApellidoR) && empty($errorPassR1) && empty($errorPassR2)) {

            $queryDupA = "SELECT * FROM administrador WHERE ID_ADMINISTRADOR='$ciR'";
            $duplicadoA = mysqli_query($conn,$queryDupA);
            //$duplicadoA = mysqli_fetch_array($resultDupA);
  
            $queryDupU = "SELECT * FROM usuario WHERE ID_USUARIO='$ciR'";
            $duplicadoU = mysqli_query($conn,$queryDupU);
            //$duplicadoU = mysqli_fetch_array($resultDupU);
  
            if (!mysqli_num_rows($duplicadoU) && !mysqli_num_rows($duplicadoA)) {
  
              $pass_cifrada=password_hash($passR1, PASSWORD_DEFAULT);
  
              $queryEspecNom = "SELECT NOMBRE_ESPECIALIDAD FROM especialidad WHERE ID_ESPECIALIDAD = '$tipoR'";
              $resultEspecNom = mysqli_query($conn,$queryEspecNom);
              $especNomArray = mysqli_fetch_row($resultEspecNom);
              $especNom = mysqli_real_escape_string($conn, $especNomArray[0]);
  
              if ($tipoR == "Admin") {
                $queryReg = "INSERT INTO administrador(ID_ADMINISTRADOR, NOMBRE_ADMINISTRADOR, APELLIDOS_ADMINISTRADOR, CORREO_ADMINISTRADOR, CONTRASENIA_ADMIN) VALUES('$ciR', '$nombreR', '$apellidoR', '$emailR', '$pass_cifrada')";
              } else {
                $queryReg = "INSERT INTO usuario(ID_USUARIO, ID_ADMINISTRADOR, ID_ESPECIALIDAD, NOMBRE_USUARIO, APELLIDOS_USUARIO, CORREO_USUARIO, CONTRASENIA_USUARIO, ESPECIALIDAD_USUARIO) VALUES('$ciR', '$ciAdmin', '$tipoR', '$nombreR', '$apellidoR', '$emailR', '$pass_cifrada', '$especNom')";
              }
  
              if (mysqli_query($conn,$queryReg)) {
                mysqli_close($conn);
  
                $toEmail = $emailR;
                $sujeto = 'Cuenta creada de  '.$nombreR;
                $mensaje = '<p>Le acaban de crear una cuenta de '.$tipoR.'</p>
                            <p>Ahora puede dirigirse al siguiente enlace: '.ROOT_URL.'</p> 
                            <p>En donde podra acceder con las siguientes credenciales que le fueron asignadas.</p>';
                $credenciales = 'Usuario: '.$ciR.' y contraseña: '.$passR1;
                $body = '<h2> Aviso de cuenta </h2>
                  <h4>Name</h4><p>'.$nombreR.'</p>
                  <h4>Email</h4><p>'.$email.'</p>
                  <h4>Message</h4><p>'.$mensaje.'</p>
                  <h4>Message</h4><p>'.$credenciales.'</p>
                ';
  
                $headers = "MIME-Version: 1.0" ."\r\n";
                $headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: Admin niño mensajero <admin@gmail.com>\r\n";
  
                mail($toEmail, $sujeto, $body, $headers);
  
                header('Location: '.ROOT_URL.'Administrar.php');
              } else {
                mysqli_close($conn);
                $errorR = "No se pudo realizar el registro. Intente de nuevo.";
              }
  
            } else {
              mysqli_close($conn);
              $errorR = "Este usuario ya esta registrado.";
            }
          }

        }

      }
    } else{
      header('Location: '.ROOT_URL.'');
    }
  }
?>

<?php include('inc/header.php'); ?>
  <a href="<?php echo ROOT_URL; ?>Administrar.php" role = "button" style="float:left; margin:10px;">
    <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
  </a><br> 
  <h3>Volver</h3>
  <div class="cabecera">
    <h1>REGISTRAR USUARIO</h1>
  </div>
  <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="registrar">
    <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorR)) echo $errorR?></small>
    <div class="input-group">
      <label>Cédula de identidad</label>
      <input type="text" name="ci" value="<?php if(isset($ciR)) echo $ciR?>" required autofocus>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorCiR)) echo $errorCiR ?></small>
    </div>
    <div class="input-group">
      <label>Nombre</label>
      <input type="text" name="nombre" value="<?php if(isset($nombreR)) echo $nombreR?>" required>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorNombreR)) echo $errorNombreR ?></small>
    </div>
    <div class="input-group">
      <label>Apellido</label>
      <input type="text" name="apellido" value="<?php if(isset($apellidoR)) echo $apellidoR?>" required>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorApellidoR)) echo $errorApellidoR ?></small>
    </div>
    <div class="input-group">
      <label>Tipo de ususario</label>
    </div>
    <div class="input-group">
      <select name="tipo" required>
        <option value="">Elige una opción</option>    
        <?php foreach($especs as $espec) : ?>
          <option value="<?php echo $espec['ID_ESPECIALIDAD']; ?>"><?php echo $espec['NOMBRE_ESPECIALIDAD']; ?></option>
        <?php endforeach;?>
      </select> 
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php if(isset($emailR)) echo $emailR?>" required>
    </div>
    <div class="input-group">
      <label>Contraseña</label>
      <input type="password" name="password_1" required>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorPassR1)) echo $errorPassR1?></small>
    </div>
    <div class="input-group">
      <label>Confirmar Contraseña</label>
      <input type="password" name="password_2" required>
      <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorPassR2)) echo $errorPassR2?></small>
    </div>
    <div class="input-group">
      <button type="submit" class="btn btn-primary" name="registrar">Registrar</button>
    </div>
    </form>
  </div>