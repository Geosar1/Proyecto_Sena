<h2> Consultar Pedidos </H2>
<hr />
<br />
<form action="">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <label for="">Cliente*</label>
                <select class="form-control" id="idcliente" required="true" name="ddlCliente" onchange="ConsultarPed(this.value)">

                    <option value=""> </option>

                    <?php foreach($clientes as $value): ?>
                    <option value="<?= $value->id_cliente?>">
                        <?=$value->numero_documento.'  '.$value->nombres_cliente.'  '.$value->apellidos_cliente?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <label for="">Fecha Inicio*</label>
                <input type="date" id="txtfechaInicio" class="form-control" name="txtfechaInicio" onchange="ConsultarPed(this.value)">
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">

                <label for="">Fecha Fin</label>
                <input type="date" id="txtfechaFin" class="form-control" name="txtfechaFin" onchange="ConsultarPed(this.value)">
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-12">
            <div class="form-group">
                <br />
                <input type="reset" name="btnLimpiarindex" id="btnLimpiarindex">

            </div>
        </div>
        <label>Los campos señalados con (*) son de caracter obligatorio.</label>
    </div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Detalle pedido</th>
                </tr>

            </thead>
            <tbody id="ped"></tbody>
        </table>

    </div>

    <input type="button" value="Descargar a excel" id="enviar">

</form>

<div id="simpleModals" class="modal">
    <div class="modal-contents">
        <div id="header-modal">
            <h3> Detalle Pedido </h3>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6 col-sx-6">
                    <div class="form-group">
                        <label for="">Fecha Pedido</label>
                        <input type="text" id="txtFecha" class="form-control" name="txtFecha" disabled="true">
                    </div>
                </div>
                <div class="col-lg- col-md-4 col-sm-6 col-sx-6">
                    <div class="form-group">
                        <label for="">Cliente</label>
                        <input type="text" id="txtCliente" class="form-control" name="txtTipoProveedor" disabled="true">
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
                        <th>Id Pedido</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="detallebodys">

                </tbody>
            </table>
        </div>
        <div id="footer-modal">
            <button id="volver" type="button">Cerrar</button>
        </div>
    </div>
</div>
