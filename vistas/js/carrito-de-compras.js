/*==================================================
====================================================
====================================================
====================================================
VISUALIZAR LOS PRODUCTOS EN LA PÁGINA CARRITO DE COMPRAS
====================================================*/

if(localStorage.getItem("cantidadCesta")!= null){
    $(".cantidadCesta").html(localStorage.getItem("cantidadCesta"));
    $(".sumaCesta").html(localStorage.getItem("sumaCesta"));
}else{
    $(".cantidadCesta").html("0");
    $(".sumaCesta").html("0");
}


if(localStorage.getItem("listaProductos") != null){
var listaCarrito = JSON.parse(localStorage.getItem("listaProductos"));
listaCarrito.forEach(funcionForEach);
    function funcionForEach(item, index){

        $(".cuerpoCarrito").append('<tr>'+
        '<th style="display:flex;" scope="row" class="scope border-bottom-0">'+
        '<div class="row">'+'<div class="col-md-3">'+
        '<button class="button-eliminar-en-canasta btn btn-primary quitarItemCarrito" idProducto="'+item.idProducto+'"><i class="fa-solid fa-rectangle-xmark"></i></button>'+
        '<img style="padding-left:15px;" class="producto-img-carrito" src="'+item.imagen+'" alt="producto">'+
        '</div>'+ 
        '<div class="col-md-9">'+
        '<p class="tituloCarritoCompra" style="margin-top:20px;" titulo-articulo="'+item.titulo+'"><span>'+item.titulo+'</span></p>'+
        '</div>'+
        '</div>'+
        '</th>'+
        '<td class="border-bottom-0 precioCarritoCompra subtotales" precio-articulo="'+item.precio+'">USD$<span>'+item.precio+'</span></td>'+
        '</tr>'
        );
        $(".cuerpoProductosCheck").append('<tr>'+
        '<th style="display:flex;" scope="row" class="scope border-bottom-0">'+
        '<div class="row">'+'<div class="col-md-3">'+
        '<img style="padding-left:15px;" class="producto-img-carrito" src="'+item.imagen+'" alt="producto">'+
        '</div>'+ 
        '<div class="col-md-9">'+
        '<p class="tituloCarritoCompra" style="margin-top:20px;" titulo-articulo="'+item.titulo+'"><span>'+item.titulo+'</span></p>'+
        '</div>'+
        '</div>'+
        '</th>'+
        '<td class="border-bottom-0 precioCarritoCompra subtotales" precio-articulo="'+item.precio+'">USD$<span>'+item.precio+'</span></td>'+
        '</tr>')
    }

}else{
    $(".cuerpoCarrito").append('<h2>No hay cursos añadidos a la cesta</h2>');
    $(".sumaCarrito").hide();

}


/*==================================================
====================================================
====================================================
====================================================
AGREGAR AL CARRITO
====================================================*/

$(".agregarCarrito").click(function(){
    var idProducto = $(this).attr("idProducto");
    var imagen = $(this).attr("imagen");
    var titulo = $(this).attr("titulo");
    var precio = $(this).attr("precio");
    var agregarAlCarrito = true; 



    if(agregarAlCarrito){
            //Recuperar almacenamiento del LocalStorage
        if(localStorage.getItem("listaProductos") == null){
            listaCarrito = [];

        }else{
            var listaProductos = JSON.parse(localStorage.getItem("listaProductos"));
            for(var i = 0; i<listaProductos.length; i++){
                if(listaProductos[i]["idProducto"] == idProducto){
                    swal({
                        title: "¡EL producto ya está agregado al carrito!",
                        text: "",
                        type:"warning",
                        showCancelBUtton: false, 
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "¡Volver!",
                        closeOnConfirm: false
                      
                  })
                  return;
                }
            }
            listaCarrito.concat(localStorage.getItem("listaProductos"));
        }
        listaCarrito.push({"idProducto":idProducto,
        "imagen":imagen,
        "titulo":titulo,
        "precio":precio
        });

        localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));
        //Actualizar la cesta
        var cantidadCesta = Number($(".cantidadCesta").html())+1;
        var sumaCesta = Number($(".sumaCesta").html()) + Number(precio);
        $(".cantidadCesta").html(cantidadCesta);
        $(".sumaCesta").html(sumaCesta);
        localStorage.setItem("cantidadCesta",cantidadCesta);
        localStorage.setItem("sumaCesta",sumaCesta);
        //Mostrar alerta de que el producto ya fue agregado
    swal({ 
        title: "",
        text: "¡Se ha agregado un nuevo producto al carrito de compras!",
        type:"success",
        showCancelButton:true,
        confirmButtonText:"#DD6B55",
        cancelButtonText:"¡Continuar comprando!",
        confirmButtonText:"¡Ir a mi carrito de compras!",
        closeOnConfirm: false

      },

      function(isConfirm){

          if(isConfirm){
             window.location = rutaOculta+"carrito-de-compras";
          }
  });
    }

    
    //Almacenar en el localStorage los productos agregados al carrito
    
})



