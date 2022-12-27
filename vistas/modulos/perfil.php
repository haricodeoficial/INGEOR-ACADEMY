<!--VALIDAR SESIÓN-->
<?php
if(!isset($_SESSION["validarSesion"])){
echo'<script>
window.location ="'.$url.'";

</script>';
exit();
}
?>

  <section class="home-section">
      <div class="container">
        <div class="row content">
            <div class="col-md-3">
            <?php
            if($_SESSION["modo"] !="facebook"){
                if($_SESSION["foto"] != ""){
                    echo'
                    <img class="img-circle-perfil" src="'.$url.$_SESSION["foto"].'">
                    <button><i class="fa-solid fa-pen-to-square"></i></button>
                    <h1 style="color:#000; font-size:10px;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>


                    ';
                }else{
                    echo'
                    <img class="img-circle-perfil" src="'.$urlServidor.'vistas/img/usuarios/default/perfil.png">
                    <button><i class="fa-solid fa-pen-to-square"></i></button>
                    <h1 style="color:#000;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>

                    ';
                }
            }
                
            ?>
            </div>
            <div class="col-md-7">
                <h2>Mi aprendizaje</h2>
                <hr>
                <h2>Mi lista de deseos</h2>
                <hr>
                <h2>Editar perfil</h2>
                <hr>
                <form method="post" enctype="multipart/form-data">
                <h4>Cambiar nombre: </h4>
                <input id="editarNombre" name="editarNombre" type="text" style="width:100%; height: 35px;" value="<?php echo $_SESSION["nombre"]?>" placeholder="Escribe el nuevo nombre...">
                <h4>Cambiar Correo Electrónico: </h4>
                <input id="editarEmail" name="editarEmail" type="text" style="width:100%; height: 35px;" value="<?php echo $_SESSION["email"]?>" placeholder="Escribe el nuevo correo...">
                <h4>Cambiar contraseña</h4>
                <input id="editarPassword" name="editarPassword" type="text" style="width:100%; height: 35px;" placeholder="Escribe la nueva contraseña...">
                <div class="row">
                    
                    <div class="col-md-12">
                    <button type="submit" class="button-5 btnCambiar">Actualizar</button>

                    </div>
                  
                </div>
                <?php
                    $actualizarPerfil = new ControladorUsuarios();
                    $actualizarPerfil->ctrActualizarPerfil();
                    ?>
                </form>
                <button type="submit" class="button-7 btnCambiar">Eliminar</button>



            </div>
        </div>
      </div>
  </section>