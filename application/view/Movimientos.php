<form id="form-movimientos" method="post" action="<?= URL ?>movimientos/guardar">
    <h2 id="titulo2">Movimientos</h2>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Tipo de Movimiento*</label>
                <select class="form-control" id="mov" name="mov" required>
                    <option value="">Seleccione</option>
                    <option value="baja">Dada de Baja</option>
                    <option value="pedido">Devolución de Pedido</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>ID Pedido*</label>
                <input name="pedido" type="number" class="form-control" id="pedido">
            </div>

            <div class="col-md-4 form-group">
                <label>Producto*</label>
                <select class="form-control" name="producto" id="producto_mov" required>
                    <option value="">Seleccione</option>
                    <?php foreach($pro as $value): ?>
                    <option value="<?= $value->id_producto ?>">
                        <?= $value->nombre_producto ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>


        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Cantidad*</label>
                <input type="number" class="form-control" name="cantidad" id="cantidad_mov" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Descripción*</label>
                <input class="form-control" name="descripcion" type="text" id="descripcion_mv" maxlength="50" autocomplete="off" required>
            </div>
        </div>
        <label>Los campos señalados con (*) son de caracter obligatorio.</label>
    </div>

    <input class="succes" type="submit" value="Guardar" id="guardar_mv">
    <input id="reset_mov" type="reset" value="Limpiar">

    <div class="table-responsive">
        <table id="datos_mov"></table>
    </div>
    <input type="button" value="Descargar a excel" id="enviar">
</form>

<script>
    $(document).ready(function() {
        $("#producto_mov").select2();
    });

</script>
