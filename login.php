<?php
	require('config/config.php');
    require('config/db.php');
    
    if(isset($_POST['submit'])){
        $ci = $_POST['ci'];
        $pass = $_POST['pass'];

        if (!empty($ci)) {
            if (filter_var($ci, FILTER_VALIDATE_INT)) {
                if (strlen($ci) > 10) {
                    $errorCi = "La cédula de identidad es demasiado larga.";
                }
        
                if (strlen($ci) < 5) {
                    $errorCi = "La cédula de identidad es demasiado corta.";
                }
            } else {
                $errorCi = "Verifique que la cédula de identidad contenga solamente números.";
            }
        }

        if (!empty($pass)) {
            if (!filter_var($pass, FILTER_VALIDATE_EMAIL)) {
                if(!filter_var($pass, FILTER_VALIDATE_URL)){
                    if(strlen($pass) > 15){
                        $errorPass = "La contraseña es demasiado larga.";
                    }
                    if(strlen($pass) < 8){
                        $errorPass = "La contraseña es demasiado corta.";
                    }
                } else {
                    $errorPass = "Valor invalido.";
                }
            } else {
                $errorPass = "Valor invalido.";
            } 
        }

        if (empty($errorCi) && empty($errorPass)) {
            $queryAdmin = sprintf("SELECT CONTRASENIA_ADMIN FROM administrador WHERE ID_ADMINISTRADOR ='%S'", mysqli_real_escape_string($conn, $ci));
            $resultAdmin = mysqli_query($conn, $queryAdmin);
            if($resultAdmin == false){
                $queryUsr = sprintf("SELECT CONTRASENIA_USUARIO FROM usuario WHERE ID_USUARIO ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultUsr = mysqli_query($conn, $queryUsr);
                $clave = implode(mysqli_fetch_all($resultUsr, MYSQLI_ASSOC));
                $queryNomUsr = sprintf("SELECT NOMBRE_USUARIO FROM usuario WHERE ID_USUARIO ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultNomUsr = mysqli_query($conn, $queryNomUsr);
                $nombre = mysqli_fetch_all($resultNomUsr, MYSQLI_ASSOC);
            } else {
                $clave = implode(mysqli_fetch_all($resultAdmin, MYSQLI_ASSOC));
                $queryNomAdmin = sprintf("SELECT NOMBRE_ADMINISTRADOR FROM administrador WHERE ID_ADMINISTRADOR ='%S'", mysqli_real_escape_string($conn, $ci));
                $resultNomAdmin = mysqli_query($conn, $queryNomAdmin);
                $nombre = mysqli_fetch_all($resultNomAdmin, MYSQLI_ASSOC);
            }
            if(password_verify($pass, $clave)) {
                /*session_start();
 
		        $_SESSION['ci'] = htmlentities($_POST['ci']);
                $_SESSION['nombre'] = htmlentities($nombre);*/
                
                header("location:$ROOT_URL");
            } else {
                $error = "Contraseña incorrecta. Intente de nuevo.";
            }
	        mysqli_close($conn);
        }

    }
?>
<?php include('inc/header.php'); ?>

    <div class="container">
        <a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
            <img src="https://image.flaticon.com/icons/svg/137/137623.svg" class="img-fluid" alt="Responsive image" id="btn-back">
        </a> <br> 
        <h3>Página principal</h3>
        <div class="cabecera">
        	<h2>INICIAR SESION</h2>
        </div>
        <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="login">
            <div class="input-group">
                <label>Usuario</label>
                <input type="text" name="ci" placeholder="Cédula de identidad" value="<?php if(isset($ci)) echo $ci?>" required autofocus>
                <!--small id="emailHelp" class="form-text text-muted">No se compartira su información.</small-->
                <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorCi)) echo $errorCi ?></small>
            </div>
            <div class="input-group">
                <label>Contraseña</label>
                <input type="password" name="pass" placeholder="Contraseña" required>
                <!--small id="emailHelp" class="form-text text-muted">No comparta su contraseña.</small-->
                <small style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorPass)) echo $errorPass ?></small>
            </div>
            
            <button type="submit" class="btn btn-primary btn-block" name="submit">Enviar</button>
            <p style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) echo $error ?></p>
        </form>
    </div> 