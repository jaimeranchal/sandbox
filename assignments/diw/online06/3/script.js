"use strict";

$(()=>{
    // ...
    $("input").on('blur', comprobarMayor);
})

let comprobarMayor = () => {
    if ($('input:eq(0)').val() != "" &&
        $('input:eq(1)').val() != "") 
        {
        console.log("estoy funcionando");
            
        let mayor;
        let num1 = $("#num1");
        let num2 = $("#num2");

        if (parseInt($(num1).val()) == parseInt($(num2).val())) {
            return mostrarResultado("Los dos números son iguales");
        }

        mayor = (parseInt($(num1).val()) > parseInt($(num2).val())) ? num1 : num2;
        $(mayor).css("border", "solid 1px red");
        return mostrarResultado("El número mayor es " + $(mayor).val());
    }
}

let mostrarResultado = (mensaje) => {
    $("#mensaje").text(mensaje);
}
