<form id="consulta_cartera">
    <input type="hidden" id="id-cliente">
    <h2 id="titulo">Consultar Cartera</h2>
    <hr />
    <select id="cedula">
        <option value="">Seleccione Cliente</option>
        <?php foreach($resultado as $value): ?>
        <option value="<?= $value->numero_documento ?>">
            <?= $value->nombres_cliente." ".$value->apellidos_cliente." Cedula:".$value->numero_documento ?>
        </option>
        <?php endforeach ?>
        ?>
    </select>

    <br>

    <input type="button" value="Limpiar" id="limpiar_cartera">
</form>

<form id="datos-cliente">
    <div>
       <h3>Datos</h3>
        <label>Nombre Cliente:</label> <br>
        <label id="nombre_cliente">""</label> <br>
        <label>Cartera Límite:</label> <br>
        <label id="cartera">0</label> <br>
        <label>Cartera Disponible:</label> <br>
        <label id="disponible">0</label> <br>
        <label>Valor del Pedido Pendiente:</label> <br>
        <label id="pedido">0</label>
    </div>

    <div class="table-responsive">
        <table id="historial"></table>
    </div>
</form>

<script>
    $(document).ready(function() {
        $("#cedula").select2();
    });

</script>
