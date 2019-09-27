<?php
    require('config/config.php');
    require('config/db.php');
    
    if(isset($_GET['ID_CARTA_RECIVIDA'])) {
        $id = $_GET['ID_CARTA_RECIVIDA'];
        $stat = $conn->prepare("selecct * from carta_recivida where id=?");
        $stat->bindParam(1, $id);
        $stat->execute();
        $data = $stat->fetch();

        $file = 'media/'.$data['ID_CARTA_RECIVIDA'];
        
        if(file_exists($file)){
            readfile($file);
            exit;
        }

    }