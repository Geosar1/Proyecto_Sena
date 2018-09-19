<form id="crear_productos">
    <h2 id="titulo">Productos</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Nombre Producto*</label>
                <input class="form-control" id="nombre_p" type="text" name="nombre" maxlength="50" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Cantidad</label>
                <input class="form-control" id="cantidad_p" type="number" name="cantidad" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Precio Venta</label>
                <input class="form-control" id="precio_p" type="number" name="precio" required>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Stock minimo</label>
                <input class="form-control" id="stock_p" type="number" name="stock" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Categoria*</label> <br>
                <select class="form-control" id="categorias_p" required>
                    <option value="">Seleccione</option>
                    <?php foreach($lista as $value): ?>
                    <option value="<?= $value->id_categoria ?>">
                        <?= $value->nombre_categoria ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>Proveedores</label> <br>
                <select class="form-control" id="proveedores_p" required>
                    <option value="">Seleccione</option>
                    <?php foreach($proveedores as $value): ?>
                    <option value="<?= $value->id_proveedor ?>">
                        <?= $value->nombre_empresa ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <input class="succes" type="submit" value="Guardar" id="guardar_producto">
            <input class="succes" type="button" value="Guardar Cambios" id="modificar_p">
            <input type="reset" value="Cancelar" id="cancelar">
        </div>
    </div>

    <div class="table-responsive">
        <table id="datos"></table>
    </div>
    <input type="button" value="Descargar a excel" id="enviar">
</form>

<div id="simpleModal" class="modal">
    <div class="modal-content">
        <div class="modal-body">
            <h3>Proveedores</h3>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <select class="form-control" id="proveedores_a">
                            <option value="">Seleccione</option>
                            <?php foreach($proveedores as $value): ?>
                            <option value="<?= $value->id_proveedor ?>">
                                <?= $value->nombre_empresa ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                        <input class="succes" id="agregar" type="button" value="Agregar">
                    </div>
                </div>
            </div>

            <h3>Proveedores añadidos:</h3>

            <div class="table-responsive">
                <table id="detalle"></table>
            </div>

            <button id="volver" type="button">Cerrar</button>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("select").select2();
    });

</script>
