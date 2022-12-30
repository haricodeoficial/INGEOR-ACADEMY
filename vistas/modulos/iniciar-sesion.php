<?php
$urlServidor = ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();


if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}
?>
<section id="iniciar-sesion">
<div class="padding-inicio-sesion container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
        
                <div class="col-lg-12 login-title">
                    INICIAR SESIÓN
                </div>
                <form method="post">
                    
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form method="post">
                        <div class="row">
                            <div class="col-sm-6 col-xs-12 facebook" id="btnFacebookRegistro" style="padding:15px;color:#fff; background:#627AAC;">
                                <i class="fa-brands fa-facebook"></i>
                                    Registro con Facebook
                            </div>
                            <div class="row"style="padding-top:20px; ">
                               
                            <div class="form-group">
                                <label class="form-control-label">Correo</label>
                                <input type="email" class="form-control" name="ingEmail"id="ingEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Contraseña</label>
                                <input type="password" class="form-control" name="ingPassword" id="ingPassword" required>
                            </div>

                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-6 login-btm login-text">
                                    <!-- Error Message -->
                                </div>
                                <div class="col-lg-6 login-btm login-button justify-content-center" align="center">
                                    <?php
                                        $ingreso = new ControladorUsuarios();
                                        $ingreso ->ctrIngresoUsuario();
                                    ?>
                                    <div class="g-recaptcha" data-sitekey="6Lf3FKwjAAAAACI_BAt8OVuU-msFyZ3SntqS0FCE"></div>

                                    <input type="submit" class="btn btn-outline-primary btnIngreso" value="ENVIAR">
                                    <center>
                                       <a href="recuperar">¿Olvidaste tu contraseña?</a> 
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
                <div class="col-lg-3 col-md-2"></div>
            </div>
        </div>
</div>
</section>
