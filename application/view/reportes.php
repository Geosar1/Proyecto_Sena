<form>
    <h2>Reportes</h2>
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="exampleFormControlSelect1">Tipo reporte</label>
                <select id="reporte" class="form-control" id="exampleFormControlSelect1">
                    <option value="">Seleccione</option>
                    <option value="1">Clientes que mas compran</option>
                    <option value="2">Productos mas vendidos</option>
                    <option value="3">Productos mas comprados</option>
                    <option value="4">Ventas por ruta</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label for="">Fecha de inicio</label>
                <input id="inicio" type="date" class="form-control">
            </div>
            <div class="col-md-4 form-group">
                <label for="">Fecha fin</label>
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
        </div>
    </div>
    <input id="limpiar_reporte" type="reset" value="Limpiar">
</form>

<div id="informe">
    <div class="table-responsive">
        <table id="datos-reportes"></table>
    </div>

    <input type="button" value="Descargar a excel" id="enviar">
</div>

<script>
    $(document).ready(function() {
        $("#select_reportes").select2();
    });

</script>
