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
    static public function ctrmostrarSeccionesPagina($id){
        $tabla = "cursos";
        $respuesta = modeloAcademy::mdlmostrarSeccionesPagina($tabla, $id);
        return $respuesta;

    }
    static public function mostrarCategorias($item,$valor){
        $tabla ="categorias";
        $respuesta = modeloAcademy::modeloDatos($tabla,$item,$valor);
        return $respuesta; 
    }
    static public function ctrBuscarCursos($busqueda, $ordenar,$modo,$base,$tope){
        $tabla = "cursos"; 
        $respuesta = modeloAcademy::mdlBuscarCursos($tabla, $busqueda,$ordenar,$modo,$base,$tope);
        return $respuesta;
    }
    static public function ctrListarCursos($ordenar, $item, $valor){

		$tabla = "cursos";

		$respuesta = modeloAcademy::mdlListarCursos($tabla, $ordenar, $item, $valor);

		return $respuesta;

	}
    static public function ctrListarCursosBusqueda($busqueda){
        $tabla = "cursos"; 
        $respuesta = modeloAcademy::mdlListarCursosBusqueda($tabla, $busqueda);
        return $respuesta; 

    }
    
    static public function mostrarComentarios($item,$valor){
        $tabla = "comentarios"; 
        $respuesta = modeloAcademy::modeloDatos($tabla,$item,$valor);
        return $respuesta;

    }
    static public function mostrarSecciones($item,$valor){
        $tabla = "secciones";
        $respuesta = modeloAcademy::modeloDatos($tabla, $item,$valor);
        return $respuesta; 
    } 
    
	
}

?>