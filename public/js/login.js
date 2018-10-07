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

$(document).on('change', '#checkbox2', function () {
    if (this.checked) {
        $('#user').attr("placeholder", "Ingrese cedula");
        $('#mensaje_recuperacion').show();
        $('#key').get(0).type = 'date';
        $('#entrar').hide();
        $('#recuperar').show();
        mensaje = "Ingresa tus datos de seguridad";
        ver_success();
    } else {
        $(".alert-success").stop();
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

$(document).on('click', '#btcambiarpass', function () {
    var valor = $('#cambiopass').val();

    if (valor != "") {
        cambiar_contrasena(valor);
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
