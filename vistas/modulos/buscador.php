<div class="container">
    <div class="row">   
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <h1>Resultado para "<strong id="resultado-busqueda"></strong>"</h1>
             <?php
             $cursos = null; 
             $listaCursos = null; 
             $ordenar = "id";
            
             if(isset($rutas[1])){
                $busqueda = $rutas[1];
                $cursos = controladorAcademy::ctrBuscarCursos($busqueda,$ordenar,$modo,$base,$tope);
                $listarCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
             }
             if(!$listaCursos){
                echo '<div class="col-xs-12 error404 text-center">

                <h1><small>¡Oops!</small></h1>

                <h2>Aún no hay productos en esta sección</h2>

           </div>';
             }else{
                foreach($listaCursos as $key => $value){
                    echo '  <a class="card-curso" href="'.$value["ruta"].'" > 
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
                        <div class="cart-heart container">
                          <div class="row">
                            <div class="col-md-6">
                            <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                             </div>
                            <div class="col-md-6">
                            <a href="#"><i class="fa-solid fa-heart"></i></a>
        
                            </div>
                          </div>
                        </div>
                      
        
                        </div>
                    </div>
                    </a>';
                }
                
             }

             ?>
        </div>
    </div>
</div>
