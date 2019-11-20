<?php 
        require('config/config.php');
    session_start();
include('inc/header.php'); 
 extract($_GET);
$query = "SELECT * FROM especialidad WHERE ID_ESPECIALIDAD='$id'" ;
require('config/db.php');
$cons = mysqli_query($conn, $query);
$valores = mysqli_fetch_array($cons, MYSQL_ASSOC);
$leer = $valores['LEER'];
$responder  = $valores['RESPONDER'];
$derivar = $valores['DERIVAR'];
$postular =  $valores['POSTULAR'];
$nombre = $valores['NOMBRE_ESPECIALIDAD'] ;
mysqli_close($conn);
?>
    
    
    
    
    
    
    
<div class="container"> 
   
    <a href="<?php echo ROOT_URL; ?>administrar_tipos.php" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
            </a> 
   </div>
 <div class="cabeceraSesion">
                    <h2>EDITAR ESPECIALIDAD</h2>
                </div>
                <form class="login" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                    <div class="input-group">
                        <label>Especialidad *</label>
                        <input type="text" name="especialidad" placeholder="Indroduzca nueva especialidad" value="<?php echo $nombre;?>" >
                        
                    </div>
                    <label><strong>*Permisos:</strong> Puede selecionar uno o mas permisos</label>
                       <?php if($leer == 'si'):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="leerCartas" value="1" checked >
                            <label class="form-check-label">
                                Leer cartas
                            </label>
                        </div>
                        <?php else :?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="leerCartas" value="1" >
                            <label class="form-check-label">
                                Leer cartas
                            </label>
                        </div>
                        <?php endif;?>
                        <?php if($responder == 'si'):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="responderCartas" value="2" checked>
                            <label class="form-check-label" >
                                Responder cartas
                            </label>
                        </div>
                        <?php else:?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="responderCartas" value="2">
                            <label class="form-check-label" >
                                Responder cartas
                            </label>
                        </div>
                        <?php endif;?>
                        <?php if($derivar== 'si'):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="derivarCartas" value="3" checked>
                            <label class="form-check-label" >
                                Derivar cartas
                            </label>
                        </div>
                        <?php else :?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="derivarCartas" value="3">
                            <label class="form-check-label" >
                                Derivar cartas
                            </label>
                        </div>
                        <?php endif;?>
                        <?php if($postular== 'si'):?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="postularCartas" value="4" checked>
                            <label class="form-check-label" >
                                Postular cartas para boletin
                            </label>
                        </div>
                        <?php else: ?>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="postularCartas" value="4">
                            <label class="form-check-label" >
                                Postular cartas para boletin
                            </label>
                        </div>
                        <?php endif;?>
                        <div class="input-group">
                            <label>*Agrega un archivo .txt con las palabras clave</label>
                            <input type="file" name="texto" id="texto" class="btn btn-info" style="height: 40px;"> 
                        </div>
                    <div>
                          <a href="<?php echo ROOT_URL; ?>administrar_tipos.php" class="btn btn-primary btn-block"  name="cancelar">Cancelar </a> 
                          <br>
                     </div>
                    <button type="submit" class="btn btn-primary btn-block" name="crear_especialidad">Actualizar</button>
                    <br>
                    <label>Los campos marcados con <strong>*</strong> son campos obligatorios</label>
                </form>
        </div> 


