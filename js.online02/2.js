/* Ejercicio 2:
 *   - pida fechas de nacimientos (dd/mm/yyyy) 
 *   - muestre por consola los años donde el cumpleaños caiga en domingo (año actual - 2100)
 *   - Si la fecha no es correcta se mostrará un error y volverá a pedir el dato.
 *   - El script no avanzará hasta que el dato no sea correcto.
 *   - El proceso se repetirá hasta que el usuario desee acabar, usando `confirm()`. 
 */
"use strict";
//declarar variables
let anyo;
let fecha; 
let cumple;
let error = "El formato de fecha introducido no es correcto\nDebe ser año-mes-día (1970-02-23)\n";
let seguir = true;

while (seguir) {
    // solicitamos la fecha de cumpleaños 
    cumple = prompt("Introduce la fecha de tu cumpleaños (DD/MM/YYYY): ");
    // Comprobamos que el formato de fecha sea correcto
    // y separamos día, mes y año con split()
    if (cumple) {
        fecha = new Date(cumple);
        // Controlamos fechas "fuera de rango" como un 30 de febrero
        // p.e. comparamos el new Date credo con los datos anteriores

    } else {
        cumple = prompt("Introduce la fecha de tu cumpleaños (DD/MM/YYYY): ");
    }
    // calcula los años en los que cumpleaños cae en domingo
    for (anyo = 2020; anyo <= 2100; anyo++) {
        if (fecha.getDay() == 0) {
            console.log(fecha.getFullYear());
        }
    }
    
}
