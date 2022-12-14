<?php
class controladorAcademy{
    public function plantilla(){
        include "vistas/plantilla.php";
    }
    static public function mostrarSlider($item, $valor){
        $tabla = "slider"; 
        $respuesta = modeloAcademy::modeloDatos($tabla,$item,$valor); 
        return $respuesta; 
    }
    static public function mostrarCursos($item,$valor){
        $tabla = "cursos"; 
        $respuesta = modeloAcademy::modeloDatos($tabla,$item,$valor);
        return $respuesta;
    }
    static public function mostrarCategorias($item,$valor){
        $tabla ="categorias";
        $respuesta = modeloAcademy::modeloDatos($tabla,$item,$valor);
        return $respuesta; 

    }
}

?>