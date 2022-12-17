<?php
    $item = null;
    $valor = null; 
    $categorias= controladorAcademy::mostrarCategorias($item,$valor);
    foreach($categorias as $key=>$value){
      echo '
 
      <div class="col-md-4 categorias">
        <a href="'.$value["ruta"].'">
          <p>'.$value["categoria"].'</p>
        </a>
      </div>
 
    ';
    }
    ?>