<section id="curso">

        <?php
        $habilidades = json_decode($rutaCursos["habilidades"],true);
        $requisitos = json_decode($rutaCursos["requisitos"],true);
        $temporadas = json_decode($rutaCursos["temporadas"],true);
        echo'    
    <div class="background">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="titulo">'.$rutaCursos["nombre"].'</h1>
                    <p>'.$rutaCursos["descripcion"].'</p>
                    <select class="star-rating">
                        <option value="">Select a rating</option>
                        <option value="5">Excellent</option>
                        <option value="4">Very Good</option>
                        <option value="3">Average</option>
                        <option value="2">Poor</option>
                        <option value="1">Terrible</option>
                    </select>
                    <p>Docente: '.$rutaCursos["docente"].'</p>
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
                        <div class="col-md-3">
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
                <h1 class="titulo">Comentarios</h1>
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
                                 
                               <i class="fa-solid fa-user-secret"></i>
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
                             <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                             <a href="#"><i class="fa-solid fa-heart"></i></a>
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
    </div>
    
    </div>
        ';
        ?>
 
</section>




