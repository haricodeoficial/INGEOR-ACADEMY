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
                    <h1 style="color:#000; font-size:30px;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>
                    <hr>
                    <h2>Cambiar foto: </h2>
                    <div id="subirImagen">
                 
                    <input type="file" class="form-control" id="datosImagen" name="datosImagen">
                    <img class="previsualizar">
                    </div>

                    ';
                }else{
                    echo'
                    <img class="img-circle-perfil" src="'.$urlServidor.'vistas/img/usuarios/default/perfil.png">
                    <h1 style="color:#000; font-size:30px;">'.$_SESSION["nombre"].'</h1>
                    <h4 style="color:#000;">'.$_SESSION["email"].'</h4>
                    <hr>
                    <h2>Cambiar foto: </h2>
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

                <section id="mis-compras">
                    <?php
                       $item = "id_usuario";
                       $valor = $_SESSION["id"];
   
                       $compras = ControladorUsuarios::ctrMostrarCompras($item, $valor);
                       
                        if(!$compras){
                            echo'<h1>¡Oops!</h1>
                            <h2>Aún no tienes compras realizadas en esta tienda</h2>
                            '; 
                        }else{
                            foreach ($compras as $key => $value1) {
                                $ordenar = "id";
                                $item = "id";
                                $valor = $value1["id_producto"];
                                $productos = controladorAcademy::ctrListarCursos($ordenar, $item, $valor);
                                echo' <div class="row">';
                                foreach($productos as $key =>$value2){
                                    echo '
                                   
                                    <div class="col-md-4">
                                    <a class="card-curso" href="'.$value2["ruta"].'" > 
                                    <div class="container justify-content-center" id="card-tooltip" aria-describedby="tooltip">
                                        <div class="row">
                                          <div class="col-md-12">
                                            
                                            <img class="img-curso " src="'.$value2["imagen"].'" alt="'.$value2["imagen"].'">
                                          </div> 
                                          <div class="col-md-12">            
                                            <h4 class="titulo-curso">'.$value2["nombre"].'</h4>
                                          </div>
                                            <p>Precio: <strong>'.$value2["precio"].'$</strong></p> 
                                            <p>Fecha inicio: '.$value2["fecha-inicio"].'</p>
                                        </div>
                                    </div>
                                    </a>
                                    <button class="btn btn-default">Ir al curso</button>

                                    </div>
                                    
                                    '; 
                                    echo'</div>';
                                }
                               

                            }
                                
                             
                            
                        }
                    ?>
                </section>
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