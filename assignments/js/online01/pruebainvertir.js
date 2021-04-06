var numero = resto = invertido = 0;

numero = parseInt(prompt("Introduce un número: "));
while (numero > 0){
    resto = parseInt(numero % 10);
    invertido = resto + (invertido * 10);
    numero = parseInt(numero / 10);
    console.log(invertido);
}
console.log("El numero invertido es " + invertido);