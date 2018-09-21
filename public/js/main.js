//inputs Number
$(document).on('keypress', 'input[type=number],input[type=tel]', function () {
    if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;
});

//input Text
$(document).on('keypress', 'input[type=text],input[type=password]', function (key) {
    if ((key.charCode < 97 || key.charCode > 122) //letras mayusculas
        &&
        (key.charCode < 65 || key.charCode > 90) //letras minusculas
        &&
        (key.charCode != 45) //retroceso
        &&
        (key.charCode != 241) //ñ
        &&
        (key.charCode != 209) //Ñ
        &&
        (key.charCode != 32) //espacio
        &&
        (key.charCode != 225) //á
        &&
        (key.charCode != 233) //é
        &&
        (key.charCode != 237) //í
        &&
        (key.charCode != 243) //ó
        &&
        (key.charCode != 250) //ú
        &&
        (key.charCode != 193) //Á
        &&
        (key.charCode != 201) //É
        &&
        (key.charCode != 205) //Í
        &&
        (key.charCode != 211) //Ó
        &&
        (key.charCode != 218) //Ú
        &&
        (key.keyCode < 45 || key.keyCode > 57) //numeros
    )
        return false;
});

//Buscar movimiento
$(document).on('change', '#producto_mov,#mov', function () {
    var valor = $('#mov').val();
    var valor2 = $('#producto_mov').val();

    if (valor != "" || valor2 != "") {
        buscar_movimientos(valor, valor2);
    } else {
        buscar_movimientos();
    }
});

//Buscar categoria
$(document).on('keyup', '#nombre_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        buscar_categoria(valor);
    } else {
        buscar_categoria();
    }
});

//buscar proveedor
$(document).on('keyup', '#nombre_em', function () {
    var valor = $('#nombre_em').val();

    if (valor != "") {
        buscar_proveedor(valor);
    } else {
        buscar_proveedor();
    }
});

//buscar cliente
$(document).on('keyup', '#nombres_c,#num_doc,#apellidos', function () {
    var valor = $('#nombres_c').val();
    var valor2 = $('#select_r').val();
    var valor3 = $('#num_doc').val();
    var valor4 = $('#apellidos').val();

    if (valor != "" || valor2 != "" || valor3 != "" || valor4 != "") {
        buscar_cliente(valor, valor2, valor3, valor4);
    } else {
        buscar_cliente();
    }
});

$(document).on('change', '#select_r', function () {
    var valor = $('#nombres_c').val();
    var valor2 = $('#select_r').val();
    var valor3 = $('#num_doc').val();
    var valor4 = $('#apellidos').val();

    if (valor != "" || valor2 != "" || valor3 != "" || valor4 != "") {
        buscar_cliente(valor, valor2, valor3, valor4);
    } else {
        buscar_cliente();
    }
});

//buscar usuario
$(document).on('keyup', '#nombres', function () {
    var valor = $('#nombres').val();

    if (valor != "") {
        buscar_usuario(valor);
    } else {
        buscar_usuario();
    }
});

//Buscar producto
$(document).on('keyup', '#nombre_p', function () {
    if ($('#nombre_p').val() != "" || $("#categorias_p").val() != "") {
        buscar_producto();
    } else {
        buscar_producto();
    }
});

$(document).on('change', '#categorias_p', function () {
    if ($('#nombre_p').val() != "" || $("#categorias_p").val() != "") {
        buscar_producto();
    } else {
        buscar_producto();
    }
});

//Form productos
$(document).on('click', '#guardar_producto', function () {
    if ($('#nombre_p').val() == "" || $('#precio_p').val() == "" || $('#cantidad_p').val() == "" || $('#stock_p').val() == "" || $('#categorias_p').val() == "" || $('#proveedores_p').val() == "") {
        mensaje = "Debe llenar todos los campos";
        ver_fail();
    } else {
        consultar_producto();
    }
    return false;
});

$(document).on('click', '#cancelar', function () {
    $('#crear_productos').trigger('reset');
    buscar_producto();
    $('#guardar_producto').show();
    $('#modificar_p').hide();
    $('select').val('').trigger('change');
    $('#proveedores_p').prop('disabled', false);
});

$(document).on('click', '#agregar', function () {
    var valor = $('#proveedores_a').val();
    if (valor != "") {
        guardar_detalle(id, valor);
    } else {
        mensaje = "Debe seleccionar un proveedor";
        ver_fail();
    }
});

