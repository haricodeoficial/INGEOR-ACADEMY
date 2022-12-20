<div class="container">
    <div class="row">   
        <div class="col-md-3 border">
      <h1>Filtrar</h1>
      <hr>

      <form action="">
      <h2>Por precio</h2>

      Por precio más alto: <input id="test" type="checkbox" />
      <br>
      Por precio más bajo: <input id="test" type="checkbox" />
      <br>
      En oferta: <input id="test" type="checkbox" />
      <br>
      <h2>Por Fecha</h2>
      Más reciente - más antiguo: <input id="test" type="checkbox" />
      <br>
      Más antiguo -  más reciente: <input id="test" type="checkbox" />
      <br>
      Nuevos: <input id="test" type="checkbox" />
      <br>
      <h2>Por Valoración</h2>
      Mejor valorado - Peor valorado: <input id="test" type="checkbox" />
      <br>
      Peor valorado -  Mejor valorado: <input id="test" type="checkbox" />
      <br>
      Nuevos: <input id="test" type="checkbox" />
      <br>
      <br>
      <input type="submit" value="Buscar"/>
      </form>
        </div>
        <div class="col-md-9">
          <?php
          
          echo'<h1>Resultado para "<strong id="resultado-busqueda">'.$rutas[1].'</strong>"</h1>
          ';
          ?>
             <?php
             $listaCursos = null; 
             $base = 1; 
             $tope = 4; 
             $modo = "DESC";
             $cursos = null; 
             $ordenar = "id";
            
             if(isset($rutas[1])){
                $busqueda = $rutas[1];
                $cursos = controladorAcademy::ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope);
                $listarCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
             }
             if(!$cursos){
                echo '<div class="col-xs-12 error404 text-center">

                <h1><small>¡Oops!</small></h1>

                <h2>Aún no hay cursos en esta sección</h2>

           </div>';
             }else{
                foreach($cursos as $key => $value){
                    echo '  <a class="card-curso" href="'.$url.$value["ruta"].'" > 
                    <div class="container justify-content-center" id="card-tooltip" aria-describedby="tooltip">
                        <div class="row">
                          <div class="col-md-12">
                            
                            <img class="img-curso " src="'.$url.$value["imagen"].'" alt="'.$value["imagen"].'">
                          </div> 
                          <div class="col-md-12">            
                            <h4 class="titulo-curso">'.$value["nombre"].'</h4>
                          </div>
                            <p>Precio: <strong>'.$value["precio"].'$</strong></p> 
                            <p>Fecha inicio: '.$value["fecha-inicio"].'</p>
                        <select class="star-rating">
                            <option value="">Evaluar</option>
                            <option value="5">Excelente</option>
                            <option value="4">Muy bien</option>
                            <option value="3">Debe mejorar</option>
                            <option value="2">Malo</option>
                            <option value="1">Muy malo</option>
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
