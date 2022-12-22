<?php

class ControladorUsuarios{
    public function ctrRegistroUsuario(){
        if(isset($_POST["regUsuario"])){
            
			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["regUsuario"]) &&
            preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["regEmail"]) &&
            preg_match('/^[a-zA-Z0-9]+$/', $_POST["regPassword"])){
                $encriptar = crypt($_POST["regPassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                $encriptarEmail = md5($_POST["regEmail"]);
                $datos = array(
                "nombre"=>$_POST["regUsuario"],
                "apellido"=>$_POST["regUsuarioApellido"],
                "password"=>$encriptar,
                "email"=>$_POST["regEmail"],
                "modo"=>"directo",
                "verificacion"=>1,
                "emailEncriptado" =>$encriptarEmail);

                $tabla = "usuarios"; 
                $respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

                if($respuesta == "ok"){
                    date_default_timezone_set("America/Guatemala");
                    $url = ruta::ctrRuta();
                    $mail = new PHPMailer;
                    $mail->CharSet = 'UTF-8';
                    $mail->isMail();
                    $mail->setFrom('ingeor@oficial.com','Cursos a tu alcance');
                    $mail->addReplyTo('ingeor@oficial.com','Cursos a tu alcance');
                    $mail->Subject = "Por favor verifique su dirección de correo electrónico";
                    $mail->addAddress($_POST["regEmail"]);
                    $mail->msgHTML('
                    <div style="width:100%; background:#eee;position:relative;font-family:sans-serif;padding-bottom:40px;">
    
                    <center>
                        <a href="">
                            <img style="padding: 20px; width: 20%;" src="https://ingeorh.com/vistas/img/logoLetras.png">
                        </a>
                    </center>
                    <div style="position: relative; margin: auto;width: 600px; background: white;padding: 20px;">
                        <center>
                            <img style="border: none; width: 30%;" src="https://previews.dropbox.com/p/thumb/ABwNf9ga4sIF2ZSQWM47M9mUnQ3c8FrxC6PhGNYN4rs1sU7SyWdsCCDl_KEuIYd-Q57zpk9foZ3mPdvqaVgS3LkgRslqhFfL3FI0hpp45HemsWgzCM6_hoAm_Kt6yq03ZREd9DJqpUgUyiH8dWXtx0ocFTxip4No92-6stb9p-4UYSg5VBEmtoyOfOjcF4hKoyhcAXwq0yFRreeW8GPG_aVGbdK71ZN84KAQKorjE-tIZ7KMLEMN2VxjupGKll8oiiSEZGpRPw_aePyvghcFsY5yDa18mTMlX4Un-IsLe64_XqEc_RbTxiZBiWPcF5NIL3Ln3FRXLGdGIJ2a0pYuJCKhXvHFgoAOTIkAVGidgoxr0ISuy47Yc9X0RjjJAeAi0KE/p.gif"/>
                                  <h3 style="font-weight: 100; color: #999;">VERIFIQUE SU DIRECCIÓN DE CORREO ELECTRÓNICO</h3>
                            <hr style="border: 1px solid #ccc; width: 80%;">
                            <h4 style="font-weight: 100; color: #999; padding: 0 20px;">Para comenzar a usar su cuenta de ingeorAcademy, debe confirma su dirección de correo electrónico</h4>
                            <a href="'.$url.'verificar/'.$encriptarEmail.'" target="_blank" style="text-decoration: none;">
                                <div style="line-height: 60px;background: #0071C0;width: 60%; color: white;">Verifique su dirección de correo electrónico</div>
                            </a>
                        <br>
                        <hr style="border: 1px solid #ccc; width: 80%;">
                <h5>Si no se inscribiío en esta cuenta, puede ignorar este correo electrónico y la cuenta se eliminará.</h5>
                        </center>
                
                    </div>
                    </div>
                    
                    ');
                    $envio = $mail->Send();
                    if(!$envio){
                        echo '<script> 

                        swal({
                              title: "¡ERROR!",
                              text: " !Ha ocurrido un problema enviando verificación de correo electrónico a'.$_POST["regEmail"].$mail->ErrorInfo.'¡",
                              type:"error",
                              confirmButtonText: "Cerrar",
                              closeOnConfirm: false
                            },
        
                            function(isConfirm){
        
                                if(isConfirm){
                                    history.back();
                                }
                        });
        
                    </script>';
    
                    }else{

                    echo '<script> 

                    swal({
                          title: "¡OK!",
                          text: "Porfavor revise la bandeja de entreda o la carpeta de SPAM de su correo electrónico '.$_POST["regEmail"].' para verificar la cuenta",
                          type:"success",
                          confirmButtonText: "Cerrar",
                          closeOnConfirm: false
                        },
    
                        function(isConfirm){
    
                            if(isConfirm){
                                history.back();
                            }
                    });
    
                </script>';

                }


                }
            }else{
                echo '<script> 

                swal({
                      title: "¡ERROR!",
                      text: "¡Ha ocurrido un problema!",
                      type:"error",
                      confirmButtonText: "Cerrar",
                      closeOnConfirm: false
                    },

                    function(isConfirm){

                        if(isConfirm){
                            history.back();
                        }
                });

            </script>';
            }
        }
    }

    //MOSTRAR USUARIO
    static public function ctrMostrarUsuario($item, $valor){
        $tabla = "usuarios";
        $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla,$item,$valor);
        return $respuesta;
    }
    //ACTUALIZAR USUARIO
    static public function ctrActualizarUsuario($id, $item, $valor){

		$tabla = "usuarios";

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $id, $item, $valor);

		return $respuesta;

	}
}




