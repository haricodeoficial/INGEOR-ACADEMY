<?php
require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";
class AjaxUsuarios{
    public $validarEmail; 
    public function ajaxValidarEmail(){
        $datos = $this->validarEmail; 
        $respuesta = controladorUsuarios::ctrMostrarUsuario("email",$datos);
        echo json_encode($respuesta);
    }
}



//Validar email existente

if(isset($_POST["validarEmail"])){
    $valEmail = new AjaxUsuarios();
    $valEmail -> validarEmail = $_POST["validarEmail"];
    $valEmail -> ajaxValidarEmail();

}