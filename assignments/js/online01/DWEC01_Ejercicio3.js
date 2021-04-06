"use strict";
let num;
let numInvertido = 0;
num = parseInt(prompt("Introduce un número de 3 cifras: "));
while (num != 0 && num) {
  var numero = 0,
    resto = 0;
  numInvertido = 0;
  if (num > 100 && num < 1000) {
    // invierte num y comprueba si son iguales
    numero = num;
    while (numero > 0) {
      resto = parseInt(numero % 10);
      numInvertido = resto + (numInvertido * 10);
      numero = parseInt(numero / 10);
    }
    console.log(numInvertido);
    //if (numInvertido.charAt(0) == num.toString().charAt(0)) {
    if (numInvertido == num) {
      console.log("El número inverso de " + num + " es igual al original");
    } else
      console.log("El número inverso de " + num + " no es igual al original");
    // volvemos a pedir datos para reiniciar el bucle
    num = parseInt(prompt("Introduce un número de 3 cifras: "));
  } else {
    // mensaje de error
    num = parseInt(prompt("Error\nEl número " + num + " no es de 3 cifras\nVuelva a introducir el número: "));
  }
}
