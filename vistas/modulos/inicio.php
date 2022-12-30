<?php
$url = ruta::ctrRuta();
?>
<div class="swiper swiper-principal mySwiper">
      <div class="swiper-wrapper">
        <?php
        $item = null; 
        $valor = null; 
        $slides = controladorAcademy::mostrarSlider($item,$valor);
        foreach($slides as $key=>$value){
          echo'
          <div class="swiper-slide slide1"><img class="overlay-img" style="position:relative;" src="'.$url.''.$value["img"].'" alt="'.$value["titulo"].'" ><div class="overlay"><h1 class="titulo-principal">'.$value["titulo"].'</h1></div></div>'; 
        }

        ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
</div>
<section id="nav-categorias">

<div class ="container">
    <div class="row">
    <?php
    include "navegacion-categorias.php";
    ?>
       </div>
  </div>

</section>

<section id="cursos">
   

  <?php
  $item = null; 
  $valor = null; 
  $categorias = controladorAcademy::mostrarCategorias($item,$valor);
  $cursos = controladorAcademy::mostrarCursos($item,$valor);
  foreach($categorias as $key=>$value){
    echo'   <h1>'.mb_strtoupper($value["categoria"]).'</h1>
    <div class="swiper mySwiper2 swiper-product">
    <div class="swiper-wrapper">

     ';
     foreach($cursos as $key2=>$value2){
      if($value2["id_categoria"] == $value["id"]){
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
                    <p>Precio: <strong>'.$value2["precio"].'$</strong></p> 
                    <p>Fecha inicio: '.$value2["fecha-inicio"].'</p>
                    ';echo '
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
            <div class="cart-heart container">
            <div class="row">
              <div class="col-md-6">
              <button type="button" class="btn btn-default btn-xs canasta" idProducto="'.$value2["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></button>
               </div>
              <div class="col-md-6">
              <button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value2["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-heart" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          </div>
        </div>
       
        
        ';

      }
    }
    echo '
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>';

  }
  ?>


</section>

