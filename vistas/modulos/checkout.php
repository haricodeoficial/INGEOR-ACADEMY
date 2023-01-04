<section id="checkout">
<div class="check-banner">
    <center>
    <h1 style="color:#fff;">Realizar pago</h1>

    </center>
</div>
<div class="contenido-pago">
    <div class="buttons-check">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <center>
                    <i id="paypalIcon"class="fa-brands fa-cc-paypal"></i>
                    <input id="checkPaypal" type="radio" name="pago" value="paypal" checked>
                    
                    </center>
                </div>
                <div class="col-md-6">
                    <center>
                    <i id="cardIcon" class="fa-solid fa-credit-card"></i>
                    <input id="ebyGo" type="radio" name="pago" value="paypal" checked>
                    </center>
                </div>
            </div>
        </div>
    </div>

</div>
</section>




<section class="ftco-section listaProductos">
<h4 class="text-center well text-muted text-uppercase">Productos a comprar</h4>

		<div class="container">
			
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
					<table class="table tablaProductos">
					    <thead class="thead-primary">
					      <tr>
					        <th>Producto</th>
					        <th>Precio</th>
					       
					      </tr>
					    </thead>
                        <tbody class="cuerpoProductosCheck">


                        
                        </tbody>
					    <tbody class="cuerpoCheckout">
                     
								<tr>
									<td><strong>Total</strong></td>	
									<td><strong><span class="cambioDivisa">USD</span> $<span class="valorTotalCompra" valor="0">0</span></strong></td>	
								</tr>
                                <tr>
                                    <td>Divisa</td>
                                    <td>
                                    <div class="divisa">

                                        <select class="form-control" id="cambiarDivisa" name="divisa">
                                            


                                        </select>	

                                        <br>

                                    </div>

                                    </td>
                                   
                                </tr>
					     
                          
					    </tbody>
					
					  </table>
                   
					</div>
				</div>
			</div>
            <center>
            <button style="margin-top:20px; width:80%;"class="btn btn-primary btnPagar">REALIZAR PAGO</button>

            </center>

		</div>
	</section>