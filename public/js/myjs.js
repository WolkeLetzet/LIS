$(document).ready(function () {
    $("#nombre").attr("disabled", "");
    $("#cambiarNombre").click(function (event) {
        $("#subir").removeAttr("hidden");
        $("#nombre").removeAttr("disabled")
        $(this).attr("hidden", "");

    });
});

$(document).ready(function () {
    $("input#otraOficina").click(function (event) {
        if ($(this).is(":checked")) {
            $("input#nuevaOficina").removeAttr("disabled");
        } else {
            $("input#nuevaOficina").attr("disabled", "");
        }
    });

    $("input#otroUso").click(function (event) {
        if ($(this).is(":checked")) {
            $("input#nuevoUso").removeAttr("disabled");
        } else {
            $("input#nuevoUso").attr("disabled", "");
        }
    });
});

$(document).ready(function () {

    $('button#changeVis').click(function (event) {
        event.preventDefault();
        let icon = $('.icon');
        let password = $('input#password');
        if (password.is(':password')) {
            password.attr('type', 'text');
            icon.removeClass('bi bi-eye').addClass('bi bi-eye-slash');
        } else {
            password.attr('type', 'password');
            icon.removeClass('bi bi-eye-slash').addClass('bi bi-eye');
        }
    });

});

$(document).ready(function () {
    sbutton = $("#submit-button");
    sbutton.click(function () {
        $(this).empty();
        $(this).append("<div class='spinner-border spinner-border-sm' role='status'> <span class='visually-hidden'>Loading...</span></div> ");
    })
});
