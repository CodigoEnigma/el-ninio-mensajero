
<?php
	require('config/config.php');
	require('config/db.php');
	session_start();
	
?>
<?php include('inc/header.php'); ?>
<a href="<?php echo ROOT_URL; ?>editor_boletin.php" role = "button" style="float:left; margin:10px;">
			 <img src="images/boton_volver.gif" class="img-fluid" alt="Responsive image" id="btn-back"  style = 'width:150px; height:50px;'>
            </a> 
	<script type="text/javascript" src="js/jquery-1.12.0.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/editor.js"></script>	
		<link rel="stylesheet" type="text/css" href="css/editor.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

	<script type="text/javascript">
		$(document).ready(function(){
			$('#txt-content').Editor();

			$('#txt-content').Editor('setText', ['<p style="color:black;">Hola me llamo favio y esta es mi historia</p>']);

			$('#btn-enviar').click(function(e){
				e.preventDefault();
				$('#txt-content').text($('#txt-content').Editor('getText'));
				$('#frm-test').submit();				
			});
		});	
	</script>

<br>
<h1 align="center"><Strong>Edicion De Boletin</Strong></h1>

	<div class="container" style="margin-left:370px;" >
		<div class="row">
			<div class="col-sm-8">
				<form action="prueba.php" method="post" id="frm-test">
					<div class="form-group">
						<textarea id="txt-content" name="txt-content" ></textarea>
					</div>
					<input type="submit" class="btn btn-default" id="btn-enviar" value="Crear Boletin">
				</form>
			</div>
		</div>
    </div>	
        </form>		