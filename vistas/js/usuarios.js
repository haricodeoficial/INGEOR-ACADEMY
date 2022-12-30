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
});


//Comentarios

$(".calificarProducto").click(function(){
    var idComentario = $(this).attr("idComentario");
    $("#idComentario").val(idComentario);


});


$("input[name='puntaje']").change(function(){
   
    var puntaje = $(this).val();

    switch(puntaje){
        case "1":
            $("#estrellas").html('<select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\''+
            '<option value="">Select a rating</option>'+
            '<option value="5">Excellent</option>'+
            '<option value="4">Very Good</option>'+
            '<option value="3">Average</option>'+
            '<option value="2">Poor</option>'+
            '<option value="1" selected>Terrible</option></select>'+
            '</select>');
            var starRatingControl = new StarRating('.star-rating',{

                maxStars: 5,
                tooltip: 'Select a Rating',
                classNames: {
                  active: 'gl-active',
                  base: 'gl-star-rating',
                  selected: 'gl-selected',
                }
            
            });
            break; 
        case "2":
            $("#estrellas").html('<select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\''+
            '<option value="">Select a rating</option>'+
            '<option value="5">Excellent</option>'+
            '<option value="4">Very Good</option>'+
            '<option value="3">Average</option>'+
            '<option value="2" selected>Poor</option>'+
            '<option value="1">Terrible</option></select>'+
            '</select>');
            var starRatingControl = new StarRating('.star-rating',{

                maxStars: 5,
                tooltip: 'Select a Rating',
                classNames: {
                  active: 'gl-active',
                  base: 'gl-star-rating',
                  selected: 'gl-selected',
                }
            
            }); 
        break; 
        case "3":
            $("#estrellas").html('<select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\''+
            '<option value="">Select a rating</option>'+
            '<option value="5">Excellent</option>'+
            '<option value="4">Very Good</option>'+
            '<option value="3" selected>Average</option>'+
            '<option value="2">Poor</option>'+
            '<option value="1">Terrible</option></select>'+
            '</select>');
            var starRatingControl = new StarRating('.star-rating',{

                maxStars: 5,
                tooltip: 'Select a Rating',
                classNames: {
                  active: 'gl-active',
                  base: 'gl-star-rating',
                  selected: 'gl-selected',
                }
            
            }); 
        break; 
        case "4":
            $("#estrellas").html('<select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\''+
            '<option value="">Select a rating</option>'+
            '<option value="5">Excellent</option>'+
            '<option value="4" selected>Very Good</option>'+
            '<option value="3">Average</option>'+
            '<option value="2">Poor</option>'+
            '<option value="1">Terrible</option></select>'+
            '</select>');
            var starRatingControl = new StarRating('.star-rating',{

                maxStars: 5,
                tooltip: 'Select a Rating',
                classNames: {
                  active: 'gl-active',
                  base: 'gl-star-rating',
                  selected: 'gl-selected',
                }
            
            }); 
        break; 
        case "5":
            $("#estrellas").html('<select id="glsr-custom-options" class="star-rating" data-options=\'{"clearable":false, "tooltip":false}\''+
            '<option value="">Select a rating</option>'+
            '<option value="5" selected>Excellent</option>'+
            '<option value="4">Very Good</option>'+
            '<option value="3">Average</option>'+
            '<option value="2">Poor</option>'+
            '<option value="1">Terrible</option></select>'+
            '</select>');
            var starRatingControl = new StarRating('.star-rating',{

                maxStars: 5,
                tooltip: 'Select a Rating',
                classNames: {
                  active: 'gl-active',
                  base: 'gl-star-rating',
                  selected: 'gl-selected',
                }
            
            }); 
        break; 
    }
});

function validarComentario(){

	var comentario = $("#comentario").val();

	if(comentario != ""){

		var expresion = /^[,\\.\\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]*$/;

		if(!expresion.test(comentario)){

			$("#comentario").parent().before('<div class="alert alert-danger"><strong>ERROR:</strong> No se permiten caracteres especiales como por ejemplo !$%&/?¡¿[]*</div>');

			return false;

		}

	}else{

		$("#comentario").parent().before('<div class="alert alert-warning"><strong>ERROR:</strong> Campo obligatorio</div>');

		return false;

	}

	return true;

}


var starRatingControl = new StarRating('.star-rating',{

    maxStars: 5,
	tooltip: 'Select a Rating',
	classNames: {
      active: 'gl-active',
      base: 'gl-star-rating',
      selected: 'gl-selected',
    }

});


// Lista de deseos

$(".deseos").click(function(){

	var idProducto = $(this).attr("idProducto");
	console.log("idProducto", idProducto);

	var idUsuario = localStorage.getItem("usuario");
	console.log("idUsuario", idUsuario);

	if(idUsuario == null){

		swal({
		  title: "Debe ingresar al sistema",
		  text: "¡Para agregar un producto a la 'lista de deseos' debe primero ingresar al sistema!",
		  type: "warning",
		  confirmButtonText: "¡Cerrar!",
		  closeOnConfirm: false
		},
		function(isConfirm){
				 if (isConfirm) {	   
				    window.location = rutaOculta;
				  } 
		});

	}else{

        $(this).addClass("btn-danger");
  
		var datos = new FormData();
		datos.append("idUsuario", idUsuario);
		datos.append("idProducto", idProducto);
        console.log(rutaOculta);
		$.ajax({
			url:rutaOculta+"ajax/usuarios.ajax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
				console.log(respuesta);
							
			}

		})

	}

});


//Borar producto de lista de deseos
$(".quitarDeseo").click(function(){

	var idDeseo = $(this).attr("idDeseo");

	$(this).parent().parent().parent().remove();

	var datos = new FormData();
	datos.append("idDeseo", idDeseo);

	$.ajax({
			url:rutaOculta+"ajax/usuarios.ajax.php",
			method:"POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success:function(respuesta){
                console.log(respuesta);
			}

		});


})

//Eliminar usuario
$("#eliminarUsuario").click(function(){
    var id = $("#idUsuario").val();
    if($("#modoUsuario").val() == "directo"){
        if($("#fotoUsuario").val() != ""){
            var foto = $("#fotoUsuario").val();

        }
    }
    swal({
        title: "¿Está usted seguro(a) de eliminar su cuenta?",
        text: "¡Si borra esta cuenta ya no se puede recuperar!",
        type:"warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "¡Sí, borrar cuenta!",
        closeOnConfirm: false
      },

      function(isConfirm){

          if(isConfirm){
              window.location = "index.php?ruta=perfil&id="+id+"&foto="+foto;
          }
  });

})