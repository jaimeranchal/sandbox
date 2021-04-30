"use strict";

let color;
let clase = [];

$(()=>{
    // NOTE: también se puede hacer con toggleClass y
    // dejándole escondida por defecto
    // 1. guardo la clase en una variable
    // 2. toggle con hover
    $("table td").each( function(ind, ele) {
        clase[ind] = $(ele).attr('class');    
        $(ele).removeClass(clase[ind]);
        $(ele).hover(
            () => {
                $(ele).addClass(clase[ind]);
            },
            () => {
                $(ele).removeClass(clase[ind]);
            },
        )
    })

})

// let cambiarColor = function() {
//     $(this).toggleClass("red");
// }


// let cambiarColorHover = function() {
//     $("table td").hover(
//         function() {
//             color = $(this).css('background-color')
//             $(this).css('background-color', '#ffffff')
//         },
//         function() {
//             $(this).css('background-color', color)
//         },
//     )
// }
