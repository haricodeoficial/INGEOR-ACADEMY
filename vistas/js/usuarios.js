//Captura de ruta
var rutaActual = location.href; 
$(".btnIngreso").click(function(){
    localStorage.setItem("rutaActual",rutaActual);
    
})
//FORMATEAR EL CAMPO
$("input").focus(function(){
    $(".alert").remove();
})

//Validar email repetido

var rutaOculta = $("#rutaOculta").val();

var validarEmailRepetido = false;

$("#regEmail").change(function(){

	var email = $("#regEmail").val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	$.ajax({

		url:rutaOculta+"ajax/usuarios.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		success:function(respuesta){
			
			if(respuesta == "false"){

				$(".alert").remove();
				validarEmailRepetido = false;

			}else{

				var modo = JSON.parse(respuesta).modo;
				
				if(modo == "directo"){

					modo = "esta página";
				}

				$("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, fue registrado a través de '+modo+', por favor ingrese otro diferente</div>')

					validarEmailRepetido = true;

			}

		}

	})

});
function registroUsuario(){
    //Validar el nombre
    var nombre = $("#regUsuario").val();
    var apellido = $("#regUsuarioApellido").val();
    if(nombre != ""){
        if(apellido != ""){
            var expresion = /^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]*$/;
            if(!expresion.test(nombre)){
                if(!expresion.test(apellido)){
                    $("#regUsuarioApellido").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caracteres especiales</div>')
                    return false; 
                }
                $("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>No se permiten números ni caracteres especiales</div>')
                return false; 
            }
        }else{
            $("#regUsuarioApellido").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>')
        return false; 
        }
        
    }else{
        $("#regUsuario").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>')
        return false; 
    }

//Validar email
    var email = $("#regEmail").val();
    if(email !=""){
        var expresion =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if(!expresion.test(email)){
            $("#regEmail").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>Escriba correctamente el correo electrónico</div>')
            return false; 
        }
        if(validarEmailRepetido){
            $("#regEmail").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> El correo electrónico ya existe en la base de datos, por favor ingrese otro diferente</div>')
            return false;
        }
    }else{
        $("#regEmail").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
        return false; 
    }

    //Validar contraseña

    var email = $("#regPassword").val();
    if(email !=""){
        var expresion =  /^[a-zA-Z0-9]*$/; 
        if(!expresion.test(email)){
            $("#regPassword").parent().before('<div class="alert alert-warning"><strong>ERROR: </strong>Escriba correctamente el correo electrónico</div>');
            return false; 
        }
    }else{
        $("#regPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Este campo es obligatorio</div>');
        return false; 
    }
    //Validar confirmación de contraseña
    var emailConfirmacion = $("#regConfirmacion").val(); 
    if(email != emailConfirmacion){
        $("#regConfirmacion").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>La contraseña con coincide</div>');
        return false; 
    }
    var cambiarPass = $("#editarPassword").val();
    var cambiarPassConfirmar = $("#confirmarPassword").val();
    if(cambiarPass != cambiarPassConfirmar){
        $("#confirmarPassword").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>La contraseña con coincide</div>');
        return false; 
    }
    //Validar políticas de privacidad
    var politicas = $("#regPoliticas:checked").val();

    if(politicas != "on"){
        $("#regPoliticas").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Debe aceptar nuestras condiciones de uso y políticas de privacidad.</div>');
        return false; 

    }
    return true; 
}

//Cambiar foto
$("#datosImagen").change(function(){
    var imagen = this.files[0];
    //Validamos el formato de la imagen
    if(imagen["type"] != "image/jpeg" && imagen["type"]!="image/png"){
        $("#datosImagen").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen debe estar en formato JPG!",
            type:"error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          },

          function(isConfirm){

              if(isConfirm){
                  window.location = rutaOculta+"perfil";
              }
      });
    }
    else if(Number(imagen["size"]) > 2000000){
        $("#datosImagen").val("");
        swal({
            title: "Error al subir la imagen",
            text: "¡La imagen no debe pesar más de 2MB!",
            type:"error",
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
          },

          function(isConfirm){

              if(isConfirm){
                  window.location = rutaOculta+"perfil";
              }
      });
    }else{
       var datosImagen = new FileReader;
       datosImagen.readAsDataURL(imagen); 
       $(datosImagen).on("load",function(event){
        var rutaImagen = event.target.result; 
        $(".previsualizar").attr("src",rutaImagen);
       });

    }
})