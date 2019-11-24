<?php
    require('config/config.php');
    session_start();
    setcookie('nombreUsuario', $_SESSION['nombre'], time() - 3600);
    setcookie('roll', $_SESSION['nombre'], time() - 3600);
    session_destroy(); 
    header('Location: '.ROOT_URL.'');
?>
