<?php
	require('config/config.php');
	require('config/db.php');
	
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
                    <form class="formularioLogin">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese usuario">
                            <small id="emailHelp" class="form-text text-muted">No se compartira su información.</small>
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            <small id="emailHelp" class="form-text text-muted">No comparta su contraseña.</small>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                    </form>
                </section>
            </section>
        </section>   
    </div> 