"use strict" 
// Ejercicio 1: genera 100 letras de la A-Z
let letras = { "A":0,"B":0,"C":0,"D":0,"E":0,"F":0,"G":0,"H":0,"I":0,"J":0,"K":0,"M":0,"N":0,"L":0,"O":0,"P":0,"Q":0,"R":0,"S":0,"T":0,"U":0,"V":0,"W":0,"X":0,"Y":0,"Z":0, };
let arrLetras = [];

// Paso 1: generar array de 100 letras (bucle aleatorio)
let generar = () => {
    let i, random, letra;
    for (i = 0; i < 100; i++) {
        random = Math.round(Math.random() * (90-65)) + 65;
        letra = String.fromCharCode(random);
        // añadimos un + 1 para que me incluya también la última letra
        arrLetras.push(letra);
    }
}

// Paso 2: comprobar frecuencia de cada letra y 
// guardarla en un array asociativo (A:x, B:x...)
let comprobar = () => {
    /* recorro un array de letras
     * en cada letra, recorro arrLetras en busca de coincidencias y sumo
     */
    for (let key1 in letras) {
        for (let key2 in arrLetras) {
            if (arrLetras[key2] == [key1]){
                letras[key1] += 1;
            }
        }
    }
}

// Paso 3: imprimir (bucle for-of)
let imprimir = (datos) => {
    let cadena = datos.join(", ");
    console.log(`Secuencia: ${cadena}`);
}

let imprimirHistograma = (datos) => {
    let asteriscos = '';
    console.log("Histograma");
    for (let key in datos) {
        asteriscos = '';
        for (let i = 0; i < datos[key]; i++) {
            asteriscos += "*";
        }
        console.log(`${key}: ${asteriscos}`);
    }
}

// Cuerpo del script
generar();
comprobar();
imprimir(arrLetras);
imprimirHistograma(letras);
