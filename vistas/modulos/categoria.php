<section id="categoria">
    <div class="banner-categoria">
        <div class="content center-div justify-content-center">
<?php
echo'<h1 class="titulo-categorias">'.$rutaSecciones["seccion"].'</h1>';
?>
        </div>
    </div>
<div class="container">
    <div class="row"> 
        <?php
        $item = null; 
        $valor = null; 
       
            $seccion = controladorAcademy::mostrarSecciones($item,$valor);
            foreach($seccion as $key =>$value){
                if($value["seccion"] == $rutaSecciones["seccion"]){
                
                    $cursosPorSeccion = controladorAcademy::ctrmostrarSeccionesPagina($value["id"]);
    
                } 
            }
            
        foreach($cursosPorSeccion as $key=>$value ){
           
            echo'<div class="col-md-4">
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
                    ';echo '
                </div>
            </div>
            </a>
            
            
            </div>';
        }
       
        ?>
    </div>
</div>
</section>
