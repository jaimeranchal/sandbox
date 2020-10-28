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
// Formato básico; los valores exactos se comprueban luego
let formatoFecha = /^([\d]{2})\/([\d]{2})\/([\d]{4})$/i;
let error = "El formato de fecha introducido no es correcto\nDebe ser año-mes-día (01/02/1970)\n";
let error2 = "La fecha introducida no es válida (no existe)\n";
let seguir = true;

// solicitamos la fecha de cumpleaños 
cumple = prompt("Introduce la fecha de tu cumpleaños (DD/MM/YYYY): ");
while (seguir && cumple != null) {
    // Comprobamos que el formato de fecha sea correcto
    let formatoCorrecto = cumple.search(formatoFecha);
    // Search devuelve -1 si no encuentra coincidencia (no coincide el formato)
    if (formatoCorrecto != -1) {
        // guardo día, mes y año en un array con split()
        let aCumple = cumple.split("/"); 
        // asignamos las variables convirtiéndolas a número con '+' unario
        let diaCumple = +aCumple[0];
        let mesCumple = +aCumple[1];
        let anyoCumple = +aCumple[2];
        // creamos un objeto Date con estos datos
        fecha = new Date(anyoCumple, mesCumple, diaCumple);

        // Controlamos fechas "fuera de rango" como un 30 de febrero
        // comparando los valores del new Date creado con los datos anteriores
        if (fecha.getDate() == diaCumple &&
            fecha.getMonth() == mesCumple &&
            fecha.getFullYear() == anyoCumple) {

            // calcula los años en los que cumpleaños cae en domingo
            for (anyo = 2020; anyo <= 2100; anyo++) {
                fecha = new Date(anyo, mesCumple, diaCumple);
                if (fecha.getDay() == 0) {
                    console.log(anyo + " ");
                }
            }
            // detenemos el bucle
            seguir = confirm("¿Desea introducir otra fecha?");
            
        } else {
            alert(error2);
            cumple = prompt("Introduce la fecha de tu cumpleaños (DD/MM/YYYY): ");
            seguir = true;
        }


    } else {
        alert(error);
        cumple = prompt("Introduce la fecha de tu cumpleaños (DD/MM/YYYY): ");
        seguir = true;
    }
    
}
