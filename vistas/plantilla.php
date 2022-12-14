
    <!DOCTYPE html>
<html lang="es">
<head>
<!--ETIQUETAS META-->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>INGEOR ACADEMY</title>
<meta name="description" content="INGEOR ACADEMY es la nueva academía web diseñada para llevar el aprendizaje a otro nivel. ">
<meta name="author" content="http://haricode.com/">
<meta property="og:type" content="Sitio web educativo">
<meta property="og:title" content="INGEOR ACADEMY">
<meta property="og:description" content="INGEOR ACADEMY es la nueva academía web diseñada para llevar el aprendizaje a otro nivel. ">
<?php
$url = ruta::ctrRuta();
?>
<!--FIN - ETIQUETAS META-->

<!--ETIQUETAS CSS-->
<link rel="icon" href="<?php echo $url;?>vistas/img/icon.png">
<link rel="stylesheet" type="text/css" href="<?php echo $url;?>vistas/css/style.css">
<!-- CSS only -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!--FIN - ETIQUETAS CSS-->
</head>

<body>
	<?php
	include "modulos/header.php";
	$rutas = array();
	$ruta = null; 
	

	if(isset($_GET["ruta"])){
		$rutas = explode("/",$_GET["ruta"]);
		$item = "ruta";
		$valor =$rutas[0];
		$rutaCursos = controladorAcademy::mostrarCursos($item, $valor);
		 
		if($valor == $rutaCursos["ruta"]){
			$ruta = $valor;
		}
		if($ruta != null){
			include "modulos/cursos.php";
		}else{
			if($valor =="registrar"){
				include "modulos/registrar.php";
			}
			else if($valor == "iniciar-sesion"){
				include "modulos/iniciar-sesion.php";
			}else{
				include "modulos/error404.php"; 

			}
		}
	}else{
		include "modulos/inicio.php";
	}
	include "modulos/footer.php";
	?>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
<script type="text/javascript">
      var swiper = new Swiper(".mySwiper", {
        pagination: {
          el: ".swiper-pagination",
          type: "progressbar",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script> 
<script type="text/javascript">
      var swiper = new Swiper(".mySwiper2", {
        slidesPerView: 3,
        spaceBetween: 30,
        slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
</script>
<script src="<?php echo $url;?>vistas/js/main.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
	$('#search-dropdown a').click(function(){
		$('#search-btn').html($(this).text()).val($(this).text());
		return false;
	});
});
</script>
<!--FIN - ETIQUETAS JS-->

</html>