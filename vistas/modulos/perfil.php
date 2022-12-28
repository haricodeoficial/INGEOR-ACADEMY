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
      <form method="post" enctype="multipart/form-data">
      <figure id="imgPerfil">
        <div class="row content">
          
            <div class="col-md-3">
            <?php
            if($_SESSION["modo"] !="facebook"){
                if($_SESSION["foto"] != ""){
                    echo'
                    <img class="img-circle-perfil" src="'.$url.$_SESSION["foto"].'">
                    <button type="button" id="btnCambiarFoto"><i class="fa-solid fa-pen-to-square"></i></button>
                    <h1 style="color:#000; font-size:10px;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>
                    <div id="subirImagen">
                    <input type="file" class="form-control" id="datosImagen" name="datosImagen">
                    <img class="previsualizar">
                    </div>

                    ';
                }else{
                    echo'
                    <img class="img-circle-perfil" src="'.$urlServidor.'vistas/img/usuarios/default/perfil.png">
                    <button type="button" id="btnCambiarFoto"><i class="fa-solid fa-pen-to-square"></i></button>
                    <h1 style="color:#000;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>
                    <div id="subirImagen">
                    <input type="file" class="form-control" id="datosImagen" name="datosImagen">
                    <img class="previsualizar">
                    </div>
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
                <?php
                    if($_SESSION["modo"] == "directo"){
                        echo' 
                        <input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
                  <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
                  <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
                  <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">
                        <h4>Cambiar nombre: </h4>
                        <input id="editarNombre" name="editarNombre" type="text" style="width:100%; height: 35px;" value="'.$_SESSION["nombre"].'" placeholder="Escribe el nuevo nombre...">
                        <h4>Cambiar Correo Electrónico: </h4>
                        <input id="editarEmail" name="editarEmail" type="text" style="width:100%; height: 35px;" value="'.$_SESSION["email"].'" placeholder="Escribe el nuevo correo...">
                        <h4>Cambiar contraseña</h4>
                        <input id="editarPassword" name="editarPassword" type="password" style="width:100%; height: 35px;" placeholder="Escribe la nueva contraseña...">
                        <h4>Confirmar contraseña</h4>
                        <input id="confirmarPassword" name="confirmarPassword" type="password" style="width:100%; height: 35px;" placeholder="Escribe la nueva contraseña...">

                        <div class="row">
                            
                            <div class="col-md-12">
                            <button type="submit" class="button-5 btnCambiar">Actualizar Datos</button>
        
                            </div>
                          
                        </div>';

                    }
                    $actualizarPerfil = new ControladorUsuarios();
                    $actualizarPerfil->ctrActualizarPerfil();
                    echo'
                    ';
                ?>
               <button type="submit" class="button-7 btnCambiar">Eliminar cuenta</button>
                <?php
                 //$borrarUsuario = new ControladorUsuarios();
                 //$borrarUsuario->ctrEliminarUsuario();
                    ?>
                



            </div>
         
        </div>
        </figure>
        </form>

      </div>
  </section>