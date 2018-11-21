<form>
    <h2>Reportes</h2>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="exampleFormControlSelect1">Tipo de Reporte*</label>
                <select id="reporte" class="form-control" id="exampleFormControlSelect1">
                    <option value="">Seleccione</option>
                    <option value="1">Clientes que más Compran</option>
                    <option value="2">Productos más Vendidos</option>
                    <option value="3">Productos más Comprados</option>
                    <option value="4">Ventas por Ruta</option>
                    <option value="5">Movimientos</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="">Fecha de Inicio*</label>
                <input id="inicio" type="date" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label for="">Fecha Fin</label>
                <input id="fin" type="date" class="form-control">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Ruta*</label>
                <select class="form-control" id="select_reportes" name="ide_r" required>
                    <option value="">Seleccione</option>
                    <?php foreach($resultado as $value): ?>
                    <option value="<?= $value->id_ruta ?>">
                        <?= $value->nombre_ruta ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>Producto</label>
                <select class="form-control" name="producto" id="producto_report" required>
                    <option value="">Seleccione</option>
                    <?php foreach($pro as $value): ?>
                    <option value="<?= $value->id_producto ?>">
                        <?= $value->nombre_producto ?>
                    </option>
                    <?php endforeach ?>
                </select>
            </div>
        </div>
        <label>Los campos señalados con (*) son de caracter obligatorio.</label>
    </div>
    <input id="limpiar_reporte" type="reset" value="Limpiar">
</form>

<div id="informe">
    <div class="table-responsive">
        <table id="datos-reportes"></table>
    </div>

    <input type="button" value="Descargar a Excel" id="enviar">
</div>

<script>
    $(document).ready(function() {
        $("#select_reportes").select2();
        $("#producto_report").select2();
    });
</script>
