<?php
$url = ruta::ctrRuta();
?>
<div class="swiper swiper-principal mySwiper">
      <div class="swiper-wrapper">
        <?php
        $item = null; 
        $valor = null; 
        $i = 0;
        $slides = controladorAcademy::mostrarSlider($item,$valor);
        $categorias= controladorAcademy::mostrarSecciones($item,$valor);
        foreach($slides as $key=>$value){
          if($categorias[$i]["id"] == $value["titulo"]){
            echo'
            <div class="swiper-slide slide1">
            <img class="overlay-img" style="position:relative;" src="'.$url.''.$value["img"].'" alt="'.$value["titulo"].'" >
            <div class="overlay">
            <center>
            <div class="container inicio-padding">
              <div class="row">
                <div class="col-md-6">
                  <h1 class="titulo-principal">'.$categorias[$i]["seccion"].'</h1>
                  <a href="'.$categorias[$i]["ruta"].'" style="width:50%;" class="button-5">Ver más</a>
  
                </div>
                <div style="padding-left:50px;" class="col-md-6">
                <p class="descripcion-768">'.$value["descripcion"].'</p>
                </div>
              </div>
            </div>
            </center>
            </div>
            </div>'; 
          }
          $i++;
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
                </div>
            </div>
            </a>
            <div class="cart-heart container">
            <div class="row">
              <div class="col-md-6">
              <button type="button" class="btn btn-default btn-xs agregarCarrito" idProducto="'.$value2["id"].'" imagen="'.$value2["imagen"].'" titulo="'.$value2["nombre"].'" precio="'.$value2["precio"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos"><i class="fa-solid fa-cart-shopping" aria-hidden="true"></i></button>
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

