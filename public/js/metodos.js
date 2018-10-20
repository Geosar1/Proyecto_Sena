var id;
var proveedores;
var contador = 0;
var lista = [];

//Movimientos
function buscar_movimientos(consulta, consulta2) {
    $.ajax({
            url: uri + '/movimientos/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                movimiento: consulta,
                producto_id: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos_mov').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Productos
function buscar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: $('#nombre_p').val(),
                categoria: $('#categorias_p').val(),
                proveedor: $('#proveedores_p').val(),
            },
        })
        .done(function (respuesta) {
            $('#datos').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function consultar_producto() {
    $.ajax({
            url: uri + '/producto/consultar_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: $('#nombre_p').val(),
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no") {
                guardar_producto();
            } else {
                mensaje = respuesta;
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_producto() {
    $.ajax({
            url: uri + '/producto/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: $('#nombre_p').val(),
                cantidad: $('#cantidad_p').val(),
                precio: $('#precio_p').val(),
                stock: $('#stock_p').val(),
                idc: $('#categorias_p').val(),
                idp: $('#proveedores_p').val()
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no" || respuesta == "No se guardo") {
                mensaje = "Error al ejecutar la accion";
            } else {
                mensaje = "Producto registrado correctamente";
                $('#crear_productos').trigger('reset');
                $('select').val('').trigger('change');
                buscar_producto();
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });  
}

function cambiar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/estado_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del producto cambiado correctamente";
                ver_alerta();

                var buscar = $('#nombre_p').val();
                var buscar2 = $("#categorias_p").val();

                if (buscar != "" || buscar2 != "") {
                    buscar_producto(buscar, buscar2);
                } else {
                    buscar_producto();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_producto(consulta) {
    $.ajax({
            url: uri + '/producto/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_p').val(contenido.nombre_producto);
            $('#cantidad_p').val(contenido.existencia);
            $('#stock_p').val(contenido.stock_minimo);
            $('#precio_p').val(contenido.precio_venta);
            $("#categorias_p").val(contenido.id_categoria);
            $("#categorias_p option[text=" + contenido.nombre_categoria + "]").attr("selected", "selected");
            buscar_producto($('#nombre_p').val(), $('#categorias_p').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_producto() {
    $.ajax({
            url: uri + '/producto/modificar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: $('#nombre_p').val(),
                cantidad: $('#cantidad_p').val(),
                precio: $('#precio_p').val(),
                stock: $('#stock_p').val(),
                idc: $('#categorias_p').val(),
                id: id,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                limpiar_productos();
                mensaje = "Se modifico correctamente";
                ver_alerta();
                $('#guardar_producto').show();
                $('#modificar_p').hide();
                buscar_producto();
            } else {
                mensaje = "Error al ejecutar la accion,intentelo de nuevo";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function ver_agotados() {
    $.ajax({
            url: uri + '/producto/agotados',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
            $('#table-ver').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Detalle Productos
function guardar_detalle() {
    $.ajax({
            url: uri + '/Detalle/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                id: id,
                idpro: $('#proveedores_a').val(),
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                listar_detalle();
                mensaje = "Se creo correctamente";
                ver_alerta();
            } else {
                mensaje = "Este proveedor ya fue asignado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function listar_detalle() {
    $.ajax({
            url: uri + '/Detalle/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                id: id,
            },
        })
        .done(function (respuesta) {
            $('#detalle').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/estado_detalle',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado cambiado correctamente";
                ver_alerta();
                listar_detalle(id);
            } else {
                mensaje = "Error al cambiar el estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Categorias
function buscar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/tabla_categorias',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_c').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/guardar_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            if (respuesta == "Ya existe") {
                mensaje = respuesta;
                ver_alerta();
            } else {
                mensaje = "Se guardo la categoria correctamente";
                ver_alerta();
                $('#nombre_c').val("");
                buscar_categoria();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/Categoria/estado_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado de la categoria cambiado correctamente";
                ver_alerta();

                var buscar = $('#nombre_c').val();

                if (buscar != "") {
                    buscar_categoria(buscar);
                } else {
                    buscar_categoria();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/editar_categoria',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_c').val(contenido.nombre_categoria);
            buscar_categoria($('#nombre_c').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/categoria/modificar_categoria',
            type: 'POST',
            data: {
                id: consulta,
                nombre: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                $('#nombre_c').val("");
                mensaje = "Categoria modificada correctamente";
                ver_alerta();
                buscar_categoria();
                $('#guardar_c').show();
                $('#modificar_c').hide();
            } else {
                mensaje = respuesta;
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Cartera
function consultar_cartera(consulta) {
    $.ajax({
            url: uri + '/Cartera/buscar',
            type: 'POST',
            data: {
                cedula: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id-cliente').val(contenido.id_cliente);
            $('#nombre_cliente').html(contenido.nombres_cliente + " " + contenido.apellidos_cliente);
            $('#cartera').html(contenido.cartera);
            $('#disponible').html((contenido.cartera) - (contenido.valor_total));
            $('#pedido').html(contenido.valor_total);
            consultar_historial();
        })
        .fail(function () {
            console.log("error");
        });
}

function consultar_historial() {
    $.ajax({
            url: uri + '/cliente/historial',
            type: 'POST',
            data: {
                doc: $('#cedula').val(),
            },
        })
        .done(function (respuesta) {
            $('#historial').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Login
function consultar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/Login/buscar',
            type: 'POST',
            dataType: 'html',
            data: {
                usuario: consulta,
                clave: consulta2,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "usuario incorrecto") {
                mensaje = respuesta;
                ver_fail();
            } else {
                window.location = uri + '/Login/menu';
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function recuperar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/Login/recuperar',
            type: 'POST',
            dataType: 'html',
            data: {
                usuario: consulta,
                clave: consulta2,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "usuario incorrecto") {
                mensaje = "Los datos ingresados no existen";
                ver_fail();
            } else {
                id = respuesta;
                $('.modal-content').slideToggle();
                $('#simpleModalPass').show(function () {
                    $('.modal-content').slideDown();
                });
                $('#user').attr("placeholder", "Usuario");
                $('#key').attr("placeholder", "Contraseña");
                $('#key').get(0).type = 'password';
                $('#mensaje_recuperacion').hide();
                $('#entrar').show();
                $('#recuperar').hide();
                $('#user').val("");
                $('#key').val("");
                $("#checkbox2").prop('checked', false);
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cerrar() {
    $.ajax({
            url: uri + '/Login/cerrar',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
            if (respuesta == "Se cerro") {
                window.location = uri + '/Login/index';
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Proveedores
function buscar_proveedor(consulta) {
    $.ajax({
            url: uri + '/proveedor/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_proveedor').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_proveedor(consulta) {
    $.ajax({
            url: uri + '/proveedor/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_proveedor').val(contenido.id_proveedor);
            $('#nombre_em').val(contenido.nombre_empresa);
            $('#nombre_con').val(contenido.nombre_contacto);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#dc").val(contenido.direccion);
            $("#tel").val(contenido.telefono);
            $("#cel").val(contenido.celular);
            buscar_proveedor($('#nombre_em').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_proveedor(consulta, consulta2) {
    $.ajax({
            url: uri + '/proveedor/estado_proveedor',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del proveedor cambiado correctamente";
                ver_alerta();

                var buscar = $('#nombre_em').val();

                if (buscar != "") {
                    buscar_proveedor(buscar);
                } else {
                    buscar_proveedor();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Usuarios
function buscar_usuario(consulta) {
    $.ajax({
            url: uri + '/usuario/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_usuario').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_usuario(consulta) {
    $.ajax({
            url: uri + '/usuario/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_usuario').val(contenido.id_usuario);
            $('#nombres').val(contenido.nombres_usuario);
            $('#apellidos').val(contenido.apellidos_usuario);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#tipo_usu").val(contenido.rol_usuario);
            $("#user").val(contenido.usuario);
            $("#fec_exp").val(contenido.expedicion_cedula);
            buscar_usuario($('#nombres_us').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/usuario/estado_usuario',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del usuario cambiado correctamente";
                ver_alerta();

                var buscar = $('#nombres_us').val();

                if (buscar != "") {
                    buscar_usuario(buscar);
                } else {
                    buscar_usuario();
                }
            } else {
                mensaje = "Error al cambiar el estado del usuario";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_contrasena(consulta) {
    $.ajax({
            url: uri + '/usuario/cambiar_clave',
            type: 'POST',
            data: {
                clave: consulta,
                id: id,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "Si") {
                mensaje = "Clave cambiada correctamente";
                ver_alerta();
                ver_success();
                $('.modal-content').slideToggle(function () {
                    $('#simpleModalPass').hide();
                    $('#cambiopass').val("");
                });
            } else {
                mensaje = "Error";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Clientes
function buscar_cliente(consulta, consulta2, consulta3, consulta4) {
    $.ajax({
            url: uri + '/cliente/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                nombre: consulta,
                apellidos: consulta4,
                ruta: consulta2,
                documento: consulta3,
            },
        })
        .done(function (respuesta) {
            $('#datos_cliente').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_cliente(consulta) {
    $.ajax({
            url: uri + '/cliente/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#id_cliente').val(contenido.id_cliente);
            $('#nombres_c').val(contenido.nombres_cliente);
            $('#apellidos').val(contenido.apellidos_cliente);
            $('#tipo_doc').val(contenido.tipo_documento);
            $('#num_doc').val(contenido.numero_documento);
            $("#dc").val(contenido.direccion);
            $("#cartera_dis").val(contenido.cartera);
            $("#cel").val(contenido.celular);
            $("#select_r").val(contenido.id_ruta);
            buscar_cliente($('#nombres_c').val(), $('#select_r').val(), $('#num_doc').val(), $('#apellidos').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_cliente(consulta, consulta2) {
    $.ajax({
            url: uri + '/cliente/estado_cliente',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del cliente cambiado correctamente";
                ver_alerta();

                var buscar = $('#nombres_c').val();

                if (buscar != "") {
                buscar_cliente($('#nombres_c').val(), $('#select_r').val(), $('#num_doc').val(), $('#apellidos').val());
                } else {
                    buscar_cliente();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//limpiar session
function limpiar() {
    $.ajax({
            url: uri + '/login/limpiar',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
            console.log(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//ajax consulta pedido
function ConsultarDetalleP(id) {
    $.ajax({
        Type: "get",
        dataType: "json",
        url: uri + "/pedido/ConsultarDetalleP/" + id
    }).done(detallepedido => {
        if (detallepedido.length > 0) {
            $("#detallebodys").empty();

            detallepedido.forEach((e, i) => {
                $("#txtFecha").val(e.fecha_de_creacion);
                $("#txtCliente").val(e.id_cliente);
                $("#lbtotall").html(e.valor_total);

                $("#detallebodys").append(
                    `<tr>
              <td>${e.id_pedido}</td>
              <td>${e.precio_venta}</td>
              <td>${e.cantidad}</td>
              <td>${e.subtotal_pedido}</td>
            </tr>`
                );
            });

            $("#Modal_Pedido").modal();
        } else {
            mensaje = "no tiene pedidos";
            ver_alerta();
        }
    });
}

function ConsultarPed() {
    $.ajax({
        Type: "get",
        dataType: "json",
        url: uri + "pedido/ConsultarpedidoParametros",
        data: {
            idcliente: $("#idcliente").val(),
            fechaInicio: $("#txtfechaInicio").val(),
            fechaFin: $("#txtfechaFin").val()
        }
    }).done(consultapedidos => {
        if (consultapedidos.length > 0) {
            $("#ped").empty();

            consultapedidos.forEach((e, i) => {
                var texto;
                var color;
                if (e.estado_pedido == 1) {
                    texto = "Pendiente";
                    color = "green";
                } else if (e.estado_pedido == 2) {
                    texto = "Entregado";
                    color = "#f04124";
                }
                $("#ped").append(
                    `<tr>
              <td>${e.fecha_de_creacion}</td>
              <td>${e.nombres_cliente+" "+e.apellidos_cliente}</td>
              <td>${e.valor_total}</td>
              <td>${e.estado_pedido}</td>

              <td>
           <button class="detalle" id="ver-detalle" value="${e.id_cliente}">Ver detalle</button>
              </td>
            <td>
           <button style='background-color:${color}' id="Estado_pedido" value="${e.id_pedido}">${texto}</button>
              </td>
            <td>
           <button style='background-color:red' id="Estado_pedido" value="${e.id_pedido}">Cancelar</button>
              </td>
              </tr>`
                );
            });
        } else {
            mensaje = "no hay registros para el rango seleccionado";
            ver_alerta();
        }
    });
}

function cambiar_pedido(consulta, consulta2) {
    $.ajax({
            url: uri + '/pedido/cambiar_estado',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del pedido cambiado correctamente";
                ver_alerta();
                ConsultarPed();
            } else {
                mensaje = "Error al cambiar estado";
                ver_alerta();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function buscar_pedido(consulta) {
    $.ajax({
            url: uri + '/pedido/buscar_pedido',
            type: 'POST',
            dataType: 'html',
            data: {
                pedido: consulta,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no") {
                mensaje = "No se encontro el pedido ingresado";
                ver_alerta();
            } else {
                $('#producto_mov').html(respuesta);
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//listar barrios por municipios
function buscarBarrios(consulta) {
    $.ajax({
            url: uri + '/Ruta/consultar_barrio',
            type: 'POST',
            datatype: 'HTML',
            data: {
                id: consulta,
            },
        })
        .done(function (datos) {
            $('#ddlbarri').html(datos);
        })

        .fail(function () {
            console.log("error");
        });
}

//ediar barrios
function editarBarrios(consulta) {
    $.ajax({
            url: uri + '/Ruta/editar',
            type: 'POST',
            datatype: 'HTML',
            data: {
                id: consulta,
            },
        })
        .done(function (datos) {
            var contenido = jQuery.parseJSON(datos);
            $('#txxtId').val(contenido.id_ruta);
            $('#txtNombre').val(contenido.nombre_ruta);
            $('#ddlMuni').val(contenido.id_municipio);
            buscarBarrios(contenido.id_municipio);
            $('#ddlbarri').val(contenido.id_barrio);
        })

        .fail(function () {
            console.log("error");
        });
}

//Compras
function listar_proveedor(Code) {
    $.ajax({
        Type: "get",
        dataType: "json",
        url: uri + "/compras/Consultarproveedor/" + Code
    }).done(respuesta => {
        $("#ddlproducto").empty();

        respuesta.forEach((e, i) => {
            $("#ddlproducto").append(
                "<option value='" +
                e.id_producto +
                "' nombre='" +
                e.nombre_producto +
                "'>" +
                e.nombre_producto +
                "</option>"
            );
        });

        if (respuesta.length > 0) {
            $("#txtContacto").val(respuesta[0].nombre_contacto);
            $("#txtTipoDoc").val(respuesta[0].tipo_documento);
            $("#txtDocumento").val(respuesta[0].numero_documento);
            $("#txtCelular").val(respuesta[0].celular);
            $("#txtDireccion").val(respuesta[0].direccion);
            $("#txtTipoProducto").val(respuesta[0].nombre_categoria);
            $("#txtEstado").val(respuesta[0].direccion);
            $("#ddlproveedor").val(Code);
            $("#proveedor").attr("disabled", true);
        } else {
            mensaje = "La consulta de proveedor no generó resultados.";
            ver_alerta();
        }
    });
}

function ConsultarDetalle(id) {
    $.ajax({
        Type: "get",
        dataType: "json",
        url: uri + "/compras/ConsultarDetalle/" + id
    }).done(detalleCompra => {
        if (detalleCompra.length > 0) {
            $("#detallebodys").empty();

            detalleCompra.forEach((e, i) => {
                $("#txtFecha").val(e.fecha_de_compra);
                $("#txtTipoProveedor").val(e.nombre_empresa);
                $("#lbtotall").html(e.total_compra);

                $("#detallebodys").append(
                    `<tr>
              <td>${e.nombre_producto}</td>
              <td>${e.precio_unitario}</td>
              <td>${e.cantidad}</td>
              <td>${e.subtotal_compra}</td>
            </tr>`
                );
            });

            $("#Modal_Compra").modal();
        } else {
            mensaje = "no tiene compras";
            ver_alerta();
        }
    });
}

function ConsultarCompra() {
    $.ajax({
        Type: "get",
        dataType: "json",
        url: uri + "compras/ConsultarCompra",
        data: {
            idproveedor: $("#proveedor").val(),
            fechaInicio: $("#txtfechaInicio").val(),
            fechaFin: $("#txtfechaFin").val()
        }
    }).done(compra => {
        if (compra.length > 0) {
            $("#consultaCompra").empty();

            compra.forEach((e, i) => {
                $("#consultaCompra").append(
                    `<tr>
              <td>${e.fecha_de_compra}</td>
              <td>${e.nombre_empresa}</td>
              <td>${e.total_compra}</td>
              <td>
<button class="detalle" id="detalle-compra" value="${e.id_compra}">Ver detalle</button>
              </td>
              </tr>`
                );
            });
        } else {
            mensaje = "no hay compras para ese rango seleccionado";
            ver_alerta();
        }
    });
}

//Reportes
function reportes(consulta, consulta2, consulta3, consulta4,consulta5) {
    $.ajax({
            url: uri + '/reporte/reporte_por_ruta',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                inicio: consulta2,
                fin: consulta3,
                reporte: consulta4,
                producto: consulta5,
            },
        })
        .done(function (respuesta) {
            $('#datos-reportes').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}
