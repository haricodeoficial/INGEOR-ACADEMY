<?php

    foreach($categorias as $key=>$value){
      echo '
 
      <div class="col-md-3 categorias">
        <a href="'.$value["ruta"].'">
          <p>'.mb_strtoupper($value["seccion"]).'</p>
        </a>
      </div>
 
    ';
    }
    ?>