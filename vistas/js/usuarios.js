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

    //Validar políticas de privacidad
    var politicas = $("#regPoliticas:checked").val();

    if(politicas != "on"){
        $("#regPoliticas").parent().before('<div class="alert alert-warning"><strong>ATENCIÓN: </strong>Debe aceptar nuestras condiciones de uso y políticas de privacidad.</div>');
        return false; 

    }
    return true; 
}