$(document).on('click', '#volver', function () {
    $('.modal-content').slideToggle(function () {
        $('#simpleModal').hide();
    });
    return false;
});

$(document).on('click', '#asignar,#ver-detalle', function () {
    id = $(this).val();
    $('.modal-content').slideToggle();
    $('#simpleModal').show(function () {
        $('.modal-content').slideDown();
        listar_detalle(id);
    });
    return false;
});

$(document).on('click', '#Estado_p', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_producto(valor, cambio);

    return false;
});

$(document).on('click', '#editar_p', function () {
    id = $(this).val();
    $('#guardar_producto').hide();
    $('#modificar_p').show();
    editar_producto(id);
    $('#proveedores_p').prop('disabled', true);
    return false;
});

$(document).on('click', '#modificar_p', function () {
    if ($('#nombre_p').val() == "" || $('#precio_p').val() == "" || $('#cantidad_p').val() == "" || $('#stock_p').val() == "" || $('#categorias_p').val() == "") {
        mensaje = "Debe llenar todos los campos";
        ver_fail();
    } else {
        modificar_producto();
    }
    return false;
});

//Form detalle productos
$(document).on('click', '#limpiar_d', function () {
    $('select').val('').trigger('change');
    buscar_detalle();
});

$(document).on('click', '#Estado_d', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_detalle(valor, cambio);

    return false;
});

//Form categorias
$(document).on('click', '#guardar_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        guardar_categoria(valor);
    } else {
        mensaje = "Debe ingresar un nombre";
        ver_fail();
    }

    return false;
});

$(document).on('click', '#Estado_c', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_categoria(valor, cambio);

    return false;
});

$(document).on('click', '#editar_c', function () {
    id = $(this).val();
    editar_categoria(id);

    $('#guardar_c').hide();
    $('#modificar_c').show();
    $('#nombre_c').focus();
    return false;
});

$(document).on('click', '#modificar_c', function () {
    var valor = $('#nombre_c').val();

    if (valor != "") {
        modificar_categoria(id, valor);
    } else {
        mensaje = "Debe ingresar un nombre";
        ver_fail();
    }
    return false;
});

$(document).on('click', '#limpiar_c', function () {
    $('#guardar_c').show();
    $('#modificar_c').hide();
    buscar_categoria();
});

//Form cartera
$(document).on('change', '#cedula', function () {
    if ($('#cedula').val() != "") {
        consultar_cartera($('#cedula').val());
    } else {
        $('#nombre_cliente').html("");
        $('#cartera').html("0");
        $('#disponible').html("0");
        $('#pedido').html("0");
        $('select').val('').trigger('change');
        $('#historial').empty();
    }
});

$(document).on('click', '#limpiar_cartera', function () {
    $('#nombre_cliente').html("");
    $('#cartera').html("0");
    $('#disponible').html("0");
    $('#pedido').html("0");
    $('select').val('').trigger('change');
    $('#historial').empty();
});

//Form proveedores
$(document).on('click', '#Estado_proveedor', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_proveedor(valor, cambio);

    return false;
});

$(document).on('click', '#editar_proveedor', function () {
    editar_proveedor($(this).val());
    $('#guardar_proveedor').hide();
    $('#modificar_proveedor').show();
    return false;
});

$(document).on('click', '#cancelar_mod', function () {
    $('#modificar_proveedor').hide();
    $('#guardar_proveedor').show();
    $('select').val('').trigger('change');
    buscar_proveedor();
    return false;
});

//Form clientes
$(document).on('click', '#Estado_cliente', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_cliente(valor, cambio);

    return false;
});

$(document).on('click', '#editar_cliente', function () {
    editar_cliente($(this).val());
    $('#guardar_cliente').hide();
    $('#modificar_cliente').show();
    return false;
});

$(document).on('click', '#can_mod', function () {
    $('#modificar_cliente').hide();
    $('#guardar_cliente').show();
    $('select').val('').trigger('change');
    $('registro_cliente').trigger('reset');
    buscar_cliente();
});

//Form usuarios
$(document).on('click', '#Estado_usuario', function () {
    var valor = $(this).val();
    var estado = $(this).html();
    var cambio;

    if (estado == "Inhabilitar") {
        cambio = 0;
    } else {
        cambio = 1;
    }
    cambiar_usuario(valor, cambio);

    return false;
});

$(document).on('click', '#editar_usuario', function () {
    editar_usuario($(this).val());
    $('#guardar_usuario').hide();
    $('#modificar_usuario').show();
    $('#clave').prop('disabled', true);
    return false;
});

