<section id="buscador-pagina">
<div class="container">
    <div class="row">   
        <div class="col-md-3 border">
      <h1>Filtrar</h1>
      <hr>
     
      <form name="Formulariofiltro" method="post" action=""<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>"">
      <h2>Por precio</h2>

      Por precio más alto: <input id="precio1" value="1" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="precio"/>
      <br>
      Por precio más bajo: <input id="precio2" value="2" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="precio"/>
      <br>
      En oferta: <input id="precio3" value="1" tabIndex="3" onClick="ckChange(this)" type="checkbox" name="precio"/>
      <br>
      <h2>Por Fecha</h2>
      Más reciente - más antiguo: <input id="fecha1" value="1" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="fecha"/>
      <br>
      Más antiguo -  más reciente: <input id="fecha2" value="2" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="fecha"/>
      <br>
      Nuevos: <input id="fecha3" value="3" tabIndex="1" onClick="ckChange(this)" type="checkbox"  name="fecha"/>
      <br>
      <h2>Por Valoración</h2>
      Mejor valorado - Peor valorado: <input id="valoracion1" value="1" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="valoracion" />
      <br>
      Peor valorado -  Mejor valorado: <input id="valoracion2" value="2" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="valoracion"/>
      <br>
      Nuevos: <input id="valoracion3" value="3" tabIndex="1" onClick="ckChange(this)" type="checkbox" name="valoracion"/>
      <br>
      <br>
      <input type="submit" name="submit" value="Buscar" class="button-5"/>
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
             $tope = 10; 
             $modo = "DESC";
             $cursos = null; 
             $ordenar = "id";

             if(isset($rutas[1])){
                $busqueda = $rutas[1];
                $cursos = controladorAcademy::ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope);
                $listarCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
             }
          

             if(isset($_POST['precio'])){
                if($_POST['precio'] == 1){
                  $modo = "DESC";
                }
                else if($_POST['precio'] == 2){
                  $modo = "ASC";
                }
                $busqueda = $rutas[1];
                $ordenar = "precio";
                $cursos = controladorAcademy::ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope);
                $listaCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
                
             }
             if(isset($_POST['fecha'])){
              if($_POST['fecha'] == 1){
                $modo = "DESC";
              }
              else if($_POST['fecha'] == 2){
                $modo = "ASC";
              }
              $busqueda = $rutas[1];
              $ordenar = "fecha-inicio";
              $cursos = controladorAcademy::ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope);
              $listaCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
             }
             if(isset($_POST['valoracion'])){
              if($_POST['valoracion'] == 1){
                $modo = "DESC";
              }
              else if($_POST['valoracion'] == 2){
                $modo = "ASC";
              }
              $busqueda = $rutas[1];
              $ordenar = "rating";
              $cursos = controladorAcademy::ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope);
              $listaCursos = controladorAcademy::ctrListarCursosBusqueda($busqueda);
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
                            <p>'.$value["rating"].'</p>
                        </div>
                    </div>
                    </a>
                    <div class="cart-heart container">
            <div class="row">
              <div class="col-md-6">
              <button type="button" class="btn btn-default btn-xs canasta" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></button>
               </div>
              <div class="col-md-6">
              <button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-heart" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
                    
                    ';
                }
                
             }

             ?>
        </div>
    </div>
</div>

</section>
