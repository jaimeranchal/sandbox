/* Ejercicio 2: programa que codifique una frase
 * La frase no debe tener menos de 4 palabras.
 * Se utilizará un bucle para controlarlo y se mostrará un mensaje indicando el error.
 * Convertir cada carácter (incluido blancos en su ASCII equivalente.
 * Mostrar el resultado
 * Generar un entero aleatorio entre 1 y 150
 * Ese num. aleatorio se suma a cada valor ASCII (el mismo valor se usa en todo el proceso). Mostrar el resultado
 * Los valores N1 y N2 representan el valor menor (0) y mayor permitido en el código ASCII (255).
 * Si el número obtenido en el paso anterior es mayor que N2 se resta N2 entre 2. (mostrar el resultado).
 * Los resultados se mostrarán en una ventana secundaria cuyas dimensiones serán de alto 500px y 700px de ancho.
 * La ubicación de la ventana será más o menos centrada.
 * Tendrá un botón para poder cerrarla.
 * No se utilizarán arrays.
*/
"use strict";

// Variables
let mensaje, mensajeAscii = "", mensajeAscii2 = "";
let solicitud = "Introduzca un mensaje con al menos cuatro palabras: ";
let error = "Error: la cadena contiene menos de 4 palabras\n";
let aleatorio;
let continuar = true;

// Lógica
mensaje = prompt(solicitud);
while (mensaje != null && continuar) {
    if (mensaje.split(" ").length < 4) {
        mensaje = prompt(error + solicitud);
    } else {
        // Convertimos la cadena a formato ASCII
        // Bucle que convierte cada caracter en su valor numérico ASCII
        for (var i = 0; i < mensaje.length; i++) {
            mensajeAscii += mensaje.charCodeAt(i);
        }
        // Sumamos un número aleatorio al valor ASCII de cada carácter
        // creamos un número aleatorio
        aleatorio = Math.floor(Math.random() * (150 -1) + 1);

        for (var i = 0; i < mensaje.length; i++) {
            let valorAscii = +mensaje.charCodeAt(i) + aleatorio;
            if (valorAscii <= 255) {
                mensajeAscii2 += valorAscii;
            } else {
                mensajeAscii2 += valorAscii - Math.round(255/2);
            }
        }

        //Creamos la ventana para mostrar los resultados
        mostrarResultados();
        continuar = confirm("Desea continuar?");

    }
}
// funciones
function mostrarResultados(){
    // crea una ventana más o menos centrada
    let ventana = open("", "resultados", "width=700, heigth=500, top=200, left=350");
    // Imprime los datos
    ventana.document.write("<b>El mensaje a encriptar:</b> " + mensaje + "<br>");
    ventana.document.write("<b>El mensaje en ACII:</b><br>" + mensajeAscii + "<br>");
    ventana.document.write("<b>El mensaje en ACII sumado el número aleatorio " + aleatorio +":</b><br>\n" + mensajeAscii2 + "<br>");
    // Botón para cerrar la ventana secundaria
    ventana.document.write("<button>Cerrar ventana</button>")
    //establecer el evento
    ventana.onclick=function(){//función anónima
        ventana.close();
        ventana=undefined;
    }
}

// Resultados en ventana secundaria

