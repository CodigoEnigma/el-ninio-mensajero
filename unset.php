<?php
    require('config/config.php');
    session_start();
    setcookie('nombreUsuarii', $_SESSION['nombre'], time() - 3600);
    session_destroy(); 
    header('Location: '.ROOT_URL.'');
?>