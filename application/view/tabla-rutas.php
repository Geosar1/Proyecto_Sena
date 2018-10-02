<form id="form_editar" action="<?= URL ?>ruta/modificarr" method="post">
    <input type="hidden" name="txxtId" id="txxtId">
    <h2>Modificar Ruta</h2>
    <hr />
    <div class="container">
        <div class="row">
            <div class="col-md-4 form-group">
                <label for="">Nombre de Ruta</label>
                <Input autocomplete="off" type="text" class="form-control" id="txtNombre" name="txtNombre">
            </div>

            <div class="col-md-4 form-group">
                <label for="">Municipio</label>
                <select class="form-control" name="ddlMuni" id="ddlMuni">
                    <option value="">Seleccione</option>
                    <?php foreach($rut as $value): ?>
                    <option value="<?= $value->id_municipio ?>">
                        <?= $value->nombre_municipio?>
                    </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="col-md-4 form-group">
                <label for="">Barrio </label>
                <select class="form-control" name="ddlbarri" id="ddlbarri">
                    <option value="">Seleccione </option>
                </select>
            </div>

        </div>
        <div class="container">
            <div class="row">
                <button type="submit" class="succes">Guardar Cambios</button>
            </div>
        </div>
    </div>
</form>

<div id="inicio_ruta">
    <h2 id="titulo">Rutas</h2>
    <hr />
    <input class="succes" id="cr" type="submit" value="Crear Ruta">
</div>

<form>
    <div id="tabla_rutas" class="table-responsive">
        <table id="rruta">
            <thead>
                <tr>
                    <th>Nombre de Ruta</th>
                    <th>Barrio</th>
                    <th>Municipio</th>
                    <th>Estado</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($ruta as $value): ?>
                <tr>
                    <td>
                        <?= $value->nombre_ruta?>
                    </td>
                    <td>
                        <?= $value->nombre_barrio?>
                    </td>
                    <td>
                        <?= $value->nombre_municipio?>
                    </td>
                    <td>
                        <?= $value->estado==1?"Activo":"Inactivo" ?>
                    </td>
                    <td>
                        <button class="modificar" value="<?= $value->id_ruta ?>" id="tedi"> Editar </button>
                    </td>
                    <td>
                        <?php if($value->estado==1): ?>

                        <input style="background-color: red" type="submit" formaction="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/0" value="Inactivar">
                        <?php else: ?>
                        <input style="background-color: green" type="submit" formaction="<?= URL ?>ruta/estado/<?= $value->id_ruta ?>/1" value="Activar">
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div> <br>
    <input type="button" value="Descargar a Excel" id="enviar">
</form>
