<section id="curso">

        <?php
        $habilidades = json_decode($rutaCursos["habilidades"],true);
        $requisitos = json_decode($rutaCursos["requisitos"],true);
        $temporadas = json_decode($rutaCursos["temporadas"],true);
        $item = null; 
        $valor = null; 
        $comentarios = controladorAcademy::mostrarComentarios($item,$valor);
        $promedioRating = 0; 
        $cantidadComentarios = 0; 
        $cantidadCalificaciones = 0; 
        foreach($comentarios as $key=>$value){
            if($rutaCursos["id"] == $value["id_producto"]){
                if($value["rating"] != 0){
                    $promedioRating+=$value["rating"];
                    $cantidadCalificaciones+=1; 
                }
                $cantidadComentarios+=1; 

            }
            
        }

        if($cantidadCalificaciones != 0 || $cantidadCalificaciones != null){
            $promedioRating /= $cantidadCalificaciones; 
        }
        echo'    
    <div class="background">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="titulo">'.$rutaCursos["nombre"].'</h1>
                    <p>'.$rutaCursos["descripcion"].'</p>
                    <p>Docente: '.$rutaCursos["docente"].'</p>
                    <h4>Promedio de rating: "'.$promedioRating.'"</h4>
                </div>
                <div class="col-md-6">
                    <img style=" width: 100%;" src="'.$rutaCursos["imagen"].'" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="background2">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="titulo">Habilidades que desarrollarás</h1>
                ';
                foreach ($habilidades as $value){
                    echo '
                    <div class="container">
                        <div class="row">
                            <div class="col-md-1">
                                <i class="fa-solid fa-check"></i>
                            </div>
                            <div class="col-md-11">
                                <p>'.$value.'</p>
                            </div> 
                        </div>
                    </div>
                    ';
                }
                echo'
                </div>
                <div class="col-md-6 titulo">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <h1 class="precio">'.$rutaCursos["precio"].'US$</h1>
                        </div>
                        <div class="col-md-3 text-center">
                            <a href="#" class="share-button"><i class="fa-solid fa-share"></i></a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="button-5">Comprar ahora</a>
                        </div>
                        <div class="col-md-3">
                            <a href="#" class="button-6">Añadir a la cesta</a>
                        </div>
                    </div>
                    <h3>Requisitos: </h3>
                    ';
                    foreach ($requisitos as $value){
                        echo '
                        <div class="container">
                            <div class="row">
                                <div class="col-md-1">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="col-md-11">
                                    <p>'.$value.'</p>
                                </div> 
                            </div>
                        </div>
                        ';
                    }
                    echo'
                </div>
            </div>
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="titulo">Contenido del Curso</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 text-center">
                <h1 class="titulo">Introducción</h1>
                <p class="">'.$rutaCursos["introducción"].'</p>
            </div>
            <div class="col-md-6 text-center">
                <h1 class="titulo">Temporadas</h1>
                <div id="accordion">
                ';
                foreach($temporadas as $value){

                    echo'
                    <h1>'.$value.'</h1>
                    <div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Labore commodi sequi est consectetur eos unde velit debitis quo numquam veniam id quidem voluptates, in distinctio ipsa, perferendis delectus illum non?</p>
                    </div>
                    ';

                }
                echo'
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="titulo">Cursos Relacionados</h1>
                <div class="swiper mySwiper2 swiper-product">
                 <div class="swiper-wrapper">
                ';
                $item = null; 
                $valor = null; 
                $cursos = controladorAcademy::mostrarCursos($item,$valor);

                foreach($cursos as $key=>$value){
                    if($rutaCursos["id_categoria"] == $value["id_categoria"] && $rutaCursos["id"] != $value["id"]){
                        echo'
                        <div class="swiper-slide slide-product">
                        <a class="card-curso" href="'.$value["ruta"].'" > 
                          <div class="container justify-content-center" id="card-tooltip" aria-describedby="tooltip">
                              <div class="row">
                                <div class="col-md-12">
                                  
                                  <img class="img-curso " src="'.$value["imagen"].'" alt="'.$value["imagen"].'">
                                </div> 
                                <div class="col-md-12">            
                                  <h4 class="titulo-curso">'.$value["nombre"].'</h4>
                                </div>
                                  <p>Precio: <strong>'.$value["precio"].'$</strong></p> 
                                  <p>Fecha inicio: '.$value["fecha-inicio"].'</p>
                              <select class="star-rating">
                                  <option value="">Select a rating</option>
                                  <option value="5">Excellent</option>
                                  <option value="4">Very Good</option>
                                  <option value="3">Average</option>
                                  <option value="2">Poor</option>
                                  <option value="1">Terrible</option>
                              </select>
                              </div>
                          </div>
                          </a>
                        </div>
                        <div id="tooltip" role="tooltip">Im a tooltip</div>
                        
                        ';

                    }
                }
                echo'
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-pagination"></div>
              </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-md-12 text-center">
                ';
               
                echo'
                <h1 class="titulo">Comentarios</h1>
                <div class="row">
                    <div class="col-md-6">
                        <h3>Cantidad de comentarios: '.$cantidadComentarios.'</h3>
                    </div>
                    <div class="col-md-6">
                    <h3>Promedio de rating: '.$promedioRating.'</h3>

                    </div>
                </div>
                <div class="swiper mySwiper23 swiper-product">
                <div class="swiper-wrapper">
               ';
               $item = null; 
               $valor = null; 
               $hayComentarios = False; 
               $comentarios = controladorAcademy::mostrarComentarios($item,$valor);
               foreach($comentarios as $key=>$value){
                if($rutaCursos["id"] == $value["id_producto"]){

                    $usuarioBusqueda = controladorUsuarios::ctrBuscarUsuario($value["id_usuario"]);

                    $hayComentarios = True;
                    echo'
                    <div class="swiper-slide slide-product">
                    <a class="card-curso" href="#" > 
                      <div class="container justify-content-center" id="card-tooltip" aria-describedby="tooltip">
                          <div class="row">
                            <div class="col-md-12">
                            <center>
                              ';
                              if($usuarioBusqueda[0]["foto"] == "" || $usuarioBusqueda[0]["foto"] == null){
                                echo'<img style=" width: 15%; padding-bottom:10px;" src="'.$urlServidor.'vistas/img/usuarios/default/perfil.png" alt="">';
                              }
                              else{
                                echo'<img style=" width: 15%; padding-bottom:10px;" src="'.$url.$usuarioBusqueda[0]["foto"].'" alt="">';

                              }
                              echo'
                           
                            </center>
                            </div> 
                            <div class="col-md-12">            
                              <h4 class="titulo-curso">'.$usuarioBusqueda[0]["nombre"].'</h4>
                              <p>Fecha: '.$value["fecha"].'</p> 
                            </div>
                              <p>'.$value["comentario"].'</p> 
                              ';
                              switch($value["rating"]){
                                 case 1:
                                     echo'  <select class="star-rating">
                                     <option value="">Select a rating</option>
                                     <option value="5">Excellent</option>
                                     <option value="4">Very Good</option>
                                     <option value="3">Average</option>
                                     <option value="2">Poor</option>
                                     <option value="1" selected>Terrible</option>
                                 </select>';
                                     break; 
                                 case 2:
                                     echo'  <select class="star-rating">
                                     <option value="">Select a rating</option>
                                     <option value="5">Excellent</option>
                                     <option value="4">Very Good</option>
                                     <option value="3">Average</option>
                                     <option value="2" selected>Poor</option>
                                     <option value="1">Terrible</option>
                                 </select>';
                                     break; 
                                 case 3:
                                     echo'  <select class="star-rating">
                                     <option value="">Select a rating</option>
                                     <option value="5">Excellent</option>
                                     <option value="4">Very Good</option>
                                     <option value="3" selected>Average</option>
                                     <option value="2">Poor</option>
                                     <option value="1">Terrible</option>
                                 </select>';
                                     break; 
                                 case 4:
                                     echo'  <select class="star-rating">
                                     <option value="">Select a rating</option>
                                     <option value="5">Excellent</option>
                                     <option value="4" selected>Very Good</option>
                                     <option value="3">Average</option>
                                     <option value="2">Poor</option>
                                     <option value="1">Terrible</option>
                                 </select>';
                                     break; 
                                 case 5:
                                     echo'  <select class="star-rating">
                                     <option value="">Select a rating</option>
                                     <option value="5" selected>Excellent</option>
                                     <option value="4">Very Good</option>
                                     <option value="3">Average</option>
                                     <option value="2">Poor</option>
                                     <option value="1">Terrible</option>
                                 </select>';
                                     break; 
                              }
                              echo'
                        
                         
                          </div>
                      </div>
                      </a>
                    </div>
                    <div id="tooltip" role="tooltip">Im a tooltip</div>
                    
                    ';

                }
                    
                   }
                   if(!$hayComentarios){
                    echo'<h2>No hay comentarios en este curso</h2>';
                   }    
               
               echo'
               </div>
               <div class="swiper-button-next"></div>
               <div class="swiper-button-prev"></div>
               <div class="swiper-pagination"></div>
             </div>
            </div>
        </div>
    </div>
    
    </div>
        ';
        ?>
 
</section>
<script type="text/javascript">
	var urlActual = jQuery(location).attr('href');
var shareData = {
  title: 'Comparto este curso contigo!',
  text: 'échale un vistazo y comienza tu aprendizaje interactivo',
  url: 'https://developer.mozilla.org'
}
shareData['url'] = ''+urlActual;

const btn = document.querySelector('.share-button');
const resultPara = document.querySelector('.result');

// Share must be triggered by "user activation"
btn.addEventListener('click', async () => {
  try {
    await navigator.share(shareData);
    resultPara.textContent = 'MDN shared successfully';
  } catch (err) {
    resultPara.textContent = `Error: ${err}`;
  }
});
</script>