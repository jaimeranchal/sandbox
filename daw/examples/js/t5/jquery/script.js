"use strict"

$(function () {
    $("#capa").html("<b>Texto inicial</b>")
    $("input[type=button]").on("click", pulsar)
});

function pulsar() {
    $("#capa").html("<b>Texto del "+$(this).attr("value")+" pulsado</b>")
}
