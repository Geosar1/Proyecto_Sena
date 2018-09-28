<form id="registro_pre" action="" method="post">
    <h2 id="titulo">Proveedores</h2>
    <input type="hidden" id="id_proveedor" name="id">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Nombre de Empresa</label>
                <input type="text" class="form-control" id="nombre_em" name="txtnombre_em" maxlength="35" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Nombre de Contacto</label>
                <input type="text" class="form-control" id="nombre_con" name="txtnombre_con" maxlength="50" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Tipo de Documento</label>
                <select class="form-control" id="tipo_doc" name="txttipo_doc" required>
                    <option value="">Seleccione tipo de documento</option>
                    <option value="Cedula">Cédula</option>
                    <option value="NIT">NIT</option>
                </select>
            </div>

            <div class="col-md-4 form-group">
                <label>Número de Documento</label>
                <input type="text" class="form-control" name="txtnumero_doc" id="num_doc" maxlength="30" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 form-group">
                <label>Dirección</label>
                <input type="text" class="form-control" id="dc" name="txtdc" maxlength="30" autocomplete="off" required>
            </div>

            <div class="col-md-4 form-group">
                <label>Teléfono</label>
                <input type="number" class="form-control" id="tel" name="txttel" maxlength="13" autocomplete="off">
            </div>

            <div class="col-md-4 form-group">
                <label>Celular</label>
                <input type="number" class="form-control" id="cel" name="txtcel" maxlength="13" autocomplete="off" required>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 form-group">
                <input class="succes" id="guardar_proveedor" type="submit" value="Guardar" formaction="<?= URL ?>proveedor/guardar">
                <input class="succes" id="modificar_proveedor" type="submit" value="Guardar cambios" formaction="<?= URL ?>proveedor/modificar">
                <input id="cancelar_mod" type="reset" value="Cancelar">
            </div>
        </div>
    </div>

    <br>

    <div class="table-responsive">
        <table id="datos_proveedor"></table>
    </div>

    <input type="button" value="Descargar a excel" id="enviar">
</form>
