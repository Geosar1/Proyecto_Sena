<form id="idindex">
    <h2>Consultar Compras</h2>
    <hr />
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <label for="">Proveedor</label>
                <select id="proveedor" class="form-control" onchange="ConsultarCompra(this.value)">
                    <option selected value="">Seleccionar</option>
                    <?php foreach($proveedores as $valor): ?>
                    <option value="<?= $valor->id_proveedor?>">
                        <?= $valor->nombre_empresa?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <label for="">Fecha Inicio</label>
                <input type="date" id="txtfechaInicio" class="form-control" name="txtfechaInicio" onchange="ConsultarCompra(this.value)">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <label for="">Fecha Fin</label>
                <input type="date" id="txtfechaFin" class="form-control" name="txtfechaFin" onchange="ConsultarCompra(this.value)">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <br />
                <button onclick="LimpiarForm2()" type="reset" class="btn btn primary " name="btnLimpiarindex" id="btnLimpiarindex">Limpiar
                </button>
            </div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Proveedor</th>
                <th>Total</th>
                <th>Ver Detalle</th>
            </tr>

        </thead>
        <tbody id="consultaCompra"></tbody>
    </table>
</form>

<div id="simpleModal-compra" class="modal">
    <div class="modal-contents">
        <div id="header-modal">
            <h3> Detalle Compra </h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                    <div class="form-group">
                        <label for="">Fecha Compra</label>
                        <input type="text" id="txtFecha" class="form-control" name="txtFecha" disabled="true">
                    </div>
                </div>
                <div class="col-lg- col-md-4 col-sm-6 col-sx-6">
                    <div class="form-group">
                        <label for="">Proveedor</label>
                        <input type="text" id="txtTipoProveedor" class="form-control" name="txtTipoProveedor" disabled="true">
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                    <div class="form-group">
                        <H1>TOTAL</H1>
                        <label for="" name="lbtotal" id="lbtotall">0</label>
                    </div>
                </div>

            </div>
            <table id="detalle">
                <thead>
                    <tr>

                        <th>Nombre Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="detallebodys">

                </tbody>
            </table>

        </div>
        <div id="footer-modal">
            <button id="volver-compra" type="button">Cerrar</button>
        </div>
    </div>
</div>
