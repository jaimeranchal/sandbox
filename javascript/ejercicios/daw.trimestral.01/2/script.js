"use strict"

/**
 * Valida que el valor cumpla lo siguiente:
 * no es un carácter
 * no está vacío
 * número entre 1-20
 */
let validarDimension = () => {
    let mensaje = "Introduzca un número entre 1-20: ";
    let valor = parseInt(prompt(mensaje));
    // Si no es un número o una cadena vacía
    while (isNaN(valor) || valor == undefined) {
        let error = "El valor debe ser un número\n";
        valor = parseInt(prompt(error + mensaje));
        // si no está entre 1-20
        while (valor < 1 || valor > 20) {
            let error = "El valor debe estar entre 1 y 20\n";
            valor = parseInt(prompt(error + mensaje));
        }
    }
    return valor;
}

/**
 * Genera un número aleatorio entre 1 y 9
 */
let aleatorio = () => {
    return Math.round((Math.random() * 9 - 1)+1);
}

/**
 * Genera una matriz de números aleatorios
 */
let generarMatriz = (dimension) => {
    let matriz = [];
    // genera filas
    for (let i = 0; i < dimension; i++) {
        // crea un segundo vector
        let vectorColumna = [];
        //genera columnas
        for (let j = 0; j < dimension; j++) {
            vectorColumna.push(aleatorio());
        }
        //agrega el vectorColumna a la matriz
        matriz.push(vectorColumna);
    }
    return matriz;
}

/**
 * Imprime una matriz
 * Recibe como argumentos el título de la tabla y la matriz
 */
let mostrar = (titulo, vector) => {
    document.write(`<h2>${titulo}</h2>`);
    let datos = "";
    for (let key in vector) {
        for (let i = 0; i < vector[key].length; i++) {
            datos += vector[key][i] + " ";
        }
        datos += "<br>";
    }
    document.write(datos);
}

// script
let dimension = validarDimension(); 
let arrNumeros = generarMatriz(dimension);
mostrar("Tabla Principal", arrNumeros);