$(document).on('click', '#cancelar_mod', function () {
    $('#modificar_usuario').hide();
    $('#guardar_usuario').show();
    $('#registro_pre').trigger("reset");
    $('#clave').prop('disabled', false);
    buscar_usuario();
    return false;
});
$(document).on('click', '#cambiarPass', function () {
    id = $(this).val();
    $('.modal-content').slideToggle();
    $('#simpleModalPass').show(function () {
        $('.modal-content').slideDown();

    });
    return false;
});

$(document).on('click', '#btcambiarpass', function () {
    var valor = $('#cambiopass').val();
    if (valor != "") {
        cambiar_contrasena(id, valor);
    } else {
        mensaje = "Debe ingresar una contraseña valida";
        ver_fail();
    }
});

$(document).on('click', '#volverpass', function () {
    $('.modal-content').slideToggle(function () {
        $('#simpleModalPass').hide();
    });
    return false;
});

//Form movimientos
$(document).on('click', '#reset_mov', function () {
    $('select').val('').trigger('change');
    buscar_movimientos();
});

//Login
$(document).on('click', '#entrar', function () {
    var dato = $('#user').val();
    var dato2 = $('#key').val();

    if (dato != "" && dato2 != "") {
        consultar_usuario(dato, dato2);
    } else {
        mensaje = "debe ingresar todos los datos";
        ver_fail();
    }
    return false;
});

$(document).on('click', '#ir', function () {
    $('#login').hide();
    $('#registro').slideDown();
});

$(document).on('click', '#quitar', function () {
    cerrar();
    return false;
});

$(document).on('change', '#recordar', function () {
    if (this.checked) {
        $('#user').attr("placeholder", "Ingrese cedula");
        $('#mensaje_recuperacion').show();
        $('#key').get(0).type = 'date';
        $('#entrar').hide();
        $('#recuperar').show();
        mensaje = "Ingresa tus datos de seguridad";
        ver_success();
    } else {
        $('#user').attr("placeholder", "Usuario");
        $('#key').attr("placeholder", "Contraseña");
        $('#key').get(0).type = 'password';
        $('#mensaje_recuperacion').hide();
        $('#entrar').show();
        $('#recuperar').hide();
        $('#user').val("");
        $('#key').val("");
    }
})

$(document).on('click', '#recuperar', function () {
    var dato = $('#user').val();
    var dato2 = $('#key').val();

    if (dato != "" && dato2 != "") {
        recuperar_usuario(dato, dato2);
    } else {
        mensaje = "debe ingresar todos los datos";
        ver_fail();
    }
    return false;
});

//Index
$(document).on('click', '#crear_p', function () {
    $('#crear_producto').slideDown();
    $('#ver_detalle').hide();
    buscar_producto();
});

$(document).on('click', '#atras_p', function () {
    $('#crear_producto').hide();
    $('#ver_detalle').slideDown();
    buscar_detalle();
    return false;
});

//Exportar a excel
$(document).on('click', '#enviar', function () {
    $('table button').remove();
    descargarExcel();
    return false;
});

//buscar rutas
$(document).ready(function () {
    $('#rruta').DataTable();
});
//rutas
$(document).on('change', '#ddlMuni', function () {

});

$(document).on('change', '#ddlMuni', function () {

});

$(document).on('change', '#ddlMuni', function () {

    //var valor = $('#ddlMuni'.val());
    var mun = $('#ddlMuni').val();
    buscarBarrios($(this).val());
})

function ponerPrecio(elemento) {
    var valor = $("#ddlProducto").val();
    var precio = $("#ddlProducto [value='" + valor + "']").attr("precio");
    var cantidades = $("#ddlProducto [value='" + valor + "']").attr("cantidad");
    $("#pPrecio").text(precio);
    $("#cCantidades").text(cantidades);
}

function direccion(elemento) {
    var direcc = $("#ddlCliente").val();
    var tel = $("#ddlCliente").val();
    var dato = $("#ddlCliente [value='" + direcc + "']").attr("direc");
    $("#dDir").text(dato);
    var dato2 = $("#ddlCliente [value='" + tel + "']").attr("tel");
    $("#tTel").text(dato2);


}

