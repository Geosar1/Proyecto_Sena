var mensaje = "";

function ver_alerta() {
    $(".alert-succes").stop();
    $("#mensaje").html(mensaje);
    window.setTimeout(function () {
        $(".alert-succes").slideDown(function () {
            $(".alert-succes").fadeTo(4000, 500).slideUp(100, function () {
            });
        });
    });
}

function ver_success() {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    window.setTimeout(function () {
        $(".alert-success").slideDown(function () {
            $(".alert-success").fadeTo(4000, 500).slideUp(100, function () {
            });
        });
    });
}

function ver_fail() {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    $(".alert-fail").html(mensaje);
    window.setTimeout(function () {
        $(".alert-fail").slideDown(function () {
            $(".alert-fail").fadeTo(4000, 500).slideUp(100,function () {
            });
        });
    });
}

$(document).on('click','.alert-success,.alert-fail,.alert-succes', function () {
    $(".alert-success").stop();
    $(".alert-fail").stop();
    $(".alert-succes").stop();
    return false;
});
