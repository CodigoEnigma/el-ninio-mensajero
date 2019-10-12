<?php
	require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $nick = $_POST['nick'];
        $pass = $_POST['pass'];

        if (!empty($nick)) {
            if (!filter_var($nick, FILTER_VALIDATE_EMAIL)) {
                if (strlen($nick) > 15) {
                    $errorNick = "El nombre de usuario es demasiado largo.";
                }
        
                if (strlen($nick) < 6) {
                    $errorNick = "El nombre de usuario es demasiado corto.";
                }
            } else {
                $errorNick = "El nombre de usuario no puede ser una direccion de correo.";
            }
        }

        if (!empty($pass)) {
            if (!filter_var($nick, FILTER_VALIDATE_EMAIL)) {
                if(strlen($pass) > 15){
                    $errorPass = "La contraseña es demasiado larga.";
                }
        
                if(strlen($pass) < 6){
                    $errorPass = "La contraseña es demasiado corta.";
                }
            } else {
                $errorPass = "La contraseña no puede ser una direccion de correo.";
            }
        }

        if (empty($errorNick) && empty($errorPass)) {
            $query = sprintf("SELECT CONTRASENIA_ADMIN FROM administrador WHERE NOMBRE_USUARIO_ADMIN ='%S'", mysqli_real_escape_string($conn, $nick));
            $result = mysqli_query($conn, $query);
            $clave = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if(password_verify($pass, $clave)) {
                header("location:$ROOT_URL");
            } else {
                $error = "Contraseña incorrecta. Intente de nuevo.";
            }
            mysqli_free_result($result);
	        mysqli_close($conn);
        }

    }
?>
<?php include('inc/header.php'); ?>

    <div class="container">
      <a href="<?=$_SERVER['HTTP_REFERER'] ?>" role = "button" style="float:left; margin:10px;">
         <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
      </a> <br> 
      <h1>Inicio de sesión de usuario</h1>
           
        <section class="container-fluid ">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-3">
                    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="formularioLogin">
                        <div class="form-group">
                            <label for="inpitName">Usuario</label>
                            <input type="text" id="inputName" name="nick" class="form-control" placeholder="Nombre de usuario" value="<?php if(isset($nick)) echo $nick?>" required autofocus>
                            <!--small id="emailHelp" class="form-text text-muted">No se compartira su información.</small-->
                            <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorNick)) echo $errorNick ?></p>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" value="<?php if(isset($pass)) echo $pass?>" required>
                            <!--small id="emailHelp" class="form-text text-muted">No comparta su contraseña.</small-->
                            <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorPass)) echo $errorPass ?></p>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block" name="submit">Enviar</button>
                        <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) echo $error ?></p>
                    </form>
                </section>
            </section>
        </section>   
    </div> 