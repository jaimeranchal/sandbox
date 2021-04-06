/* Ejercicio 1:
 *  - Crear 10 ventanas desde la ventana principal, indicando "ventana Secundaria 1, 2, ..."
 *  - El tamaño de la ventana será 300pxX300px
 *  - En la ventana secundaria tendrá un botón Cerrar que permitirá cerrar esa ventana
 */
"use strict";

// Intenté crear las ventanas una al lado de la otra 
// basándome en su posición con ventanaSec.screenX y
// moveBy(300,0) pero no funcionaba.
// En general el problema que me he encontrado es crear
// una referencia única para cada ventana (tienen nombre
// único, pero no sé cómo usarlo para llamar a las propiedades
// y métodos)
function abrir(){
    // declarar variables
    let ventanaSec, nombreVentana;
    for (var i = 0; i < 10; i++) {
        nombreVentana = "Ventana Secundaria" + (i+1);
        ventanaSec = open("", "_blank", "width=300, height=300");
        ventanaSec.document.write("<h1>" + nombreVentana + "</h1>");
        ventanaSec.document.write("<button onclick='cerrar();'>Cerrar ventana</button>");
        ventanaSec.document.write("<script src='1.js'></script>")
        // función anónima para cerrar ventanaSec al pulsar el botón
        // Sólo me funciona en la última ventana abierta; 
        // entiendo que porque todas usan la misma referencia (ventanaSec)
        /*
        ventanaSec.onclick=function(){//función anónima
            ventanaSec.close();
        }       
        */
    } 
}

function cerrar(){
    self.close();
}
