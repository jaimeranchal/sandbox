"use strict";

/**
 * NOTA: 
 * Este ejercicio me dió un poco de dolor de cabeza por los diferentes
 * datos que tenía que guardar para cada input:
 * 1. El valor introducido, como un entero (para poder compararlos)
 * 2. La referencia al propio input, para aplicarle el color adecuado al mayor
 * También me costó un poco decidirme por el evento a usar;
 * estaba entre 'change' y 'blur', pero me decanté por el segundo
 * porque solo se dispara cuando has terminado y pinchas fuera del recuadro.
 */


$(()=>{
    // Ejecuta la función comprobarMayor() cuando cualquiera de los
    // inputs pierde el foco
    $("input").on('blur', comprobarMayor);
})

/**
 * Compara los números introducidos y muestra el mayor
 */
let comprobarMayor = () => {
    // Antes de nada, compruebo que ninguna de las cajas de entrada está vacía
    // No se puede realizar la comparación sin ambos valores.
    // Para variar, utilizo el selector de jQuery eq() para referirme a cada 
    // input como si fuera un array.
    // Por defecto, un input en blanco contiene una cadena vacía, de modo que uso
    // la función val() para comprobar que su valor es diferente de una cadena vacía
    if ($('input:eq(0)').val() != "" &&
        $('input:eq(1)').val() != "") 
        {
            
        /* Variables */
        let mayor;              // referencia al elemento input con el número mayor
        let num1 = $("#num1");  // referencia al primer input
        let num2 = $("#num2");  // referencia al segundo input

        // Comparo los valores de cada input,
        // Utilizo la función parseInt para obtener el valor como número entero
        if (parseInt($(num1).val()) == parseInt($(num2).val())) {

            // Si ambos coinciden, salgo de la función mostrando el mensaje
            // con una llamada a la función mostrarResultado()
            return mostrarResultado("Los dos números son iguales");

        }

        // Si no son iguales, guardo el elemento con el número mayor en una variable
        // Igual que antes, uso parseInt() para comparar los valores enteros 
        mayor = (parseInt($(num1).val()) > parseInt($(num2).val())) ? num1 : num2;

        // Aplico un borde rojo al número mayor con la función css(),
        // que me permite asignar valores a propiedades css directamente
        $(mayor).css("border", "solid 1px red");

        // Salgo de la función llamando a mostrarResultado() para que imprima
        // el número mayor
        return mostrarResultado("El número mayor es " + $(mayor).val());
    }
}

/**
 * Imprime un mensaje pasado por parámetro
 * en el div con id #mensaje
 */
let mostrarResultado = (mensaje) => {
    $("#mensaje").text(mensaje);
}
