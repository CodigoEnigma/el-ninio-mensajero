<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>El niño mensajero</title>
</head>
<body>
    <?php
	require('config/config.php');
    require('config/db.php');
    session_start();
    if(!isset($_COOKIE)){
		header('Location: '.ROOT_URL.'');
	} else {
		if($_COOKIE['roll'] != 'administrador'){
			header('Location: '.ROOT_URL.'');
		}
	}
	
?>
<?php include('inc/header.php'); ?>
        <div class="container">
                <a href="<?php echo ROOT_URL; ?>Administrar.php" role = "button" style="float:left; margin:10px;">
                    <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
                </a> <br> 
                
                <div class="cabeceraSesion">
                    <h2>CREAR ESPECIALIDAD</h2>
                </div>
                <form class="login">
                    <div class="input-group">
                        <label>Especialidad *</label>
                        <input type="text" name="especialidad" placeholder="Indroduzca nueva especialidad">
                        
                    </div>
                    <label><strong>*Permisos:</strong> Puede selecionar uno o mas permisos</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="leerCartas" value="option1">
                            <label class="form-check-label">
                                Leer cartas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="responderCartas" value="option2">
                            <label class="form-check-label" >
                                Responder cartas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="derivarCartas" value="option3">
                            <label class="form-check-label" >
                                Derivar cartas
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="postularCartas" value="option4">
                            <label class="form-check-label" >
                                Postular cartas para boletin
                            </label>
                        </div>
                        <div class="input-group">
                            <label>*Agrega un archivo .txt con las palabras clave</label>
                            <input type="file" name="texto" id="texto" class="btn btn-info" style="height: 40px;"> 
                        </div>
                    
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Crear especialidad</button>
                    <br>
                    <label>Los campos marcados con <strong>*</strong> son campos obligatorios</label>
                </form>
        </div> 
</body>
</html>