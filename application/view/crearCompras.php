<div class="container-fluid">
    <form action=" <?= URL ?>compras/guardar" method="POST" id="idcrear">
    <h2>Crear Compras</h2>
    <hr />
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Proveedor*</label>
                    <select id="proveedor" class="form-control" onchange="listar_proveedor(this.value)">
                        <option selected value="">Seleccionar</option>
                        <?php foreach($proveedores as $valor): ?>
                        <option value="<?= $valor->id_proveedor?>">
                            <?= $valor->nombre_empresa?>
                        </option>
                        <?php endforeach ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Contacto</label>
                    <input type="text" id="txtContacto" class="form-control" name="txtContacto" disabled="true">
                    <input type="hidden" id="ddlproveedor" class="form-control" name="ddlproveedor">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Tipo Documento</label>
                    <input type="text" id="txtTipoDoc" class="form-control" name="txtTipoDocumento" disabled="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Documento</label>
                    <input type="text" id="txtDocumento" class="form-control" name="txtDocumento" disabled="true" pattern="(/d+)">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Celular</label>
                    <input type="text" id="txtCelular" class="form-control" name="txtCelular" disabled="true">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Dirección</label>
                    <input type="text" id="txtDireccion" class="form-control" name="txtDireccion" disabled="true">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Producto*</label>
                    <select name="ddlproducto" id="ddlproducto" class="form-control">
                        <option value="">Seleccionar</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Tipo Producto</label>
                    <input type="text" id="txtTipoProducto" class="form-control" name="txtTipoProducto" disabled="true">
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Precio Unitario*</label>
                    <input type="number" class="form-control" name="txtPrecio" id="txtPrecio" pattern="[0-9]{1,20}" title="Solo se permiten números ">

                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <label for="">Cantidad*</label>
                    <input type="number" class="form-control" name="txtCantidad" id="txtCantidad">
                    <label>Los campos señalados con (*) son de caracter obligatorio.</label>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                <div class="form-group">
                    <H1>TOTAL</H1>
                    <label for="" name="lbtotal" id="lbtotal">0</label>
                    <input type="hidden" name="total" id="total" value="0" />
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-sx-2">
                <div class="form-group">
                    <label for=""> </label>
                    <br />
                    <button onclick="agregarProducto()" type="button" class="succes">Agregar</button>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-2 col-sx-2">
                <div class="form-group">
                    <br />
                    <button onclick="LimpiarForm()" class="btn btn" type="reset" name="btnLimpiar" id="btnLimpiar">Cancelar
                    </button>
                </div>
            </div>


        </div>
        <table class="table" id="detalle">
            <thead>
                <tr>

                    <th>id Producto</th>
                    <th>Nombre Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody id="detallebody">

            </tbody>
        </table>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-sx-12">
                <div class="form-group">
                    <button type="submit" class="succes" name="guardarCompra" onClick="return validar();">Guardar
                    </button>

                </div>
            </div>
        </div>
    </form>
</div>
