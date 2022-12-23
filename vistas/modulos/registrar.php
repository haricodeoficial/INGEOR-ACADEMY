<section id="registrar">
<div class="padding-registrar container">
        <div class="row">
            <div class="col-lg-3 col-md-2"></div>
            <div class="col-lg-6 col-md-8 login-box">
        
                <div class="col-lg-12 login-title">
                    REGISTRARSE
                </div>
                <form method="post" onsubmit="return registroUsuario()">
          
                <div class="col-lg-12 login-form">
                    <div class="col-lg-12 login-form">
                        <form>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nombre</label>
                                    <input type="text" class="form-control" name="regUsuario" id="regUsuario" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                    <label class="form-control-label">Apellidos</label>
                                    <input type="text" class="form-control" name="regUsuarioApellido" id="regUsuarioApellido" required>
                                </div>
                            </div>
                            </div>
                           
                            <div class="form-group">
                                <label class="form-control-label">Correo</label>
                                <input type="email" class="form-control"name="regEmail" id="regEmail" required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Contraseña</label>
                                <input type="password" class="form-control" name="regPassword" id="regPassword"required>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Confirmar contraseña</label>
                                <input type="password" class="form-control" name="regConfirmacion" id="regConfirmacion" required>
                            </div>
                            <div class="col-lg-12 loginbttm">
                                <div class="col-lg-12 login-btm login-text">
                                    <!-- Error Message -->
                                    <p>¿Ya tienes una cuenta? <a href="iniciar-sesion">Inicia Sesión</a> </p>

                                </div>
                                <div class="col-md-12">
                                <div class="checkBox">
                                        <label for="">
                                            <input id="regPoliticas" type="checkbox">
                                            <small style="color: #fff;">

                                            Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad. 
                                            <a href="https://www.iubenda.com/privacy-policy/57346718" class="iubenda-black iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy ">Privacy Policy</a>
    
                                        </small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-6 login-btm login-button">
                                    <?php
                                        $registro = new ControladorUsuarios();
                                        $registro -> ctrRegistroUsuario();
                                    ?>
                                    <input type="submit" class="btn btn-outline-primary" value="ENVIAR"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </form>
            </div>
        </div>
</div>
</section>
