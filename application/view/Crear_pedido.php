<div class="container-fluid">

	<form action="<?= URL ?>pedido\guardar" method="POST" name="pedido" id="form_pedido">
			
			<h2> Crear Pedidos </h2>
			<hr />
		
				
				<div class="card bg-warning text-black col-sm-12 col-md-12 col-sx-12" id="ped1">
					<div class="card-body"><h4>Información General</h4>
					</div>
					<label>Los campos señalados con (*) son de caracter obligatorio.</label>
				</div>

				
					


				<div class="row">
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">

									<label for="cliente">Cliente*</label><br><br>

							<select class="form-control" id="ddlCliente" required ="true" name="ddlCliente" onchange = "direccion(this)">

								<option value="" > </option>

									<?php foreach($clientes as $value): ?>
									<option direc="<?= $value->direccion?>" tel= <?= $value->celular?> value="<?= $value->id_cliente?>"><?=$value->numero_documento.'  '.$value->nombres_cliente.'  '.$value->apellidos_cliente?></option>
									<?php endforeach; ?>
							</select>
						</div>
					</div>

							
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">
						<label for="">Dirección</label>
						<h3 id="dDir" class="form-control" disabled="true">-</h3>
						</div>
					</div>

							
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">
						<label for="">Teléfono</label>
						<h3 id="tTel" class="form-control" disabled="true">-</h3>
						</div>
					</div>
					
				</div>


				<div class="row">
					<div class="card bg-warning text-black col-sm-12 col-md-12">
						<div class="card-body"><h4>Información Pedido</h4>
						</div>

					</div>
					
				
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="container-fluid">
									<label for="TipoVenta"><h4>Tipo de venta* </h4></label>
									<input type="radio" required ="true" name="tipoVenta" id="credito" value= "credito">Crédito
									<input type="radio" required ="true" name="tipoVenta" id="contado" value= "contado">Contado
						</div>
					</div>


				
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">
					
								<label for="Fecha">Producto*</label><br><br>
								<select class="form-control" required ="true" id="ddlProducto" onchange = "ponerPrecio(this)">
							<option value="" ></option>
							<?php foreach($productos as $value): ?>
							<option cantidad= "<?= $value->existencia ?>"  precio= "<?= $value->precio_venta ?>" idP= "<?= $value->nombre_producto ?>" value="<?= $value->id_producto ?>"><?= $value->nombre_producto ?></option>
							<?php endforeach; ?>
								</select>
						</div>
					</div>

							
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">
							<label for="">Cantidades en existencia</label>
							<h3 id="cCantidades" class="form-control" disabled="true">0</h3>
						</div>
					</div>

							
							
							
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">
							<label for="">Precio</label>
							<h3 id="pPrecio" class="form-control" disabled="true">0</h3>
						</div>
					</div>
							

									
					

					
					<div class ="col-sm-6 col-md-4 col-lg-4 col-sx-12">
						<div class="form-group">

									<label for="">Cantidad*</label><br><br>
									<input type="number" class="form-control" name="cantidad" required ="true" pattern ="|0-9|" class="form-control" id="txtCantidad">
									
									<br><br>
									<button id="adicionar" class="succes" type="button">Adicionar al pedido</button>
									
									<p>Productos seleccionados
										<div id="adicionados">
									</p>
						
						</div>
					</div>
				</div>
					
								
				
				<div class="container-fluid">
						
				<table id="mytable" style="margin:0 auto;" >
					<thead>			
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Valor Unitario</th>
					<th>Subtotal</th>
					<th>Acciones</th>
				</tr>
					</thead>							
				</table>
					
				</div>		
					
								
					
						
		
								<label for="t"><h3>Total:</h3></label>
								<h3 id="gTotal">0</h3>
								<input type="hidden" id="totalInput" value="" name="totales">
								<label for="observaciones">Observaciones</label>
								<textarea name="observaciones" id="observaciones" cols="60"></textarea>
								<br><br>
								
								<button type="submit" name="btnEnviar" class="succes" >Guardar Pedido</button>
								
							
	</form>

</div>

<script>
$(document).ready(function(){
$("select").select2();

})
	
