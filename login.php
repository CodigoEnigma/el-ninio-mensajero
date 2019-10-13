<?php
	require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $ci = $_POST['ci'];
        $pass = $_POST['pass'];

        if (!empty($nick)) {
            if (!filter_var($ci, FILTER_VALIDATE_EMAIL)) {
                if (strlen($ci) > 15) {
                    $errorCi = "La cédula de identidad es demasiado larga.";
                }
        
                if (strlen($ci) < 5) {
                    $errorCi = "La cédula de identidad es demasiado corta.";
                }
            } else {
                $errorCi = "La cédula de identidad no puede ser una direccion de correo.";
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

        if (empty($errorCi) && empty($errorPass)) {
            $queryAdmin = sprintf("SELECT CONTRASENIA_ADMIN FROM administrador WHERE ID_ADMINISTRADOR ='%S'", mysqli_real_escape_string($conn, $ci));
            $resultAdmin = mysqli_query($conn, $query);
            if($resultAdmin == false){
                $queryUsr = sprintf("SELECT CONTRASENIA_USUARIO FROM usuario WHERE ID_USUARIO ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultUsr = mysqli_query($conn, $queryUsr);
                $clave = mysqli_fetch_all($resultUsr, MYSQLI_ASSOC);
                $queryNomUsr = sprintf("SELECT NOMBRE_USUARIO FROM usuario WHERE ID_USUARIO ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultNomUsr = mysqli_query($conn, $queryNomUsr);
                $nombre = mysqli_fetch_all($resultNomUsr, MYSQLI_ASSOC);
            } else {
                $clave = mysqli_fetch_all($resultAdmin, MYSQLI_ASSOC);
                $queryNomAdmin = sprintf("SELECT NOMBRE_ADMINISTRADOR FROM administrador WHERE ID_ADMINISTRADOR ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultNomAdmin = mysqli_query($conn, $queryNomAdmin);
                $nombre = mysqli_fetch_all($resultNomAdmin, MYSQLI_ASSOC);
            }

            if(password_verify($pass, $clave)) {
                session_start();

		        $_SESSION['ci'] = htmlentities($_POST['ci']);
                $_SESSION['nombre'] = htmlentities($nombre);
                
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
                            <label for="inpitCi">Usuario</label>
                            <input type="number" id="inputCi" name="ci" class="form-control" placeholder="Cédula de identidad" value="<?php if(isset($ci)) echo $ci?>" required autofocus>
                            <!--small id="emailHelp" class="form-text text-muted">No se compartira su información.</small-->
                            <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorCi)) echo $errorCi ?></p>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Contraseña</label>
                            <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Password" required>
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