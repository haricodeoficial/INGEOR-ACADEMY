<section id="carrito-de-compras">
    <div class="carrito">
        <div class="content center-div justify-content-center">
        <h1 style="color:white;">Carrito de compras</h1>
        </div>
    </div>
</section>
<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Mis productos</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
					    <thead class="thead-primary">
					      <tr>
					        <th>Producto</th>
					        <th>Precio</th>
					       
					      </tr>
					    </thead>
					    <tbody class="cuerpoCarrito">
					      
					     
                          
					    </tbody>
					<tbody>
						<tr class="sumaCarrito">
                          <th style="display:flex;" scope="row" class="scope border-bottom-0">
                          
                          
                          </th>
                          <td style="background:#eee; border-radius:10px;" class="border-bottom-0">
						  <div class="sumaSubTotal"></div>
						<?php
						if(isset($_SESSION["validarSesion"])){
							if($_SESSION["validarSesion"] == "ok"){
								echo'<a id="btnCheckout" href="checkout"><button class="btn btn-primary">REALIZAR PAGO</button></a>';
							}

						}else{
							echo'<a id="btnCheckout" href="ingreso"><button class="btn btn-primary">REALIZAR PAGO</button></a>';
						}
						?>

                        </td>

					        
					      </tr>
					</tbody>
					  </table>
					</div>
				</div>
			</div>
		</div>
	</section>
