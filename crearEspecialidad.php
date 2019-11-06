<?php
	require('config/config.php');
    require('config/db.php');
?>
<?php include('inc/header.php'); ?>
        <div class="container">
                <a href="<?php echo ROOT_URL; ?>" role = "button" style="float:left; margin:10px;">
                    <img src="images/btn-atras.svg" class="img-fluid" alt="Responsive image" id="btn-back">
                </a> <br> 
                <h3>Página principal</h3>
                <div class="cabeceraSesion">
                    <h2>CREAR ESPECIALIDAD</h2>
                </div>
                <form class="login">
                    <div class="input-group">
                        <label>Especialidad *</label>
                        <input type="text" name="especialidad" placeholder="Indroduzca nueva especialidad">
                        
                    </div>
                    <label>Permisos:</label>
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
                            <label>Agrega un archivo .txt con las palabras clave</label>
                            <input type="file" name="texto" id="texto" class="btn btn-info" style="height: 40px;"> 
                        </div>
                    
                    <button type="submit" class="btn btn-primary btn-block" name="submit">Crear especialidad</button>
                </form>
        </div> 