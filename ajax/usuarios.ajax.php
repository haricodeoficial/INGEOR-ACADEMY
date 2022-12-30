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
    
//Validar facebook
public $email;
public $nombre;
public $foto;
    public function ajaxRegistroFacebook(){

        $datos = array("nombre"=>$this->nombre,
                       "email"=>$this->email,
                       "foto"=>$this->foto,
                       "password"=>"null",
                       "modo"=>"facebook",
                       "verificacion"=>0,
                       "emailEncriptado"=>"null");
    
        $respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);
    
        echo $respuesta;
    
    }	
    //Agregar a lista de deseos
    
	public $idUsuario;
	public $idProducto;

	public function ajaxAgregarDeseo(){

		$datos = array("idUsuario"=>$this->idUsuario,
					   "idProducto"=>$this->idProducto);

		$respuesta = ControladorUsuarios::ctrAgregarDeseo($datos);
       ;
        echo $respuesta;

	}
        //Quitar producto de la lista 

    public $idDeseo;	

	public function ajaxQuitarDeseo(){

		$datos = $this->idDeseo;

		$respuesta = ControladorUsuarios::ctrQuitarDeseo($datos);

		echo $respuesta;

	}

}



//Validar email existente

if(isset($_POST["validarEmail"])){
    $valEmail = new AjaxUsuarios();
    $valEmail -> validarEmail = $_POST["validarEmail"];
    $valEmail -> ajaxValidarEmail();

}


//Registro de facebook

if(isset($_POST["email"])){
    $regFacebook = new AjaxUsuarios();
    $regFacebook -> email = $_POST["email"];
    $regFacebook -> nombre = $_POST["nombre"];
    $regFacebook -> foto = $_POST["foto"];
    $regFacebook -> ajaxRegistroFacebook();

}
//Agregar lista de deseo
if(isset($_POST["idUsuario"])){

	$deseo = new AjaxUsuarios();
	$deseo -> idUsuario = $_POST["idUsuario"];
	$deseo -> idProducto = $_POST["idProducto"];
	$deseo ->ajaxAgregarDeseo();
}
//Quitar producto de lista de deseo


if(isset($_POST["idUsuario"])){

	$quitarDeseo = new AjaxUsuarios();
	$quitarDeseo -> idDeseo = $_POST["idDeseo"];
	$quitarDeseo ->ajaxQuitarDeseo();
}
