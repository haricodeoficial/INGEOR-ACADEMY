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
             
                <h2>Mi lista de deseos</h2>
                <hr>
                <div class="row">
                <?php
                    $item = $_SESSION["id"];

                    $deseos = ControladorUsuarios::ctrMostrarDeseos($item);
                    if(!$deseos){
                        echo '<h2>Opps! no tienes nada en tu lista</h2>'; 
                    }else{
                        foreach($deseos as $key => $value){
                            $ordenar = "id";
                            $valor = $value["id_producto"];
                            $item = "id";
                            $cursos = controladorAcademy::ctrListarCursos($ordenar, $item, $valor);
                            foreach($cursos as $key2 => $value2){
                                echo '<div class="col-md-4">
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
                                        ';echo '

                                    </div>
                                </div>
                                </a>
                                <div class="row">
                                <div class="col-md-6">
                                <button type="button" class="btn btn-default btn-xs canasta" idDeseo="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></button>
                                 </div>
                                <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-xs quitarDeseo" idDeseo="'.$value["id"].'"data-toggle="tooltip" title="Quitar de mi lista de deseos"><i class="fa-solid fa-heart" aria-hidden="true"></i></button>
                                </div>
                              </div>
                                </div>';
                            }
                         
                        }
                    }
                ?>
                </div>
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
               
                



            </div>
         
        </div>
        </figure>
        </form>
       
        <h2>Mi aprendizaje</h2>
                <hr>
                <form method="post" onsubmit="return validarComentario()">
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
                                echo'
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar Reseña</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                   
                                    <input type="hidden" value="" id="idComentario" name="idComentario">
                                    <center>
                                    <div id="estrellas">
                                    <select id="glsr-custom-options" class="star-rating text-center" data-options=\'{"clearable":false, "tooltip":false}\'
                                    <option value="">Select a rating</option>
                                    <option value="5">Excellent</option>
                                    <option value="4">Very Good</option>
                                    <option value="3">Average</option>
                                    <option value="2">Poor</option>
                                    <option value="1">Terrible</option>
                                </select>
                                </div>
                                </center>
                                <div class="form-group text-center">

					<label class="radio-inline"><input type="radio" name="puntaje" value="1">1</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2">2</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3">3</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4">4</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="5" checked>5</label>

				</div>
                <div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comentario" name="comentario" maxlength="300" required></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

				</div>
                ';
                $actualizarComentario = new ControladorUsuarios();
                $actualizarComentario -> ctrActualizarComentario();
     echo ' 
                                
                                    </div>
                                    
                                    </div>
                                </div>
                                </div>
                                <div class="swiper mySwiper2 swiper-product">
                                <div class="swiper-wrapper">
                            
                                 ';
                                 $ordenar = "id";
                                 $item = "id";
                                 $valor = $value1["id_producto"];
                                 $productos = controladorAcademy::ctrListarCursos($ordenar, $item, $valor);
                                 foreach($productos as $key2=>$value2){
                           
                                    echo' 
                                    <div id="Tooltip-3" class="swiper-slide slide-product target">
                                    <div class="">
                                      <a class="card-curso" href="'.$value2["ruta"].'" > 
                                        <div class="container justify-content-center" id="card-tooltip" aria-describedby="tooltip">
                                            <div class="row">
                                              <div class="col-md-12">
                                                
                                                <img class="img-curso " src="'.$value2["imagen"].'" alt="'.$value2["imagen"].'">
                                              </div> 
                                              <div class="col-md-12">            
                                                <h4 class="titulo-curso">'.$value2["nombre"].'</h4>
                                              </div>
                                                <p>Fecha inicio: '.$value2["fecha-inicio"].'</p>
                                           
                                           
                            
                                            </div>
                                        </div>
                                        </a>
                                        ';
                                        
                                        $datos = array("idUsuario"=>$_SESSION["id"],
                                        "idProducto"=>$value2["id"] );
                        $comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);

                                        if($comentarios[0]["rating"] == 0 && $comentarios[0]["comentario"] == ""){
                                            echo'
                                            <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                            <option value="">Select a rating</option>
                                            <option value="5">Excellent</option>
                                            <option value="4">Very Good</option>
                                            <option value="3">Average</option>
                                            <option value="2">Poor</option>
                                            <option value="1">Terrible</option>
                                        </select>
                                        <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                        Realizar reseña
                                        </a>
                                        '; 
                                        }
                                        else{
                                            switch($comentarios[0]["rating"]){
                                                case 1:
                                                    echo'
                                                    <p>Comentario: '.$comentarios[0]["comentario"].'</p>
                                                    <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                                    <option value="">Select a rating</option>
                                                    <option value="5">Excellent</option>
                                                    <option value="4">Very Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Poor</option>
                                                    <option value="1" selected>Terrible</option>
                                                </select>
                                                <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                                Cambiar reseña
                                                </a>
                                                ';
                                                break; 
                                                case 2: 
                                                    echo'
                                                    <p>Comentario: '.$comentarios[0]["comentario"].'</p>
                                                    <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                                    <option value="">Select a rating</option>
                                                    <option value="5">Excellent</option>
                                                    <option value="4">Very Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2" selected>Poor</option>
                                                    <option value="1">Terrible</option>
                                                </select>
                                                <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                                Cambiar reseña
                                                </a>
                                                ';
                                                    break; 
                                                case 3:
                                                    echo'
                                                    <p>Comentario: '.$comentarios[0]["comentario"].'</p>
                                                    <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                                    <option value="">Select a rating</option>
                                                    <option value="5">Excellent</option>
                                                    <option value="4">Very Good</option>
                                                    <option value="3" selected>Average</option>
                                                    <option value="2">Poor</option>
                                                    <option value="1">Terrible</option>
                                                </select>
                                                <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                                Cambiar reseña
                                                </a>
                                                ';
                                                    break; 
                                                case 4:
                                                    echo'
                                                    <p>Comentario: '.$comentarios[0]["comentario"].'</p>
                                                    <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                                    <option value="">Select a rating</option>
                                                    <option value="5">Excellent</option>
                                                    <option value="4" selected>Very Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Poor</option>
                                                    <option value="1">Terrible</option>
                                                </select>
                                                <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                                Cambiar reseña
                                                </a>
                                                ';
                                                    break; 
                                                case 5:
                                                    echo'
                                                    <p>'.$comentarios[0]["comentario"].'</p>
                                                    <select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\'
                                                    <option value="">Select a rating</option>
                                                    <option value="5" selected>Excellent</option>
                                                    <option value="4">Very Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Poor</option>
                                                    <option value="1">Terrible</option>
                                                </select>
                                                <a type="button" class="calificarProducto btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" idComentario="'.$comentarios[0]["id"].'">
                                                Cambiar reseña
                                                </a>
                                                ';
                                                    break; 
                                            }
                                       
                                        }
                                        echo'
                                      

                                      </div>
                                    </div>
                                   
                                    
                                    ';
                            
                                  
                                }
                                echo '
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-pagination"></div>
                              </div>';
                              

                            }
                                
                             
                            
                        }
                    ?>
                </section>
                </form>
                <div class="row">
            <div class="col-md-12">
            <button class="button-7 btnCambiar" id="eliminarUsuario">Eliminar cuenta</button>

            </div>
        </div>
                <?php
                 $borrarUsuario = new ControladorUsuarios();
                 $borrarUsuario->ctrEliminarUsuario();
                    ?>
      </div>
  </section>