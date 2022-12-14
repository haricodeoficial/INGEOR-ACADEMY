<?php
$url = ruta::ctrRuta();
?>
<div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <?php
        $item = null; 
        $valor = null; 
        $slides = controladorAcademy::mostrarSlider($item,$valor);
        foreach($slides as $key=>$value){
          echo'
          <div class="swiper-slide slide1"><img class="overlay-img" style="position:relative;" src="'.$url.''.$value["img"].'" alt="'.$value["titulo"].'" ><div class="overlay"><h1>'.$value["titulo"].'</h1></div></div>'; 
        }

        ?>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
</div>
<section id="nav-categorias">
<ul class="nave">
    <li>Categoria 1</li>
    <li>Categoria 2</li>
    <li>Categoria 3</li>
    <li>Categoria 4</li>
    <li>Categoria 5</li>
</ul>
</section>

<section id="cursos">
   <h1>AutoCad</h1>

    <div class="swiper mySwiper2 swiper-product">
      <div class="swiper-wrapper">
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
</section>