$(document).on('click', '#adicionar', function () {
    var producto = $("#ddlProducto").val();
    var producto2 = $("#ddlProducto [value='" + producto + "']").attr("idP");
    var cantidad = $("#txtCantidad").val();
    var precio = $("#pPrecio").text();
    var subtotal1 = (cantidad * precio);


    var i = 1; //contador para asignar id al boton que borrara la fila
    var fila = '<tr id="row' + i + '"><td> <input type="hidden" value="' + producto + '" name="idProducto[]" >' + producto2 + '</td><td> <input type="hidden" value="' + cantidad + '" name="cantidades[]" >' + cantidad + '</td><td>' + precio + '</td><td> <input type="hidden" value="' + subtotal1 + '" name="subtotal[]" >' + subtotal1 + '</td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td></tr>'; //esto seria lo que contendria la fila
    i++;


    $('#mytable tr:first').after(fila);
    $("#adicionados").text(""); //esta instruccion limpia el div adicioandos para que no se vayan acumulando
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
    //le resto 1 para no contar la fila del header

    var chks = document.getElementsByName('subtotal[]');
    var total = 0;
    for (var i = 0; i < chks.length; i++) {
        total += parseInt(chks[i].value)
    }
    $("#gTotal").text(total)
    var total1 = $("#gTotal").html();
    $("#totalInput").val(total1);
});

$(document).on('click', '.btn_remove', function () {
    var button_id = $(this).attr("id");
    //cuando da click obtenemos el id del boton
    $('#row' + button_id + '').remove(); //borra la fila
    //limpia el para que vuelva a contar las filas de la tabla
    $("#adicionados").text("");
    var nFilas = $("#mytable tr").length;
    $("#adicionados").append(nFilas - 1);
});

$(document).on('click', '#ver-detalle', function () {
    var ide = $(this).val();
    $('.modal-contents').slideToggle();
    $('#simpleModals').show(function () {
        $('.modal-contents').slideDown();
        ConsultarDetalleP(ide);
    });
    return false;
});

$(document).on('click', '#volver', function () {
    $('.modal-contents').slideToggle(function () {
        $('#simpleModals').hide();
    });
    return false;
});

//Form compras
function validar() {
    if (lista.length <= 0) {
        alert("Debe ingresar por lo menos un producto.");
        return false;
    } else {
        return true;
    }
}

function eliminarproducto(elemento) {

    var e = $(elemento).parent().parent();
    $(e).remove();

}

function validaCadena(cadena, patron) {
    if (!cadena.search(patron))
        return true;
    else
        return false;
}

function agregarProducto() {
    if ($("#txtCantidad").val() == "") {
        alert("Ingrese una cantidad");
        return false;
    }
    var idProducto = $("#ddlproducto").val();
    var idproveedor = $("#proveedor").val();
    var item = {
        proveedorId: idproveedor,
        productocodigo: idProducto,
        nombreproducto: $("#ddlproducto [value='" + idProducto + "']").text(),
        precio: $("#txtPrecio").val(),
        cantidad: $("#txtCantidad").val(),
        total: $("#lbtotal").val()

    };

    lista.push(item);
    var Html = "<tr>";
    Html += "<td>" + item.productocodigo + "</td>";
    Html += "<td>" + item.nombreproducto + "</td>";
    Html += "<td>" + item.precio + "</td>";
    Html += "<td>" + item.cantidad + "</td>";
    Html += "<td>" + item.precio * item.cantidad +
        " <input type='hidden' id='productos[]' name='productos[]' value=" + item.productocodigo + "/>" /*Creamos un campo oculto para que se guarden todos los items que vayan agregando*/ +
        " <input type='hidden' id='precios[]' name='precios[]' value=" + item.precio + "/>" +
        " <input type='hidden' id='cantidades[]' name='cantidades[]' value=" + item.cantidad + "/>"
    Html += "<td><a onClick='eliminarproducto(this)' >Eliminar</a></td>";
    Html += "</tr>";
    $("#detallebody").append(Html);
    $("#txtCantidad").val("");
    $("#txtPrecio").val("");

    var valortotal = 0;
    valortotal = item.precio * item.cantidad;
    valortotal += parseInt($("#lbtotal").text());
    $("#lbtotal").text(valortotal);
    $("#total").val(valortotal);

}

function LimpiarForm() {
    $("#txtContacto").val("");
    $("#txtTipoDoc").val("");
    $("#txtDocumento").val("");
    $("#txtCelular").val("");
    $("#txtDireccion").val("");
    $("#txtTipoProducto").val("");
    $("#txtEstado").val("");
    $("#txtCantidad").val("");
    $("#txtPrecio").val("");
    $("#proveedor").attr("disabled", false);
    $("select").val('').trigger('change');
}
