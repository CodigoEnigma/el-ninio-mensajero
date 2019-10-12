<?php
	require('config/config.php');
    require('config/db.php');

    if(isset($_POST['submit'])){
        $nick = mysqli_real_escape_string($conn, $_POST['nick']);
        $pass = mysqli_real_escape_string($conn, $_POST['pass']);

        if (!empty($nick)) {
            if (!filter_var($nick, FILTER_VALIDATE_EMAIL)) {
                if (strlen($nick) > 15) {
                    $errorNick = "El nombre de usuario es demasiado largo.";
                }
        
                if (strlen($nick) < 6) {
                    $errorNick = "El nombre de usuario es demasiado corto.";
                }
            } else {
                $errorNick = "El nombre de usuario no puede ser una direccion de correos.";
            }
        }

        if (!empty($pass)) {
            if(strlen($pass) > 15){
                $errorPass = "La contraseña es demasiado larga.";
            }
    
            if(strlen($pass) < 6){
                $errorPass = "La contraseña es demasiado corta.";
            }
        }

        if (empty($errorNick) && empty($errorPass)) {
            $query = "SELECT * FROM administrador WHERE NOMBRE_USUARIO_ADMIN='".$nick."'AND CONTRASENIA_USUARIO='".$pass."'";
            $result = mysqli_query($conn, $query);
            $usuario = mysqli_fetch_all($result, MYSQLI_ASSOC);
            if($count==1) {
                header("location:$ROOT_URL");
            } else {
                $error = "No se pudo iniciar sesion.";
            }
            mysqli_free_result($result);
	        mysqli_close($conn);
        }

    }
?>

<?php include('inc/header.php'); ?>
    <div class="text-center">
        <div class="container d-flex justify-content-center">
            <div class="col-4">
                <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" class="form-signin">
                    <h1 class="h3 mb-3 font-weight-normal">Inicie su sesion</h1>
                    <label for="inputName" class="sr-only">Nombre de usuario</label>
                    <input type="text" id="inputName" name="nick" class="form-control" placeholder="Nombre de usuario" value="<?php if(isset($nick)) echo $nick?>" required autofocus>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorNick)) echo $errorNick ?></div>
                    <label for="inputPassword" class="sr-only">Contraseña</label>
                    <input type="password" id="inputPassword" name="pass" class="form-control" placeholder="Contraseña" value="<?php if(isset($pass)) echo $pass?>" required>
                    <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($errorPass)) echo $errorPass ?></div>
                    <br>
                    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Acceder</button>
                </form>
                <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php if(isset($error)) echo $error ?></div>
            </div>
        </div>
    </div>