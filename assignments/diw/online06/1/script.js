"use strict";

/** NOTAS:
 * El requisito de un color diferente para cada celda ha sido
 * la parte que me ha costado un poco de este ejercicio.
 *
 * Para resolverlo, he optado por asignar directamente en el html
 * un color de fondo a cada celda mediante clases css.
 *
 * Al cargar la página, recorro con un bucle cada celda:
 * 1. Guardo la clase original en un array
 * 2. Elimino la clase, y con ello, el color de fondo
 * 3. Establezo un evento hover, más cómodo que establecer un
 * mouseover y mouseout por separado. Este evento lanza dos
 * funciones:
 *  - añadir la clase original que tenían al entrar con el ratón
 *  - eliminarla al salir
 */

/* Variables */
let clase = []; // array donde guardo las clases de cada celda

$(()=>{

    // Bucle para cada elemento td de la tabla
    $("table td").each( function(ind, ele) {
        // guardo la clase de la celda en el array
        clase[ind] = $(ele).attr('class');    
        // elimino la clase y con ello el color de fondo
        $(ele).removeClass(clase[ind]);
        // establezco un evento hover para esa celda
        // con dos funciones como parámetros, una para mouseover
        // otra para mouseout
        $(ele).hover(
            // función para mouseover (el puntero entra en la celda)
            () => {
                // recupero el color de fondo original a partir del
                // array 'clase', utilizando el índice correspondiente
                $(ele).addClass(clase[ind]);
            },
            // función para mouseout (el puntero sale de la celda)
            () => {
                // elimino el color de fondo eliminando la clase
                $(ele).removeClass(clase[ind]);
            },
        )
    })

})

