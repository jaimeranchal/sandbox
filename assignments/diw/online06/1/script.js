"use strict";

let color;

$(()=>{
    // NOTE: también se puede hacer con toggleClass y
    // dejándole escondida por defecto
    $("table td").hover(
        function() {
            color = $(this).css('background-color')
            $(this).css('background-color', '#ffffff')
        },
        function() {
            $(this).css('background-color', color)
        },
    )
})

let cambiarColor = function() {
    $(this).toggleClass("red");
}