/*==================================================
====================================================
====================================================
====================================================
QUITAR PRODUCTOS DEL CARRITO
====================================================*/

$(document).on("click",".quitarItemCarrito",function(){
    $(this).parent().parent().parent().parent().remove();
    var idProducto = $(".cuerpoCarrito button");
    var imagen = $(".cuerpoCarrito img");
    var titulo = $(".cuerpoCarrito .tituloCarritoCompra span");
    var precio = $(".cuerpoCarrito .precioCarritoCompra span");
    var cantidadCesta = localStorage.getItem("cantidadCesta"); 
    if(cantidadCesta >= 0){
        var cantidadCesta = Number($(".cantidadCesta").html())-1;

    }
    localStorage.setItem("cantidadCesta",cantidadCesta);
    $(".cantidadCesta").html(cantidadCesta);

    //Si aún quedan productos volverlos agregar al carrito (localStorage)
    listaCarrito = [];
    if(idProducto.length != 0){
        for(var i = 0; i<idProducto.length; i++){
            var idProductoArray =$(idProducto[i]).attr("idProducto");
            var imagenArray =$(imagen[i]).attr("src");
            var tituloArray = $(titulo[i]).html();
            var precioArray = $(precio[i]).html();

            listaCarrito.push({"idProducto":idProductoArray,
        "imagen":imagenArray,
        "titulo":tituloArray,
        "precio":precioArray
        });
        }
        localStorage.setItem("listaProductos",JSON.stringify(listaCarrito));

    }else{
            //Si ya no quedan productos hay que remover todo
            localStorage.removeItem("listaProductos");
            localStorage.setItem("cantidadCesta","0");
            localStorage.setItem("sumaCesta","0");
            $(".cantidadCesta").html("0");
            $(".sumaCesta").html("0");
            $(".cuerpoCarrito").append('<h2>No hay cursos añadidos a la cesta</h2>');
            $(".sumaCarrito").hide();

    }

    sumaSubtotales();

})
/*==================================================
====================================================
====================================================
====================================================
MÉTODO DE PAGO PARA CAMBIO DE DIVISA
====================================================*/

var metodoPago = "paypal";
divisas(metodoPago);
$("input[name='pago']").change(function(){
    var metodoPago = $(this).val();
    divisas(metodoPago);
    if(metodoPago == "payu"){

		$(".btnPagar").hide();
		//$(".formPayu").show();

		//pagarConPayu();

	}else{

		$(".btnPagar").show();
		//$(".formPayu").hide();

	}
})


/*==================================================
====================================================
====================================================
====================================================
FUNCIÓN PARA EL CAMBIO DE DIVISA
====================================================*/
function divisas(metodoPago){
if(metodoPago == "paypal"){
    $("#cambiarDivisa").append('<option value="USD">USD</option>'+
    '<option value="EUR">EUR</option>'+
    '<option value="GBP">GBP</option>'+
    '<option value="MXN">MXN</option>'+
    '<option value="JPY">JPY</option>'+
    '<option value="CAD">CAD</option>'+
    '<option value="BRL">BRL</option>');
}else{
    $("#cambiarDivisa").append('<option value="USD">USD</option>'+
    '<option value="EUR">EUR</option>'+
    '<option value="GBP">GBP</option>'+
    '<option value="MXN">MXN</option>'+
    '<option value="JPY">JPY</option>'+
    '<option value="CAD">CAD</option>'+
    '<option value="BRL">BRL</option>');
}
}
/*==================================================
====================================================
====================================================
====================================================
CAMBIO DE DIVISA  ---- API PENDIENTE
====================================================*/
var divisaBase = "USD";

$("#cambiarDivisa").change(function(){
    var divisa = $(this).val();
    $.ajax({
		url: "http://free.currencyconverterapi.com/api/v3/convert?q="+divisaBase+"_"+divisa+"&compact=y",
        type:"GET",
		cache: false,
	    contentType: false,
	    processData: false,
	    dataType:"jsonp",
        success:function(respuesta){
            var divisaString = JSON.stringify(respuesta);
            var conversion = divisaString.substr(18,4);
            console.log("conversion",conversion);
        }
    })
})



/*==================================================
====================================================
====================================================
====================================================
SUMA DE TODOS LOS SUBTOTALES
====================================================*/
sumaSubtotales();
function sumaSubtotales(){
    var subtotales = $(".subtotales span");
    var arraySumaSubtotales =[];
    for(var i = 0; i<subtotales.length;i++){
        var sumSubtotalesArray = $(subtotales[i]).html();
        arraySumaSubtotales.push(Number(sumSubtotalesArray));
    }
    function sumaArraySubtotales(total,numero){
        return total + numero; 
    }
    var sumaTotal = arraySumaSubtotales.reduce(sumaArraySubtotales);
    $(".sumaSubTotal").html('<h2>Total: USD$<span>'+sumaTotal+'</span></h2>'+
    '');   
    $(".valorTotalCompra").html(''+sumaTotal+'');
}

/*==================================================
====================================================
====================================================
====================================================
CHECKOUT
====================================================*/
