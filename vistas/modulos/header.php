<?php
$urlServidor = ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

session_start();

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
		
			localStorage.setItem("usuario.","'.$_SESSION["id"].'");

		</script>';

	}

}

?>
<nav class="navbar navbar-expand-lg fixed-top">
<a class="responsive-logo"href="<?php echo $url;?>">
   <img class="logo-principal" src="<?php echo $url;?>vistas/img/logoLetras.png" alt="logo">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <i style="color:#fff;" class="fa-solid fa-bars"></i>
         </button>
            <div class="input-group input-group-search mx-auto" id="buscador">
               <input type="search" name="buscar" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="search-button-addon">
               <div class="input-group-append">

                 <a href="<?php echo $url;?>buscador">
                 <button class="btn-search btn" type="submit" id="search-button-addon">
                  <i class="fa-solid fa-magnifying-glass"></i>
               </button>
               </a> 
               </div>
            </div>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
               <?php
                  if(isset($_SESSION["validarSesion"])){
                     if($_SESSION["validarSesion"] == "ok"){
                         if($_SESSION["modo"] == "directo"){ 
                           echo' <li class="nav-item cart">
                           <div class="pup"><p class="cantidadCesta" style="font-size:15px; font-weight:700; padding-left:5px;"></p></div>
                           <a href="carrito-de-compras"><i class="fa-solid fa-cart-shopping"></i></a>
                           </li>
                           <li class="nav-item favorite">
                           <a href="perfil"><i class="fa-solid fa-heart"></i></a>
                           </li>';
                           if($_SESSION["foto"] != ""){
                              echo'<li class="nav-item">
                              <img class="img-circle" src="'.$url.$_SESSION["foto"].'">
                              </li>';
                           }else{
                              echo'<li class="nav-item" style="width:max-content;">
                              <img class="img-circle" src="'.$urlServidor.'vistas/img/usuarios/default/perfil.png">


                              </li>';
                           }

                         
                         }else if($_SESSION["modo"] =="facebook"){
                           echo'<li class="nav-item">
                              <img class="img-circle" src="'.$url.$_SESSION["foto"].'">
                              </li>';
                         }
                         echo '
                         <li class="nav-item"><a href="'.$url.'perfil"class="button-5" style="width:115px;margin: 0px 0px 0px 15px;">Ver perfil</a></li>
                         <li class="nav-item"><a href="'.$url.'salir" class="button-6" style="width:100px;">Salir</a></li>

                         ';
                     }

                  }else{
                     echo '
                    
                     <li class="nav-item">
                      <a href="registrar" class="button-5">Registrar</a>
                     </li>
                     <li class="nav-item">
                     <a href="iniciar-sesion" class="button-6">Iniciar Sesión</a>
      
                     </li>
                     
                     '; 
                  }
               ?>
              
               
            </ul>

         </div>
       
</nav>